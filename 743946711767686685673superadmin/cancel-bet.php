<?php require_once('header.php'); ?>

<?php
// $bet_id="";
if(!isset($_REQUEST['id'])) {
	header('location: logout.php');
	exit;
} else {
	// Check the id is valid or not
	$statement5 = $pdo->prepare("SELECT * FROM tbl_bet WHERE bet_id=?");
	$statement5->execute(array($_REQUEST['id']));
	$total = $statement5->rowCount();
	if( $total == 0 ) {
		header('location: logout.php');
		exit;
	}
}
?>

<?php


$state = $pdo->prepare("SELECT * FROM tbl_bet WHERE bet_id=?");
$state->execute(array($_REQUEST['id']));
$result = $state->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
	$last_id=$row['bet_id'];
    $bet_by=$row['bet_by'];
    $amount=$row['amount'];
    // $admin_cut=$amount * 0.10;
// 	$final_amount=$amount-$admin_cut;
    $final_amount=$amount;
	
	//enter return in user
    $statement = $pdo->prepare("SELECT * FROM tbl_member WHERE user_id=?");
    $statement->execute(array($bet_by));
    $result1 = $statement->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result1 as $row1) {
    	$credit = $row1['credit'];
	}
	
	$final_amounts=$credit+$final_amount;
    $statement1 = $pdo->prepare("UPDATE tbl_member SET credit=? WHERE user_id=?");
    $statement1->execute(array($final_amounts,$bet_by));
    
    
    //enter bet refund transaction
    $detail1="Bet Refund";
    $date=date("Y-m-d h:i");
    $type1="Bet Refund";
    $statement8 = $pdo->prepare("INSERT INTO tbl_transaction (detail_id, type, description,transaction_date,user_balance) VALUES (?,?,?,?,?)");
	$statement8->execute(array($last_id,$type1,$detail1,$date,$final_amounts));
	
}
//delete bet 
$up="Canceled";
$statement4 = $pdo->prepare("UPDATE tbl_bet SET bet_status=? WHERE bet_id=?");
$statement4->execute(array($up,$_REQUEST['id']));

header("Location: bet.php");
?>