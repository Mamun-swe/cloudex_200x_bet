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

$statement202 = $pdo->prepare("SELECT * FROM tbl_contact_number");
$statement202->execute();
$result202 = $statement202->fetchAll(PDO::FETCH_ASSOC);
foreach ($result202 as $row202) {
    $contact_number=$row202['number'];
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
<div id="wrapper-container">

        <!-- NEW -->
        <div class="justify-content-center p-0 container-fluid" id="content-container">
            <div class="contact-form container-fluid bg-light">

                <h3 style="color: white;" class="text-center">Contact Us   [For any need, call us in this number:   <?php echo $contact_number; ?>]</h3>

                <div class="row thin-dark-top-border">

                    <div class="col-12">


                        <form action="" method="post">
                            <div class="form-group row">
                                <label style="color: white;" class="col-3 col-form-label" for="full_name">Full Name</label>
                                <div class="col-9">
                                    <div class="input-group">
                                        <input id="full_name" name="full_name" placeholder="Full Name" type="text"
                                            aria-describedby="full_nameHelpBlock" required="required"
                                            class="form-control here">
                                    </div>
                                    <span style="color: white;" id="full_nameHelpBlock" class="form-text text-muted">Letters only, maximum 150
                                        characters.</span>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label style="color: white;" for="email" class="col-3 col-form-label">Email</label>
                                <div class="col-9">
                                    <div class="input-group">
                                        <input id="email" name="email" placeholder="Email" type="text"
                                            aria-describedby="emailHelpBlock" required="required"
                                            class="form-control here">
                                    </div>
                                    <span style="color: white;" id="emailHelpBlock" class="form-text text-muted">No special character, maximum
                                        150 characters.</span>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label style="color: white;" for="subject" class="col-3 col-form-label">Subject</label>
                                <div class="col-9">
                                    <div class="input-group">
                                        <input id="subject" name="subject" placeholder="Subject" type="text"
                                            class="form-control here" aria-describedby="subjectHelpBlock"
                                            required="required">
                                    </div>
                                    <span style="color: white;" id="subjectHelpBlock" class="form-text text-muted">Subject of your message,
                                        maximum 150 characters.</span>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label style="color: white;" for="message" class="col-3 col-form-label">Message</label>
                                <div class="col-9">
                                    <textarea id="message" name="message" cols="40" rows="5" class="form-control"
                                        aria-describedby="messageHelpBlock" required="required"></textarea>
                                    <span style="color: white;" id="messageHelpBlock" class="form-text text-muted">Description of your
                                        message, maximum 500 characters.</span>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <div class="offset-3 col-9">
                                    <button name="submit" type="submit"
                                        class="btn btn-dark mx-auto rounded-0 border-0 bg-dark text-white">Submit</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<?php include 'inc/modal.php'; ?>
<?php include 'inc/footer.php'; ?>

<?php include 'inc/scripts.php'; ?>