<?php
session_start();
require_once('config.php');
if(!isset($_SESSION['user'])){
    header('location: index.php');
}
date_default_timezone_set('Asia/Dhaka');
$date=date("Y-m-d h:i");

$i=0;
$type="Public";
$uid=$_SESSION['user']['user_id'];
$statement666 = $pdo->prepare("SELECT *
    FROM tbl_member WHERE user_id=?");
$statement666->execute(array($uid));
$result666 = $statement666->fetchAll(PDO::FETCH_ASSOC);
foreach ($result666 as $row666) {
    $m=$row666['credit'];
}


$statement = $pdo->prepare("SELECT * FROM tbl_message_received  ORDER BY message_id ASC");
$statement->execute(array($uid));
$resultsent = $statement->fetchAll(PDO::FETCH_ASSOC);

$statement1 = $pdo->prepare("SELECT *
   FROM tbl_payment");
$statement1->execute();
$result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);

$statement4 = $pdo->prepare("SELECT *
   FROM tbl_club");
$statement4->execute();
$result4 = $statement4->fetchAll(PDO::FETCH_ASSOC);

$statement9 = $pdo->prepare("SELECT * FROM tbl_sponsor JOIN tbl_member ON  tbl_sponsor.sponsor_user_id=tbl_member.user_id WHERE tbl_sponsor.user_id=?");
$statement9->execute(array($uid));
$result9 = $statement9->fetchAll(PDO::FETCH_ASSOC);

$statement2 = $pdo->prepare("SELECT *
   FROM tbl_member WHERE user_id=?");
$statement2->execute(array($_SESSION['user']['user_id']));
$result2 = $statement2->fetchAll(PDO::FETCH_ASSOC);
foreach ($result2 as $row2){
    $credit=$row2['credit'];
    $pass=$row2['password'];
}

$statement20 = $pdo->prepare("SELECT * FROM tbl_sponsor JOIN tbl_scroll");
$statement20->execute(array($uid));
$result20 = $statement20->fetchAll(PDO::FETCH_ASSOC);
foreach ($result20 as $row20) {
    $message=$row20['message'];
}

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

//change sponsor
if(isset($_POST['form5'])) {

	$state = $pdo->prepare("SELECT *
       FROM tbl_member WHERE user_name=?");
	$state->execute(array($_POST['referral_name']));
    $res = $state->fetchAll(PDO::FETCH_ASSOC);
    foreach ($res as $ro){
        $usid=$ro['user_id'];
    }
    $statement = $pdo->prepare("UPDATE tbl_member SET sponsor_id=? WHERE user_id=?");
    $statement->execute(array($usid,$_SESSION['user']['user_id']));

    $stateme = $pdo->prepare("INSERT INTO tbl_sponsor (sponsor_user_id, user_id) VALUES (?,?)");
    $stateme->execute(array($usid,$_SESSION['user']['user_id']));
}

//change club
if(isset($_POST['form6'])) {

	$statement = $pdo->prepare("UPDATE tbl_member SET club_id=? WHERE user_id=?");
	$statement->execute(array($_POST['club'],$_SESSION['user']['user_id']));
}

//send message
if(isset($_POST['form7'])) {

	date_default_timezone_set('Asia/Dhaka');
    $dates=date("Y-m-d");
    $time=date("h:i:sA");
    $statement = $pdo->prepare("INSERT INTO tbl_message_received (date, time, sent_by, message) VALUES (?,?,?,?)");
    $statement->execute(array($dates,$time,$_SESSION['user']['user_id'],$_POST['message']));
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
                                        <a href="#inboxmsg" class="list-group-item active text-center list-item">Inbox</a>
                                    </li>
                                    <li>
                                        <a href="#sentmsg" class="list-group-item text-center list-item">Sent</a>
                                    </li>
                                    <li>
                                        <a href="#" id="" class="list-group-item text-center list-item wDraw" data-toggle="modal" data-target="#newmsg">
                                            New Massage
                                        </a>
                                    </li>
                                </ul>
                            </div>


                            <?php include 'inc/massage.php'; ?>


                            <?php include 'inc/scripts.php'; ?>

                            <?php include 'inc/footer.php'; ?>