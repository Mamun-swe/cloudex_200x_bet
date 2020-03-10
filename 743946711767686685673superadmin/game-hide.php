<?php require_once('header.php'); ?>

<?php
if(!isset($_REQUEST['id'])) {
	header('location: logout.php');
	exit;
} else {
	// Check the id is valid or not
	$statement = $pdo->prepare("SELECT * FROM tbl_game WHERE game_id=?");
	$statement->execute(array($_REQUEST['id']));
	$total = $statement->rowCount();
	if( $total == 0 ) {
		header('location: logout.php');
		exit;
	}
}
?>

<?php
$final = "Hidden";

$statement = $pdo->prepare("UPDATE tbl_game SET game_status=? WHERE game_id=?");
$statement->execute(array($final,$_REQUEST['id']));

header('location: game.php');
?>