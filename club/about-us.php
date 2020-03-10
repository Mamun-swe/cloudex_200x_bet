<?php 
include("login.php"); 
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
include("registration.php"); 
date_default_timezone_set('Asia/Dhaka');
$date=date("Y-m-d h:i");
$statement1 = $pdo->prepare("SELECT *
 FROM tbl_payment");
$statement1->execute();
$result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);

$statement2 = $pdo->prepare("SELECT *
 FROM tbl_club");
$statement2->execute();
$result2 = $statement2->fetchAll(PDO::FETCH_ASSOC);

$state = $pdo->prepare("SELECT *
 FROM tbl_about ORDER BY about_id ASC");
$state->execute();
$results = $state->fetchAll(PDO::FETCH_ASSOC);

$statement20 = $pdo->prepare("SELECT * FROM tbl_scroll");
$statement20->execute();
$result20 = $statement20->fetchAll(PDO::FETCH_ASSOC);
foreach ($result20 as $row20) {
    $message=$row20['message'];
}

if(isset($_POST['submit'])) {

    $statement = $pdo->prepare("INSERT INTO tbl_contact_message (date,full_name, email, subject, message) VALUES (?,?,?,?,?)");
    $statement->execute(array($date,$_POST['full_name'],$_POST['email'],$_POST['subject'],$_POST['message']));
}


?>
<?php include 'inc/head.php'; ?>
<?php include 'inc/color.php'; ?>
<?php include 'inc/header.php'; ?>
<?php include 'inc/scroll.php'; ?>

</div>
</div>
<!-- NEW -->
<?php 
foreach ($results as $result) {
  $about=$result['about'];
}  ?>
<div class="row live-sports">
    <div class="live-video-description mt-3">
        <p><?php echo $about ; ?></p>
    </div>
</div>
</div>

</section>
<?php include 'inc/modal.php'; ?>
<?php include 'inc/footer.php'; ?>

<?php include 'inc/scripts.php'; ?>