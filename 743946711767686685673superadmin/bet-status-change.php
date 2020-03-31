<?php require_once('header.php'); ?>

<?php
if(!isset($_REQUEST['id'])) {
	header('location: logout.php');
	exit;
} else {
	// Check the id is valid or not
	$statement = $pdo->prepare("SELECT * FROM tbl_stake WHERE game_id=?");
	$statement->execute(array($_REQUEST['id']));
	$total = $statement->rowCount();
	if( $total == 0 ) {
		header('location: logout.php');
		exit;
	} else {
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
		foreach ($result as $row) {
			$status = $row['stake_status'];
		}
	}
}
?>

<?php
if($status == 0) {
	$final = 1;
} else {
	$final = 0;
}
$statement = $pdo->prepare("UPDATE tbl_stake SET stake_status=? WHERE game_id=?");
$statement->execute(array($final,$_REQUEST['id']));

// $page=$_REQUEST['page'];
// $url = "bet-option.php?id=$page";
// header("Location: ".$url);
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>