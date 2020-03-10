<?php 
include("login.php"); 
include("registration.php"); 
// if(!isset($_SESSION['user'])){
//     session_destroy();
//     header('location: index.php');
// }
date_default_timezone_set('Asia/Dhaka');
$date=date("Y-m-d h:i");
if(isset($_SESSION['user'])){
  $uid=$_SESSION['user']['user_id'];
  $pass=$_SESSION['user']['password'];
  $statement666 = $pdo->prepare("SELECT *
    FROM tbl_member WHERE user_id=?");
  $statement666->execute(array($uid));
  $result666 = $statement666->fetchAll(PDO::FETCH_ASSOC);
  foreach ($result666 as $row666) {
    $m=$row666['credit'];
  }
  $statement9 = $pdo->prepare("SELECT * FROM tbl_sponsor JOIN tbl_member ON  tbl_sponsor.sponsor_user_id=tbl_member.user_id WHERE tbl_sponsor.user_id=?");
  $statement9->execute(array($uid));
  $result9 = $statement9->fetchAll(PDO::FETCH_ASSOC);

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
}
$statement1 = $pdo->prepare("SELECT *
  FROM tbl_payment");
$statement1->execute();
$result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);

$statement2 = $pdo->prepare("SELECT *
  FROM tbl_club");
$statement2->execute();
$result2 = $statement2->fetchAll(PDO::FETCH_ASSOC);

$hide="Hidden";
$state = $pdo->prepare("SELECT *
  FROM tbl_game WHERE game_status!=? ORDER BY game_id ASC");
$state->execute(array($hide));
$results = $state->fetchAll(PDO::FETCH_ASSOC);

$statement20 = $pdo->prepare("SELECT * FROM tbl_scroll");
$statement20->execute();
$result20 = $statement20->fetchAll(PDO::FETCH_ASSOC);
foreach ($result20 as $row20) {
  $message=$row20['message'];
}


?>


<?php include 'inc/head.php'; ?>
<?php include 'inc/color.php'; ?>
<?php include 'inc/header.php'; ?>
<?php include 'inc/scroll.php'; ?>

<?php include 'inc/slide.php'; ?>

<div class="banner">
  <img src="images/sport-betting-banner-2.jpg" style="width: 100%;">
</div>

<!-- Start Live Match -->
<?php include 'inc/live.php'; ?>

<!-- End Live Match -->
<!-- start Ipcomming Match -->
<?php include 'inc/upcomming.php'; ?>
<?php include 'inc/sponsormodal.php'; ?>
<?php include 'inc/loginmodal.php'; ?>
<?php include 'inc/modal.php'; ?>
<?php include 'inc/footer.php'; ?>
<?php include 'inc/betmodal.php'; ?>
<?php include 'inc/scripts.php'; ?>