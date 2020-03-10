<?php
session_start();
date_default_timezone_set('Asia/Dhaka');
$date=date("Y-m-d h:i");
require_once('config.php');
if(!isset($_SESSION['user'])){
    header('location: index.php');
}
$stat = $pdo->prepare("SELECT *
    FROM tbl_payment");
$stat->execute();
$r = $stat->fetchAll(PDO::FETCH_ASSOC);

$uid=$_SESSION['user']['user_id'];
$pass=$_SESSION['user']['password'];
$m=0;
if(isset($_SESSION['user'])){
	$uid=$_SESSION['user']['user_id'];
	$pass=$_SESSION['user']['password'];
	$statement666 = $pdo->prepare("SELECT *
		FROM tbl_club_owner_balance_transfer WHERE club_owner_id=?");
	$statement666->execute(array($uid));
	$result666 = $statement666->fetchAll(PDO::FETCH_ASSOC);
	foreach ($result666 as $row666) {
		$m=$m+$row666['transfer_amount'];
	}
   if(empty($m)){
       $m=0;
   }
}

$statement = $pdo->prepare("SELECT *
    FROM tbl_deposit WHERE request_by=?");
$statement->execute(array($uid));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);

$statement2 = $pdo->prepare("SELECT *
    FROM tbl_withdraw WHERE request_by=?");
$statement2->execute(array($uid));
$result2 = $statement2->fetchAll(PDO::FETCH_ASSOC);

$statement4 = $pdo->prepare("SELECT *
    FROM tbl_transaction ORDER BY transaction_id DESC");
$statement4->execute();
$result4 = $statement4->fetchAll(PDO::FETCH_ASSOC);

$statement9 = $pdo->prepare("SELECT * FROM tbl_sponsor JOIN tbl_member ON  tbl_sponsor.sponsor_user_id=tbl_member.user_id WHERE tbl_sponsor.user_id=?");
$statement9->execute(array($uid));
$result9 = $statement9->fetchAll(PDO::FETCH_ASSOC);

$statement20 = $pdo->prepare("SELECT * FROM tbl_scroll");
$statement20->execute(array($uid));
$result20 = $statement20->fetchAll(PDO::FETCH_ASSOC);
foreach ($result20 as $row20) {
    $message=$row20['message'];
}

$statement21 = $pdo->prepare("SELECT * FROM tbl_bet 
    JOIN tbl_member ON tbl_bet.bet_by=tbl_member.user_id
    JOIN tbl_game ON tbl_bet.game_id=tbl_game.game_id
    JOIN tbl_stake ON tbl_bet.stake_id=tbl_stake.stake_id
    WHERE tbl_bet.bet_by=? ORDER BY bet_id DESC");
$statement21->execute(array($uid));
$result21 = $statement21->fetchAll(PDO::FETCH_ASSOC);

//password
if(isset($_POST['form3'])) {

    $current_password = strip_tags($_POST['current_password']);
    
    $new_password = strip_tags($_POST['new_password']);

    $confirm_password = strip_tags($_POST['confirm_password']);
    
    if( ($pass != md5($current_password)) OR ($confirm_password != $new_password)) {

    }

    else{
        $password = md5($new_password);
        $statement = $pdo->prepare("UPDATE tbl_member SET password=? WHERE user_id=?");
        $statement->execute(array($password,$_SESSION['user']['user_id']));
    }
}
?>
<?php include 'inc/head.php'; ?>
<?php include 'inc/color.php'; ?>
<?php include 'inc/header.php'; ?>
<div class="">
    <section class="callaction ">
        <div class="content-wrap p-0 ">
            <div class="container  p-0 ">
                <div class="row">
                    <div class="col-xs-12">
                        <div class=" bhoechie-tab-container">
                            <div class=" bhoechie-tab-menu">
                                <ul class="list-group tabMenu">
                                    <li>
                                        <a href="#allBets" class="list-group-item active text-center list-item">Bets</a>
                                    </li>
                                    
                                    <li>
                                        <a href="#allWithdrawals" class="list-group-item text-center list-item">Withdrawals</a>
                                    </li>
                                    
                                </ul>
                            </div>


                            <?php include 'inc/statment.php'; ?>


                            <?php include 'inc/scripts.php'; ?>

                            <?php include 'inc/footer.php'; ?>

