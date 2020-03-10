<?php
require_once('config.php');
if(!isset($_REQUEST['id'])) {
	header('location: logout.php');
	exit;
} else {
	// Check the id is valid or not
	$statement = $pdo->prepare("SELECT * FROM tbl_withdraw WHERE withdraw_id=?");
	$statement->execute(array($_REQUEST['id']));
	$total = $statement->rowCount();
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);
	if( $total == 0 ) {
		header('location: logout.php');
		exit;
	}else {
		foreach ($result as $row) {
			$userid = $row['request_by'];
		}
	}
}
?>
<?php
    $note="Canceled by user";
	//get user balance
	$stat = $pdo->prepare("SELECT * FROM tbl_member WHERE user_id=?");
    $stat->execute(array($userid));
    $res = $stat->fetchAll(PDO::FETCH_ASSOC);
    foreach ($res as $ro) {
		$balance = $ro['credit'];
	}
	
	//get withdraw amount
	$state = $pdo->prepare("SELECT * FROM tbl_withdraw WHERE withdraw_id=?");
    $state->execute(array($_REQUEST['id']));
    $results = $state->fetchAll(PDO::FETCH_ASSOC);
    foreach ($results as $row) {
    	$credit = $row['amount'];
    	$method = $row['method'];
    }
    $final_amount = $balance+$credit;
    $statement = $pdo->prepare("UPDATE tbl_member SET credit=? WHERE user_id=?");
    $statement->execute(array($final_amount,$userid));
	
	
	
	$statement1 = $pdo->prepare("UPDATE tbl_withdraw SET withdraw_status=?, withdraw_note=? WHERE withdraw_id=?");
    $statement1->execute(array(3,$note,$_REQUEST['id']));
    
    $detail="Withdraw By ".$method;
    $date=date("Y-m-d h:i");
    $type="Withdraw";
    $statements = $pdo->prepare("INSERT INTO tbl_transaction (detail_id, type, description,transaction_date,user_balance) VALUES (?,?,?,?,?)");
    $statements->execute(array($_REQUEST['id'],$type,$detail,$date,$final_amount));
    header('location: statement.php');
		
?>