<?php require('header.php'); ?>

<?php
if(!isset($_REQUEST['id'])) {
    header('location: logout.php');
    exit;
} else {
    // Check the id is valid or not
    $statement5 = $pdo->prepare("SELECT * FROM tbl_stake WHERE stake_id=?");
    $statement5->execute(array($_REQUEST['id']));
    $total = $statement5->rowCount();
    if( $total == 0 ) {
        header('location: logout.php');
        exit;
    }
}
?>

<?php
    
$statement4 = $pdo->prepare("UPDATE tbl_stake SET stake_status=? WHERE stake_id=?");
$statement4->execute(array(3,$_REQUEST['id']));

$slayer=0;
$state = $pdo->prepare("SELECT * FROM tbl_bet WHERE stake_id=? AND bet_status=?");
$state = $pdo->prepare("UPDATE tbl_bet SET bet_status='3' WHERE stake_id=?");
$state->execute(array($_REQUEST['id'],$slayer));
$result = $state->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
    
    $bet_by=$row['bet_by'];
    $state12 = $pdo->prepare("SELECT * FROM tbl_member WHERE user_id=?");
    $state12->execute(array($bet_by));
    $result12 = $state12->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result12 as $row12) {
        $credit = $row12['credit'];
    }
    

    

    
    $bet_id=$row['bet_id'];
    $detail="Bet Loss";
    $date=date("Y-m-d h:i");
    $type="Bet Loss";
    $statement2 = $pdo->prepare("INSERT INTO tbl_transaction (detail_id, type, description,transaction_date,user_balance) VALUES (?,?,?,?,?)");
    $statement2->execute(array($bet_id,$type,$detail,$date,$credit));
    
    $statement3 = $pdo->prepare("UPDATE tbl_bet SET bet_status=? WHERE bet_id=?");
    $statement3->execute(array(2,$bet_id));
}

$page=$_REQUEST['page'];
$url = "bet-option.php?id=$page";
header("Location: ".$url);
?>