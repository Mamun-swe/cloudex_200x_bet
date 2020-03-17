<?php
ob_start();
session_start();
include("inc/config.php");
include("inc/functions.php");
include("inc/CSRF_Protect.php");
$csrf = new CSRF_Protect();
$error_message = '';
$success_message = '';
$error_message1 = '';
$success_message1 = '';



// Check if the user is logged in or not
if(!isset($_SESSION['admin']) AND empty($_SESSION['admin'])) {
	header('location: login.php');
	exit;
}
?>

<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>200X Bet Admin Panel</title>

	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/ionicons.min.css">
	<link rel="stylesheet" href="css/datepicker3.css">
	<link rel="stylesheet" href="css/all.css">
	<link rel="stylesheet" href="css/select2.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.css">
	<link rel="stylesheet" href="css/jquery.fancybox.css">
	<link rel="stylesheet" href="css/AdminLTE.min.css">
	<link rel="stylesheet" href="css/_all-skins.min.css">
	<link rel="stylesheet" href="css/on-off-switch.css"/>
	<link rel="stylesheet" href="css/summernote.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/custom.css">
	<link rel="stylesheet" href="vanilla-calendar/vanilla-calendar-min.css">
	<link href="css/select2.min.css" rel="stylesheet" />

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
    integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	


	<script src="js/jquery-2.2.4.min.js"></script>
	<script src="vanilla-calendar/vanilla-calendar-min.js"></script>
	<script src="js/select2.min.js"></script>
</head>

