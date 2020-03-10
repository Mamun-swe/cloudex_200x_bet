<?php
session_start();
require_once('config.php');
$uid=$_SESSION['user']['user_id'];
$statement = $pdo->prepare("UPDATE tbl_bet SET bet_status=? WHERE bet_id=?");
$statement->execute(array(3,$_REQUEST['id']));

$statement1 = $pdo->prepare("SELECT * FROM tbl_member WHERE user_id=?");
$statement1->execute(array($uid));
$result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);
foreach ($result1 as $row1) {
	$credit = $row1['credit'];
}
$final_amounts = $credit+$_REQUEST['sell'];
$statement1 = $pdo->prepare("UPDATE tbl_member SET credit=? WHERE user_id=?");
$statement1->execute(array($final_amounts,$uid));

//enter bet win transaction
$detail1="Bet Sell";
$date=date("Y-m-d h:i");
$type1="Bet Sell";
$statement8 = $pdo->prepare("INSERT INTO tbl_transaction (detail_id, type, description,transaction_date,user_balance) VALUES (?,?,?,?,?)");
$statement8->execute(array($_REQUEST['id'],$type1,$detail1,$date,$final_amounts));

header("location: statement.php");

?>