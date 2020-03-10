<?php require_once('header.php'); ?>

<?php
if(!isset($_REQUEST['id'])) {
	header('location: logout.php');
	exit;
} else {
	// Check the id is valid or not
	$statement = $pdo->prepare("SELECT * FROM tbl_deposit WHERE deposit_id=?");
	$statement->execute(array($_REQUEST['id']));
	$total = $statement->rowCount();
	if( $total == 0 ) {
		header('location: logout.php');
		exit;
	} else {
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
		foreach ($result as $row) {
			$id = $row['request_by'];
			$amount = $row['amount'];
			$method = $row['method'];
		}
	}
}
?>

<?php
$state = $pdo->prepare("SELECT * FROM tbl_member WHERE user_id=?");
$state->execute(array($id));
$results = $state->fetchAll(PDO::FETCH_ASSOC);
foreach ($results as $row) {
	$credit = $row['credit'];
}
$final_amount = $amount+$credit;
$statement = $pdo->prepare("UPDATE tbl_member SET credit=? WHERE user_id=?");
$statement->execute(array($final_amount,$id));

$note=" ";
$statement1 = $pdo->prepare("UPDATE tbl_deposit SET status=?, note=? WHERE deposit_id=?");
$statement1->execute(array(1,$note,$_REQUEST['id']));

$detail="Deposit By ".$method;
$date=date("Y-m-d h:i");
$type="Deposit";
$statements = $pdo->prepare("INSERT INTO tbl_transaction (detail_id, type, description,transaction_date,user_balance) VALUES (?,?,?,?,?)");
$statements->execute(array($_REQUEST['id'],$type,$detail,$date,$final_amount));

header('location: deposit.php');
?>