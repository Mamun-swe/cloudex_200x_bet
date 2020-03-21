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
		$club_id=$row666['club_id'];
		$sponsor_id=$row666['sponsor_id'];
	}
	$statement9 = $pdo->prepare("SELECT * FROM tbl_sponsor JOIN tbl_member ON  tbl_sponsor.sponsor_user_id=tbl_member.user_id WHERE tbl_sponsor.user_id=?");
	$statement9->execute(array($uid));
	$result9 = $statement9->fetchAll(PDO::FETCH_ASSOC);
	$statements = $pdo->prepare("SELECT *
		FROM tbl_member WHERE user_id=?");
	$statements->execute(array($sponsor_id));
	$results = $statements->fetchAll(PDO::FETCH_ASSOC);
	foreach ($results as $rows) {
		$sponsor_name=$rows['full_name'];
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
	if(isset($_POST['form6'])) {

		$statement = $pdo->prepare("UPDATE tbl_member SET club_id=? WHERE user_id=?");
		$statement->execute(array($_POST['club'],$_SESSION['user']['user_id']));
		$url = "wallet.php";
        header("Location: ".$url);
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

$statement4 = $pdo->prepare("SELECT * FROM tbl_club ORDER BY club_rank ASC");
$statement4->execute();
$result4 = $statement4->fetchAll(PDO::FETCH_ASSOC);
foreach ($result4 as $row4) {
    if($row4['club_id']==$club_id){
	$club_name=$row4['club_name'];
    }
}
if(empty($club_name)){
        $club_name="";
    }
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

<div class="">
	<section class="callaction ">
		<div class="content-wrap">
			<div class="container p-0">
				<div class="row">
					<div class="col-lg-12 bhoechie-tab-container">
						<div class=" bhoechie-tab-menu">
							<ul class="list-group tabMenu">
								<li>
									<a href="#" class="list-group-item active text-center list-item" >
										My Profile
									</a>
								</li>
								<li>
									<a href="#" class="list-group-item text-center list-item " id="deposit-numberW" data-toggle="modal" data-target="#deposit">
										Deposit Request
									</a>
								</li>
								<li>
									<a href="#" id="1" class="list-group-item text-center list-item wDraw" data-toggle="modal" data-target="#requestWithdrawModal">
										Withdraw Request
									</a>
								</li>
								<li>
									<a href="#" class="list-group-item text-center list-item" data-toggle="modal" data-target="#change-password-modal">
										Change Password
									</a>
								</li>
								<li>
									<a href="#" class="list-group-item text-center list-item" data-toggle="modal" data-target="#balance-transfer-modal">
										Balance Transfer
									</a>
								</li>
							</ul>
						</div>
						<div class="bhoechie-tab">
							<div class="bhoechie-tab-content ">
								<center>
									<table class="table table-bordered">
										<tbody>
											<tr>
												<th style="color: #1E5999; font-size: 17px;"><strong>Full Name</strong></th>
												<td><?php echo $_SESSION['user']['full_name']; ?></td>
											</tr>
											<tr>
												<th style="color: #1E5999; font-size: 17px;"><strong>Username</strong></th>
												<td><?php echo $_SESSION['user']['user_name']; ?></td>
											</tr>
											<tr>
												<th style="color: #1E5999; font-size: 17px;"><strong>Mobile No.</strong></th>
												<td><?php echo $_SESSION['user']['phone']; ?></td>
											</tr>
											<tr>
												<th style="color: #1E5999; font-size: 17px;"><strong>Email</strong></th>
												<td><?php echo $_SESSION['user']['email']; ?></td>
											</tr>
											<tr>
												<th style="color: #1E5999; font-size: 17px;"><strong>Club</strong></th>
												<td><?php echo $club_name; ?></td>
											</tr>
											<tr>
												<th style="color: #1E5999; font-size: 17px;">
													<strong>Change Club</strong>
												</th>  
												<form action="" method="post">
													<td>
														<select class="form-control" name="club">
															<option value="">Select Club</option>
															<?php
															foreach ($result4 as $row4) {
																?>
																<option value="<?php echo $row4['club_id']; ?>"><?php echo $row4['club_name']; ?></option>
																<?php
															}
															?>
														</select>
														<button type="submit" name="form6" class="btn btn-primary" style="margin-top: 5px;">Change Club
														</button>
													</td>
												</form>
											</tr>
												<tr>
												<th style="color: #1E5999; font-size: 17px;"><strong>Sponsor</strong></th>
												<td><?php echo $sponsor_name; ?></td>
											</tr>
										</tbody>
									</table>
								</center>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<?php include 'inc/modal.php'; ?>

<?php include 'inc/footer.php'; ?>
<?php include 'inc/scripts.php'; ?>


