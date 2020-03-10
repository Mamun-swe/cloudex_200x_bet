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
  <div id="loginModal" class="" role="dialog" aria-hidden="false" style="display: block;">
    <div class="modal-dialog  ">
        <div class="alert-float alert alert-dismissable ajaxalert" id="" style="display: none">
            <button type="button" class="close ajaxclose" id="">×</button>
            <ul class="list-unstyled">
            </ul>
        </div>
        <div class="modal-content m-content" style="background: white;padding: 0">
            <div class="modal-header m-head" style="background: #1C69C2">
           <center><h4 class="modal-title" style="color: #D2D2D2"> &nbsp; Welcome to 200xbet Club</h4></center>     
            </div>
            <?php
            if(!empty($_SESSION['login_error'])){
                ?>   
                <div role='alert' class='alert alert-danger'>
                    <strong><?php echo $_SESSION['login_error']; ?></strong>
                </div>
                <?php
            }
            ?>
            <div class="modal-body" style="padding: 2% !important">
                <div class="signup-form">
                    <center><p>Club Login</p></center>
                    <div style="border: 1px solid #3d4045; background: #3d4045"></div>&nbsp;&nbsp;&nbsp;
                    <form action="" method="POST" style="padding: 0;box-shadow: none">
                        
                        <div id="formData">
                            <div id="errorSignIn" class="alert alert-danger errorSignIn" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                ×</button> <strong> Opps !!</strong> Please Insert Right Data !!
                            </div>
                            <div class="form-group">
                                <label>Club Name <span style="color: red">*</span></label>
                                <input type="text" class="form-control" name="user_name" id="userIdOfuser" placeholder="user name" required="">
                                <span id="userIdError" style="color: #C84038;font-family: initial;"></span>
                            </div>
                            <div class="form-group">
                                <label>User Password <span style="color: red">*</span></label>
                                <input type="password" class="form-control" name="password" value="" id="passwordOfuser" placeholder="password" required="required" pattern=".{6,}" title="6 characters minimum">
                                <span>Password at least 6 characters.</span>
                            </div>
                            <div class="form-group">
                                <button style="background: #1C69C2 !important;color: #fff" type="submit" name="form" class="btn btn-lg btn-block">Sign In</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Start Live Match -->

<!-- End Live Match -->
<!-- start Ipcomming Match -->
<div class="banner">
  	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;
</div>
<?php include 'inc/sponsormodal.php'; ?>
<?php include 'inc/modal.php'; ?>
<?php include 'inc/footer.php'; ?>
<?php include 'inc/betmodal.php'; ?>
<?php include 'inc/scripts.php'; ?>