<body class="hold-transition fixed skin-blue sidebar-mini">

	<div class="wrapper">

		<header class="main-header">

			<a href="index.php" class="logo">
				ADMIN PANEL
			</a>

			<nav class="navbar navbar-static-top">
				
				<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
					<span class="sr-only">Toggle navigation</span>
				</a>

				<span style="float:left;line-height:50px;color:#fff;padding-left:15px;font-size:18px;">200X Bet Admin Panel</span>

				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<li class="dropdown user user-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<?php
								if(isset($_SESSION['admin'])) {
									?>
									
									<?php
								}
								?>
								<span class="hidden-xs"><?php echo $_SESSION['admin']['full_name']; ?></span>
							</a>
							<ul class="dropdown-menu">
								<li class="user-footer">
									<div>
										<a href="profile-edit.php" class="btn btn-default btn-flat">Edit Profile</a>
									</div>
									<div>
										<a href="logout.php" class="btn btn-default btn-flat">Log out</a>
									</div>
								</li>
							</ul>
						</li>
					</ul>
				</div>

			</nav>
		</header>

		<?php $cur_page = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1); ?>

		<aside class="main-sidebar">
			<section class="sidebar">

				<ul class="sidebar-menu">
					<?php 
					if($_SESSION['admin']['role'] == 'Super admin'){
						?>
						<li class="treeview <?php if($cur_page == 'index.php') {echo 'active';} ?>">
							<a href="index.php">
								<i class="fa fa-hand-o-right"></i> <span>Dashboard</span>
							</a>
						</li>

						<li class="treeview <?php if( ($cur_page == 'user.php')|| ($cur_page == 'user-add.php') || ($cur_page == 'user-edit.php') ) {echo 'active';} ?>">
							<a href="user.php">
								<i class="fa fa-hand-o-right"></i> <span>User List</span>
							</a>
						</li>

						<li class="treeview <?php if( ($cur_page == 'sponsor.php') ) {echo 'active';} ?>">
							<a href="sponsor.php">
								<i class="fa fa-hand-o-right"></i> <span>Sponsor List</span>
							</a>
						</li>

			        <li class="treeview <?php if( ($cur_page == 'private-messages-sent.php') || ($cur_page == 'public-messages-sent.php') || ($cur_page == 'send-public-message.php') || ($cur_page == 'received_message.php') || ($cur_page == 'reply.php') || ($cur_page == 'send-private-message.php') || ($cur_page == 'contact-message.php') ) {echo 'active';} ?>">
  					    <a href="#">
							<i class="fa fa-hand-o-right"></i>
							<span>Message</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
			            <ul class="treeview-menu">
			                <li><a href="public-messages-sent.php"><i class="fa fa-circle-o"></i>Public Sent Message</a></li>
  						    <li><a href="private-messages-sent.php"><i class="fa fa-circle-o"></i>Private Sent Message</a></li>
							<li><a href="received_message.php"><i class="fa fa-circle-o"></i> Received Message</a></li>
							<li><a href="contact-message.php"><i class="fa fa-circle-o"></i> Contact Message</a></li>
					    </ul>
					</li>

					<li class="treeview <?php if( ($cur_page == 'game.php') || ($cur_page == 'game-add.php') || ($cur_page == 'game-edit.php') || ($cur_page == 'bet-option.php') || ($cur_page == 'bet-option-add.php') || ($cur_page == 'bet-option-edit.php') || ($cur_page == 'country.php') || ($cur_page == 'country-add.php') || ($cur_page == 'country-edit.php') || ($cur_page == 'shipping-cost.php') || ($cur_page == 'shipping-cost-edit.php') || ($cur_page == 'top-category.php') || ($cur_page == 'top-category-add.php') || ($cur_page == 'top-category-edit.php') || ($cur_page == 'mid-category.php') || ($cur_page == 'mid-category-add.php') || ($cur_page == 'mid-category-edit.php') || ($cur_page == 'end-category.php') || ($cur_page == 'end-category-add.php') || ($cur_page == 'end-category-edit.php') ) {echo 'active';} ?>">
						<a href="game.php">
							<i class="fa fa-hand-o-right"></i><span>Game List</span>
						</a>
					</li>
					
					<li class="treeview <?php if( ($cur_page == 'finish-game.php') ) {echo 'active';} ?>">
						<a href="finish-game.php">
							<i class="fa fa-hand-o-right"></i><span>Finished Game List</span>
						</a>
					</li>

					<li class="treeview <?php if( ($cur_page == 'bet.php') ) {echo 'active';} ?>">
						<a href="bet.php">
							<i class="fa fa-hand-o-right"></i><span>Bet List</span>
						</a>
					</li>

					<li class="treeview <?php if( ($cur_page == 'deposit.php')|| ($cur_page == 'deposit-add.php') || ($cur_page == 'deposit-edit.php') ) {echo 'active';} ?>">
						<a href="deposit.php">
							<i class="fa fa-hand-o-right"></i> <span>Deposit List</span>
						</a>
					</li>
					
					
					<li class="treeview <?php if( ($cur_page == 'withdraw.php')|| ($cur_page == 'withdraw-add.php') || ($cur_page == 'withdraw-edit.php') ) {echo 'active';} ?>">
						<a href="withdraw.php">
							<i class="fa fa-hand-o-right"></i> <span>Withdraw List</span>
						</a>
					</li>

					

					<li class="treeview <?php if( ($cur_page == 'payment.php')|| ($cur_page == 'payment-add.php') || ($cur_page == 'payment-edit.php') ) {echo 'active';} ?>">
						<a href="payment.php">
							<i class="fa fa-hand-o-right"></i> <span>Payment Options</span>
						</a>
					</li>

					<li class="treeview <?php if( ($cur_page == 'club.php')|| ($cur_page == 'club-add.php') || ($cur_page == 'club-edit.php') ) {echo 'active';} ?>">
						<a href="club.php">
							<i class="fa fa-hand-o-right"></i> <span>Club List</span>
						</a>
					</li>

					<li class="treeview <?php if( ($cur_page == 'video.php') || ($cur_page == 'add-video.php') || ($cur_page == 'edit-video.php') || ($cur_page == 'contact-us.php') || ($cur_page == 'contact-us-edit.php') || ($cur_page == 'home-color.php') || ($cur_page == 'home-color-edit.php') || ($cur_page == 'terms.php') || ($cur_page == 'terms-add.php') || ($cur_page == 'terms-edit.php') || ($cur_page == 'scroll.php') || ($cur_page == 'scroll-edit.php') || ($cur_page == 'about.php') || ($cur_page == 'about-edit.php') ) {echo 'active';} ?>">
						<a href="#">
							<i class="fa fa-hand-o-right"></i>
							<span>Website Settings</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
 							<!--<li><a href="home-color.php"><i class="fa fa-circle-o"></i> Home Page Color</a></li> -->
							<li><a href="scroll.php"><i class="fa fa-circle-o"></i> Scroll Message</a></li>
							<li><a href="terms.php"><i class="fa fa-circle-o"></i> Terms and Conditions</a></li>
							<li><a href="video.php"><i class="fa fa-circle-o"></i>Youtube</a></li>
							<li><a href="about.php"><i class="fa fa-circle-o"></i> About Us</a></li>
							<li><a href="contact-us.php"><i class="fa fa-circle-o"></i> Contact Us</a></li>
						</ul>
					</li>
					
					<li class="treeview <?php if( ($cur_page == 'admin.php')|| ($cur_page == 'admin-add.php') ) {echo 'active';} ?>">
						<a href="admin.php">
							<i class="fa fa-hand-o-right"></i> <span>Admin List</span>
						</a>
					</li>
					
					<li class="treeview <?php if( ($cur_page == 'accounts_user.php') || ($cur_page == 'accounts_game_stake.php') || ($cur_page == 'edit-video.php') || ($cur_page == 'contact-us.php') || ($cur_page == 'contact-us-edit.php') || ($cur_page == 'home-color.php') || ($cur_page == 'home-color-edit.php') || ($cur_page == 'terms.php') || ($cur_page == 'terms-add.php') || ($cur_page == 'terms-edit.php') || ($cur_page == 'scroll.php') || ($cur_page == 'scroll-edit.php') || ($cur_page == 'about.php') || ($cur_page == 'about-edit.php') ) {echo 'active';} ?>">
						<a href="#">
							<i class="fa fa-hand-o-right"></i>
							<span>Accounts</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
 							<li><a href="accounts_user.php"><i class="fa fa-circle-o"></i> User Accounts</a></li> 
							<li><a href="accounts_game_stake.php"><i class="fa fa-circle-o"></i> Game Stake</a></li>
							<li><a href="balance_add_return.php"><i class="fa fa-circle-o"></i> Balance Add & Return</a></li>
							
						</ul>
					</li>
				<?php }
				if($_SESSION['admin']['role'] == 'Admin') { ?>
					<li class="treeview <?php if($cur_page == 'index.php') {echo 'active';} ?>">
						<a href="index.php">
							<i class="fa fa-hand-o-right"></i> <span>Dashboard</span>
						</a>
					</li>
					<li class="treeview <?php if( ($cur_page == 'game.php') || ($cur_page == 'game-add.php') || ($cur_page == 'game-edit.php') || ($cur_page == 'bet-option.php') || ($cur_page == 'bet-option-add.php') || ($cur_page == 'bet-option-edit.php') || ($cur_page == 'country.php') || ($cur_page == 'country-add.php') || ($cur_page == 'country-edit.php') || ($cur_page == 'shipping-cost.php') || ($cur_page == 'shipping-cost-edit.php') || ($cur_page == 'top-category.php') || ($cur_page == 'top-category-add.php') || ($cur_page == 'top-category-edit.php') || ($cur_page == 'mid-category.php') || ($cur_page == 'mid-category-add.php') || ($cur_page == 'mid-category-edit.php') || ($cur_page == 'end-category.php') || ($cur_page == 'end-category-add.php') || ($cur_page == 'end-category-edit.php') ) {echo 'active';} ?>">
						<a href="game.php">
							<i class="fa fa-hand-o-right"></i><span>Game List</span>
						</a>
					</li>
					 <li class="treeview <?php if( ($cur_page == 'private-messages-sent.php') || ($cur_page == 'public-messages-sent.php') || ($cur_page == 'send-public-message.php') || ($cur_page == 'received_message.php') || ($cur_page == 'reply.php') || ($cur_page == 'send-private-message.php') || ($cur_page == 'contact-message.php') ) {echo 'active';} ?>">
  					    <a href="#">
							<i class="fa fa-hand-o-right"></i>
							<span>Message</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
			            <ul class="treeview-menu">
			                <li><a href="public-messages-sent.php"><i class="fa fa-circle-o"></i>Public Sent Message</a></li>
  						    <li><a href="private-messages-sent.php"><i class="fa fa-circle-o"></i>Private Sent Message</a></li>
							<li><a href="received_message.php"><i class="fa fa-circle-o"></i> Received Message</a></li>
							<li><a href="contact-message.php"><i class="fa fa-circle-o"></i> Contact Message</a></li>
					    </ul>
					</li>
				<?php } 
					if($_SESSION['admin']['role'] == 'Deposite') {
				?>
				
					<li class="treeview <?php if( ($cur_page == 'deposit.php')|| ($cur_page == 'deposit-add.php') || ($cur_page == 'deposit-edit.php') ) {echo 'active';} ?>">
						<a href="deposit.php">
							<i class="fa fa-hand-o-right"></i> <span>Deposit List</span>
						</a>
					</li>
				
				<?php
					}
				?>

				<?php 
					if($_SESSION['admin']['role'] == 'Withdraw') {
				?>
					<li class="treeview <?php if( ($cur_page == 'withdraw.php')|| ($cur_page == 'withdraw-add.php') || ($cur_page == 'withdraw-edit.php') ) {echo 'active';} ?>">
						<a href="withdraw.php">
							<i class="fa fa-hand-o-right"></i> <span>Withdraw List</span>
						</a>
					</li>
				<?php
					}
				?>
				
			</ul>
		</section>
	</aside>


	<div class="content-wrapper">