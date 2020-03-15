<?php require_once('header.php'); ?>

<?php
if(!isset($_REQUEST['id'])) {
	header('location: logout.php');
	exit;
} else {
	$id = "";

	// Check the id is valid or not
	$statement = $pdo->prepare("SELECT * FROM tbl_withdraw WHERE withdraw_id=?");
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
$credit="";
$state = $pdo->prepare("SELECT * FROM tbl_club_owner_balance_transfer WHERE club_owner_id=?");
$state->execute(array($id));
$results = $state->fetchAll(PDO::FETCH_ASSOC);
foreach ($results as $row) {
	$credit = $row['transfer_amount'];
}
$note=" ";
$statement1 = $pdo->prepare("UPDATE tbl_withdraw SET withdraw_status=?, withdraw_note=? WHERE withdraw_id=?");
$statement1->execute(array(1,$note,$_REQUEST['id']));

$detail="Withdraw By ".$method;
$date=date("Y-m-d h:i");
$type="Withdraw";
$statements = $pdo->prepare("INSERT INTO tbl_transaction (detail_id, type, description,transaction_date,user_balance) VALUES (?,?,?,?,?)");
$statements->execute(array($_REQUEST['id'],$type,$detail,$date,$credit));

header('location: withdraw.php');
?>