<?php require_once('header.php'); ?>

<?php
if(!isset($_REQUEST['id'])) {
	header('location: logout.php');
	exit;
} else {
	// Check the id is valid or not
	$statement = $pdo->prepare("SELECT * FROM tbl_stake WHERE stake_id=?");
	$statement->execute(array($_REQUEST['id']));
	$total = $statement->rowCount();
	if( $total == 0 ) {
		header('location: logout.php');
		exit;
	}
}
?>

<?php

	// Delete from tbl_club
	$statement = $pdo->prepare("DELETE FROM tbl_stake WHERE stake_id=?");
	$statement->execute(array($_REQUEST['id']));

	$page=$_REQUEST['page'];
	$url = "bet-option.php?id=$page";
	header("Location: ".$url);
?>