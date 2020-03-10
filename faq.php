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
							FROM tbl_game ORDER BY game_id ASC");
$state->execute();
$results = $state->fetchAll(PDO::FETCH_ASSOC);

$statement20 = $pdo->prepare("SELECT * FROM  tbl_scroll");
$statement20->execute();
$result20 = $statement20->fetchAll(PDO::FETCH_ASSOC);
foreach ($result20 as $row20) {
    $message=$row20['message'];
}


?>
<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Betasia|Largest Betting portal in Asia</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./css/daterangepicker.css" />

    <link rel="stylesheet" type="text/css" href="./css/style.css">

    <!--    Theme Specific CSS-->
    <link rel="stylesheet" type="text/css" href="./css/betwin96.css">

    <link rel="shortcut icon" type="image/png" href="./images/favicon.png" />

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="none, noindex, noarchive, nofollow, nosnippet, notranslate, noimageindex" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>

<body class="bg-black">

    <!-- NEW -->
    <div class="container-fluid bg-black pull-center p-0" id="loginRegister">

        <!-- NEW -->
        <div class="pull-center p-10 container-fluid" id="nav-content-container">

            <nav class="navbar navbar-expand-md navbar-dark">

                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#topNavbar"
                    aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand hm-HeaderModule_Logo" href="index.php">
                    <img src="./images/logo.png" alt="Logo" class="responsive">
                </a>

                <div class="navbar-collapse collapse" id="topNavbar">

                    <ul class="navbar-nav mr-auto">
                        <?php
                        if(!isset($_SESSION['user'])){
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact-us.php">Contact Us</a>
                        </li>
                        <?php
                        }
                        else
                        {
                        ?>
                        <li class="nav-item">
                            <a class="nav-link nav-link active" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact-us.php">Contact Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link inactive" href="message.php">Inbox</a>
                        </li>
                        <?php
                        }
                        ?>
                    </ul>
                    <?php
                    if(isset($_SESSION['user'])){
                    ?>
                        <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown has-mega-menu">
                            <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdown04"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['user']['user_name']; ?></a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown04">
                                <div class="px-0 container container-sm">
                                    <div class="row">


                                        <div class="col-sm-6 col-md-x">

                                            <a class="dropdown-item" href="profile.php">My
                                                Profile</a>
                                            <a class="dropdown-item"
                                                href="statement.php">My Statement</a>
                                            <a class="dropdown-item" href="javascript:void(0);"
                                                 data-toggle="modal"
                                                data-target="#userClubModal">My Sponsor</a>
                                            <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal"
                                                data-target="#requestDepositModal">Request Deposit</a>
                                            <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal"
                                                data-target="#requestWithdrawModal">Request Withdraw</a>
                                            <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal"
                                                data-target="#change-password-modal">Change Password</a>
                                        </div>

                                        <div class="col-sm-6 col-md-x">
                                            <a style="color: #e90099;" id="user_balance" class="dropdown-item"
                                                href="#">Balance (<?php echo $m; ?>)</a>
                                            <div class="dropdown-divider"></div>
                                            <a style="color:red;" class="dropdown-item"
                                                href="logout.php">Logout</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <?php
                    }
                    else{
                        
                    ?>
                    <!-- Guest Menu -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-toggle="modal"
                                data-target="#registrationModal">Sign Up</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-toggle="modal" data-target="#loginModal">Login</a>
                        </li>
                    </ul>
                    <?php
                    }
                    ?>
                    <!-- Guest Menu -->

                    <!-- User Menu -->
                    <!-- User Menu -->
                </div>

                <?php
                if(isset($_SESSION['user'])){
                ?>
                <a class="nav-link " href="message.php"><span
                        class="badge-notification mt-5">Inbox</span></a>
                <?php
                }
                ?>
                <a id="multi_bet_stack_count" class="nav-link" href="javascript:void(0);">
                    <span class="badge-notification mt-5" data-badge="">Bet Slip</span>
                </a>
                <span id="clock" style="color:white;">
                    <p><?php echo date("d-m-Y"); ?></p>
                    <p id="timestamp"></p>
                </span>
            </nav>
            <?php
            if(isset($_SESSION['user'])){
            ?>
            <div class="header-buttons">
                <a style="background-color: #4372E5;" data-toggle="modal" data-target="#requestDepositModal" class="btn register bonus-waiting" href="#">
                    <span class="">
                        <strong>Balance: <?php echo $m; ?></strong>
                    </span>
                </a>
                <a style="background-color: red;" data-toggle="modal" data-target="#requestDepositModal" class="btn login" href="#"><strong>Deposit</strong></a>
            </div>
            <?php
            }
            else{
                
            ?>
            <div class="header-buttons">
                <a style="background-color:#dbff66;" data-toggle="modal" data-target="#registrationModal" class="btn register bonus-waiting" href="#">
                    <span class="">
                        <strong>Register now!</strong>
                    </span>
                </a>
                <a style="background-color: #4372E5;" data-toggle="modal" data-target="#loginModal" class="btn login" href="#"><strong>Log In</strong></a>
            </div>
            
            <?php
            }
            if(isset($_SESSION['user'])){
            ?>
            
            <!-- User Club Modal -->
            <div class="modal fade" id="userClubModal" tabindex="-1" role="dialog"
                aria-labelledby="userClubModalModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content rounded-0">
                        <div class="modal-header bg-dark rounded-0">
                            <h5 class="modal-title text-white" id="userClubModalModalLabel">
                                My Sponsors</h5>
                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">

                            <div class="table-responsive-md">

                                <table v-if=""
                                    class="table table-sm table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">SN.</th>
                                            <th scope="col" class="text-center">Joining Date</th>
                                            <th scope="col" class="text-center">Recent Bet Date</th>
                                            <th scope="col">Name</th>
                                            <th scope="col" class="text-center">Username</th>
                                            <th scope="col" class="text-center">Total Bet</th>
                                            <th scope="col" class="text-center">Commission Earned</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i=0;
                                        $commission=0;
                                        $last="--";
                                        $total="--";
                                        $total_commission=0;
                                        $total_bet=0;
                                        foreach ($result9 as $row9) {
                                            
                                            $i++;
                                            $statement10 = $pdo->prepare("SELECT * FROM tbl_commission WHERE commission_to=?");
                                            $statement10->execute(array($row9['sponsor_user_id']));
                                            $total = $statement10->rowCount(); 
                                            $result10 = $statement10->fetchAll(PDO::FETCH_ASSOC);
                                            if($total==0) {
                                                $commission=0;
                                            }
                                            else{
                                                foreach ($result10 as $row10) {
                                                    $commission=$commission+$row10['amount'];
                                                }
                                            }
                                            $total_commission=$total_commission+$commission;
                                            
                                            $statement11 = $pdo->prepare("SELECT MAX(bet_id),date FROM tbl_bet WHERE bet_by=?");
                                            $statement11->execute(array($row9['sponsor_user_id']));
                                            // $total1 = $statement11->rowCount(); 
                                            $result11 = $statement11->fetchAll(PDO::FETCH_ASSOC);
                                            
                                            $statement12 = $pdo->prepare("SELECT * FROM tbl_bet WHERE bet_by=?");
                                            $statement12->execute(array($row9['sponsor_user_id']));
                                            $total1 = $statement12->rowCount(); 
                                            $result12 = $statement12->fetchAll(PDO::FETCH_ASSOC);
                                            
                                            if($total1==0) {
                                                $last="No Bet Yet";
                                                $total="0";
                                            }
                                            else{
                                                foreach ($result11 as $row11) {
                                                    $last=$row11['date'];
                                                }
                                                foreach ($result12 as $row12) {
                                                    $total=$total+$row12['amount'];
                                                }
                                            }
                                            $total_bet=$total_bet+$total;
                                        ?>
                                        <tr>
                                            <td scope="col"><?php echo $i; ?></td>
                                            <td scope="col" class="text-center"><?php echo $row9['joining_date']; ?></td>
                                            <td scope="col" class="text-center"><?php echo $last; ?></td>
                                            <td scope="col"><?php echo $row9['full_name']; ?></td>
                                            <td scope="col" class="text-center"><?php echo $row9['user_name']; ?></td>
                                            <td scope="col" class="text-center"><?php echo $total; ?></td>
                                            <td scope="col" class="text-center text-success"><?php echo $commission; ?></td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th scope="col" colspan="5">Total</th>
                                            <th scope="col" class="text-center"><?php echo $total_bet; ?></th>
                                            <th scope="col" class="text-center"><?php echo $total_commission; ?></th>
                                        </tr>
                                    </tfoot>
                                </table>

                            </div>

                        </div>

                        <div class="modal-footer rounded-0">
                            <button data-dismiss="modal" type="button"
                                class="btn btn-danger btn-lg rounded-0 border-0 pull-right">Close</button>
                        </div>

                    </div>
                </div>
            </div>
            <!-- User Club Modal -->
            <?php
            }
            ?>

            <!-- Registration Modal -->
            <div class="modal fade" id="registrationModal" tabindex="-1" aria-labelledby="registrationModalLabel"
                role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content rounded-0">
                        <div class="modal-header bg-dark rounded-0">
                            <h5 class="modal-title text-white" id="registrationModalLabel">Register</h5>
                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form action="" method="post">

                            <div class="modal-body">

                                <div class="form-row">

                                    <div class="col-md-6 mb-5">
                                        <label for="user-reg-name" class="col-form-label">Full Name <span
                                                class="text-danger">* </span>:</label>
                                        <input type="text"
                                            class="form-control" id="user-reg-reg-name" name="full_name"
                                            placeholder="Full Name" required="required">
                                    </div>

                                    <div class="col-md-6 mb-5">
                                        <label for="user-reg-username" class="col-form-label">User Id <span
                                                class="text-danger">* </span>:</label>
                                        <input type="text"
                                            class="form-control" id="user-reg-username" name="username"
                                            placeholder="Username" required="required">
                                        <?php
                                        if(isset($_SESSION['register_error'])){
                                        ?>   
                                        <small style="color: red;" id="mobileNumberHelp" class="form-text">
                                            <?php echo $_SESSION['register_error']; ?>
                                        </small>
                                        <?php
                                        }
                                        ?>
                                    </div>

                                </div>

                                <div class="form-row">

                                    <div class="col-md-6 mb-5">
                                        <label for="user-reg-mobile" class="col-form-label">Mobile Number <span
                                                class="text-danger">* </span>:</label>
                                        <input type="text"
                                            class="form-control" id="user-reg-mobile" name="number"
                                            placeholder="Mobile Number" required="required"
                                            aria-describedby="mobileNumberHelp">
                                        <small id="mobileNumberHelp" class="form-text text-muted">
                                            Format: 01(5-9)-xxxxxx
                                        </small>
                                    </div>

                                    <div class="col-md-6 mb-5">
                                        <label for="user-reg-email" class="col-form-label">E-mail:</label>
                                        <input type="email" name="email"
                                            class="form-control" id="user-reg-email" placeholder="Email"
                                            aria-describedby="emailHelp">
                                        <small id="emailHelp" class="form-text text-muted">
                                            Format: abc09@example.com
                                        </small>
                                    </div>

                                </div>

                                <div class="form-row">

                                    <div class="col-md-6 mb-5">
                                        <label for="user-reg-password" class="col-form-label">Password <span
                                                class="text-danger">* </span>:</label>
                                        <input type="password"
                                            class="form-control" id="user-reg-password" placeholder="Password" name="password"
                                            required="required" minlength="6"
                                            aria-describedby="passwordHelpBlock">
                                        <small id="passwordHelpBlock" class="form-text text-muted">
                                            Password at least 6 characters.
                                        </small>
                                    </div>

                                    <div class="col-md-6 mb-5">
                                        <label for="user-reg-cnf_password" class="col-form-label">Confirm Password <span
                                                class="text-danger">* </span>:</label>
                                        <input type="password" name="confirm_password"
                                            class="form-control" id="user-reg-cnf_password"
                                            required="required" minlength="6" placeholder="Confirm Password"
                                            aria-describedby="cnfPasswordHelpBlock">
                                        <small id="cnfPasswordHelpBlock" class="form-text text-muted">
                                            Must match password.
                                        </small>
                                    </div>

                                </div>

                                <div class="form-row">
                                    <div class="col-md-6 mb-5">
                                        <label for="user-reg-club_id" class="col-form-label">Select Club:<span
                                                class="text-danger">* </span></label>

                                        <div dir="auto" class="dropdown bg-light-gray single searchable">
                                            <select class="form-control" name="club" required="required">
                                                <option value="">Select Club</option>
                                                <?php
                                                    foreach ($result2 as $row2) {
                                                ?>
                                                    <option value="<?php echo $row2['club_id']; ?>"><?php echo $row2['club_name']; ?></option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-5">
                                        <label for="user-reg-sponsor_id" class="col-form-label">Sponsor's
                                            Username <span
                                                class="text-danger">* </span>:</label>
                                        <input type="text"
                                            class="form-control" name="sponsor_name" id="user-reg-sponsor_id" placeholder="Sponsor username" />
                                    </div>
                                </div>

                            </div>

                            <div class="modal-footer rounded-0">
                                <button type="submit" name="registration"
                                    class="btn btn-dark mx-auto rounded-0 border-0 btn-block bg-dark text-white font-weight-bold position-relative">
                                    Register
                                    <div class="loading-spinner login-spinner-wrapper display_none"></div>
                                </button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
            <!-- Registration Modal -->

            <!-- Login Modal -->
            <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content rounded-0">
                        <div class="modal-header bg-dark rounded-0">
                            <h5 class="modal-title text-white" id="loginModalLabel">Login</h5>
                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
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
                        

                        <form action="" method="post">

                            <div class="modal-body">

                                <div class="form-group">
                                    <label for="user-email" class="col-form-label">User Id:</label>
                                    <input type="text" class="form-control" name="user_name"
                                        placholder="Username" required="required">
                                </div>

                                <div class="form-group">
                                    <label for="user-password" class="col-form-label">Password:</label>
                                    <input type="password" class="form-control" name="password"
                                        required="required">
                                </div>

                            </div>

                            <div class="modal-footer rounded-0">
                                <button type="submit"
                                    name="form" class="btn btn-dark mx-auto rounded-0 border-0 btn-block bg-dark text-white font-weight-bold position-relative">Login
                                    <div class="loading-spinner login-spinner-wrapper display_none"></div>
                                </button>
                            </div>


                        </form>

                    </div>
                </div>
            </div>
            <!-- Login Modal -->
            <?php
            if(isset($_SESSION['user'])){
                ?>
            <!-- Bet Place Modal -->
            <div id="betRequestModal" tabindex="-1" aria-labelledby="betRequestModalLabel" role="dialog" class="modal fade" style="padding-right: 17px;">
            	<div role="document" class="modal-dialog modal-lg">
            		<div class="modal-content rounded-0">
            			<div class="modal-header bg-dark rounded-0">
            				<h5 id="betRequestModalLabel" class="modal-title text-white">Place Bet</h5> 
            				<button type="button" data-dismiss="modal" aria-label="Close" class="close text-white">
            					<span aria-hidden="true">×</span>
            				</button>
            				<!--<input type="text" id='bet' name="bet_stake" value="100.00" class="form-control">-->
            			</div> 
            			<form action="" method="post">
            			    
                			<div  class='modal-body'>
                			    <div id="error_data">
            			        </div>
                			    
                			    <div class='form-row has-danger border-bottom mb-30'>
                			        
	                                <div id="first_data" class='col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-12 mb-5'>
	                                </div>
	                                <div id="second_data" class='col-xl-1 col-lg-1 col-md-1 col-sm-1 col-xs-12 mt-15 text-right'>
	                                </div>
	                                <div class='col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-12 mt-15 p-0'>
                                        <input type='text' id="bet" name='bet_stake' value='100.00' class='form-control'>
                                    </div> 
                                    <div class='col-xl-1 col-lg-1 col-md-1 col-sm-1 col-xs-12 mt-15 text-right'>
                                        <button type='button' data-dismiss='modal' aria-label='Close' class='close text-danger'>
                                        <span aria-hidden='true'>×</span></button>
                                    </div>
                			        
            			        </div>
            			        <div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 border-bottom form-row mt-15 mb-10'>
                                    <div class='col-xl-8 col-lg-8 col-md-8 col-sm-8 col-xs-8 text-left'>
                                        <strong>Total Stake</strong>
                                    </div> 
                                    <div class='col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right'>
                                        <strong><span id='stake'>100</span></strong>
                                    </div>
                                </div> 
                                
                                <div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 form-row '>
                                    <div class='col-xl-8 col-lg-8 col-md-8 col-sm-8 col-xs-8 text-left'>
                                        <strong>Possible Winning</strong>
                                    </div> 
                                    <div class='col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right'>
                                        <strong>
                                            <span style="visibility: hidden;" id="asshole"></span>
                                            <span style="visibility: hidden;" id="poss"></span>
                                            <span id="possible"></span>
                                        </strong>
                                    </div>
                                </div>
 
            				</div>
            				<div id="button_data">
	                                    
	                                    
                            </div>
            				<br>
            			</form>
            		</div>
            	</div>
            </div>
            <!-- Bet Place Modal -->
            <?php
            }
            if(isset($_SESSION['user'])){
            ?>
            
            
            <!-- Request Deposit Modal -->
            <div class="modal fade" id="requestDepositModal" tabindex="-1" aria-labelledby="requestDepositModalLabel"
                role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content rounded-0">
                        <div class="modal-header bg-black rounded-0">
                            <h5 class="modal-title text-white" id="requestDepositModalLabel">Request a Deposit</h5>
                            <button onClick="window.location.reload();" type="button" class="close text-dark" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form class="bg-dark-gray" action="" method="post">

                            <div class="modal-body">
                                <div id="status_data">
            			        </div>
                                
                                <div class="form-row">

                                    <div class="col-md-6 mb-5">
                                        <label for="req-deposit-amount" class="col-form-label text-light-white">Amount
                                            <span class="text-danger">* </span>:</label>
                                        <input type="text"
                                            class="form-control bg-light-gray" id="req-deposit-amount"
                                            name="amount" placeholder="Amount" required="required">
                                    </div>

                                    <div class="col-md-6 mb-5">
                                        <label for="req-deposit-method" class="col-form-label text-light-white">Method:</label> 
                                        <div dir="auto" class="dropdown v-select bg-light-gray single searchable">
                                              <select class="form-control" id="sel1" name="sellist1" onChange="check();">
                                                    <option value="">Select Method</option>
                                                <?php
                                                    foreach ($result1 as $row1) {
                                                ?>
                                                    <option value="<?php echo $row1['number']; ?>"><?php echo $row1['method']; ?></option>
                                                <?php
                                                    }
                                                ?>
                                              </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-row">

                                    <div class="col-md-6 mb-5">
                                        <label for="req-deposit-from" class="col-form-label text-light-white">From <span
                                                class="text-danger">* </span>:</label>
                                        <input type="text"
                                            class="form-control bg-light-gray" id="req-deposit-from"
                                            name="from" placeholder="From" required="required">
                                    </div>

                                    <div class="col-md-6 mb-5">
                                        <label for="req-deposit-to" class="col-form-label text-light-white">To <span
                                                class="text-danger">* </span>:</label>
                                        <input type="text"
                                            class="form-control bg-light-gray" id="req-deposit-to"
                                            name="to" placeholder="To" required="required">
                                                
                                    </div>

                                </div>

                                <div class="form-row">

                                    <div class="col-md-12 mb-5">
                                        <label for="req-deposit-transaction_number"
                                            class="col-form-label text-light-white">Transaction Number<span
                                                class="text-danger">* </span>:</label>
                                        <input type="text"
                                            class="form-control bg-light-gray" id="req-deposit-transaction_number"
                                            name="transection_number"
                                            placeholder="Transaction Number" required="required">
                                    </div>

                                </div>

                            </div>

                            <div class="modal-footer rounded-0">
                                <a onClick="depositPost();"
                                    class="btn btn-dark mx-auto rounded-0 border-0 btn-block bg-dark text-white font-weight-bold position-relative">
                                    Submit
                                </a>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
            <!-- Request Deposit Modal -->
            <?php
            }
            if(isset($_SESSION['user'])){
            ?>
            
            <!-- Request Withdraw Modal -->
            <div class="modal fade" id="requestWithdrawModal" tabindex="-1" aria-labelledby="requestWithdrawModalLabel"
                role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content rounded-0">
                        <div class="modal-header bg-black rounded-0">
                            <h5 class="modal-title text-dark" id="requestWithdrawModalLabel">Request a withdraw</h5>
                            <button onClick="window.location.reload();" type="button" class="close text-dark" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form class="bg-dark-gray" action="" method="post">

                            <div class="modal-body">

                                <div id="status_data1">
            			        </div>

                                <div class="form-row">

                                    <div class="col-md-6 mb-5">
                                        <label for="req-withdraw-amount" class="col-form-label text-light-white">Amount
                                            <span class="text-danger">* </span>:</label>
                                        <input type="text"
                                            class="form-control bg-light-gray" id="req-withdraw-amount"
                                            name="withdraw_amount" placeholder="Amount" required="required">
                                    </div>

                                    <div class="col-md-6 mb-5">
                                        <label for="req-deposit-method" class="col-form-label text-light-white">Method:</label> 
                                        <div dir="auto" class="dropdown v-select bg-light-gray single searchable">
                                              <select class="form-control" name="withdraw_method" id="withdraw_method">
                                                    <option value="">Select Method</option>
                                                <?php
                                                    foreach ($result1 as $row1) {
                                                ?>
                                                    <option value="<?php echo $row1['method']; ?>"><?php echo $row1['method']; ?></option>
                                                <?php
                                                    }
                                                ?>
                                              </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-row">

                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-5">
                                        <label for="req-withdraw-to" class="col-form-label text-light-white">To <span
                                                class="text-danger">* </span>:</label>
                                        <input type="text"
                                            class="form-control bg-light-gray" id="req-withdraw-to"
                                            name="withdraw_to" placeholder="To" required="required">
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-5">
                                        <label for="req-withdraw-user_account_type"
                                            class="col-form-label text-light-white">Type <span class="text-danger">*
                                            </span>:</label>
                                        <div dir="auto" class="dropdown v-select bg-light-gray single searchable">
                                            <select placeholder="Account Type" class="form-control" id="withdraw_account_type" name="account_type">
                                                <option value="">Account Type</option>
                                                    <option value="Personal">Personal</option>
                                                    <option value="Agent">Agent</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="modal-footer rounded-0">
                                <a onClick="withdrawPost();"
                                    class="btn btn-dark mx-auto rounded-0 border-0 btn-block bg-dark text-white font-weight-bold position-relative">
                                    Submit
                                    <div class="loading-spinner login-spinner-wrapper display_none"></div>
                                </a>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
            <!-- Request Withdraw Modal -->
            <?php
            }
            if(isset($_SESSION['user'])){
            ?>
            
            <!-- Change Password Modal -->
            <div class="modal fade" id="change-password-modal" tabindex="-1" role="dialog"
                aria-labelledby="changePasswordModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content rounded-0">
                        <div class="modal-header bg-black rounded-0">
                            <h5 class="modal-title text-dark" id="changePasswordModalLabel">Change Passwords</h5>
                            <button type="button" class="close text-dark" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form class="bg-dark-gray" action="" method="post">

                            <div class="modal-body">


                                <div v-if="updatePasswordError != ''" class="alert alert-danger" role="alert"
                                    v-html="updatePasswordError"></div>

                                <div v-if="responseUpdatePassword != ''" class="alert alert-success" role="alert"
                                    v-html="responseUpdatePassword"></div>

                                <div class="form-group">
                                    <label for="user-current-password" class="col-form-label text-light-white">Current
                                        Password:</label>
                                    <input type="password" class="form-control bg-light-gray" id="user-current-password"
                                        name="current_password" placholder="Current Password"
                                        required="required">
                                </div>

                                <div class="form-group">
                                    <label for="user-new-password" class="col-form-label text-light-white">New
                                        Password:</label>
                                    <input type="password" class="form-control bg-light-gray" id="user-new-password"
                                        name="new_password" placholder="New Password" minlength="6"
                                        required="required">
                                </div>

                                <div class="form-group">
                                    <label for="user-cnf-password" class="col-form-label text-light-white">Confirm New
                                        Password:</label>
                                    <input type="password" class="form-control bg-light-gray" id="user-cnf-password"
                                        name="confirm_password" placholder="Confirm New Password"
                                        minlength="6" required="required">
                                </div>

                            </div>

                            <div class="modal-footer rounded-0">
                                <button type="submit" name="form3"
                                    class="btn btn-dark mx-auto rounded-0 border-0 btn-block bg-dark text-white font-weight-bold position-relative">
                                    Submit
                                </button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
            <!-- Change Password Modal -->
            <?php
            }
            ?>


        </div>
    </div>

    <!-- NEW -->
    <div class="container-fluid p-0" style="background-color:#1e1e1e;">

        <!-- NEW -->
        <div class="container-fluid cream-color"
            style=" padding:2px 2px;font-size: 16px; border-left: 3px solid red !important; border-right: 3px solid green !important"
            id="news_scroller">

            <p class="marquee">
                <span style="color:red" class="slow">
                    <b style='color:#b02050'><?php echo $message; ?>
                    </b>
                </span>
            </p>
        </div>
    </div>

    <div id="wrapper-container">

        <!-- OLD -->
        <!--<div class="justify-content-center col-xl-8 col-lg-9 col-md-12 col-sm-12 col-xs-12 p-0 container" id="content-container">-->

        <!-- NEW -->
        <div class="justify-content-center p-0 container-fluid" id="content-container">
            <div class="contact-form container-fluid bg-light" style="margin:2px 0px;">

                <h3 class="text-center text-dark capitalize">FAQ</h3>

                <div class="row thin-dark-top-border">

                    <div class="col-12">

                        <p>FAQ</p>

                    </div>

                </div>

            </div>
        </div>
    </div>

    <footer class="container-fluid">
        <div class="bg-black">
            <div class="justify-content-center p-0 container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <ul class="list-inline text-center footer-nav m-0">
                            <li class="list-inline-item">
                                <a class="text-white" href="contact-us.php"
                                    id="FooterMenuAffiliateProgramLink">Contact-us</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="text-white" href="terms.php"
                                    id="FooterMenuAffiliateProgramLink">Terms & Conditions</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="text-white" href="rules.php"
                                    id="FooterMenuAffiliateProgramLink">Rules & Regulations</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="text-white" href="faq.php"
                                    id="FooterMenuAffiliateProgramLink">FAQ</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="text-white" href="about.php"
                                    id="FooterMenuAffiliateProgramLink">About Us</a>
                            </li>

                        </ul>
                    </div>
                    <div class="col-sm-3">
                        <p style="color:#dbff66 !important; font-size: 11px;">Caution! We are strongly discourage to use
                            this site who are not 18+ and also site administrator is not liable to any kind of issues
                            created by user.</p>
                    </div>
                    <div class="col-sm-3">
                        <img src="./images/payment.png" alt="Logo" class="responsive" style="width:100%; margin-top:0px;">
                    </div>
                </div>
                <div class="md-5 text-center m-0">
                    <p style="color:white;">Betasia &COPY; 2019, all right reserved.</p>
                </div>

            </div>
        </div>

        <script type="text/javascript" src="./js/jquery.min.js"></script>
        <script type="text/javascript" src="./js/popper.min.js"></script>
        <script type="text/javascript" src="./js/bootstrap.min.js"></script>
        <script type="text/javascript" src="./js/vue.js"></script>
        <script type="text/javascript" src="./js/vue-resource.js"></script>
        <script type="text/javascript" src="./js/vee-validate.js"></script>
        <script type="text/javascript" src="./js/js.cookie.js"></script>
        <script type="text/javascript" src="./js/vue-select.js"></script>
        <script type="text/javascript" src="./js/index.js"></script>
        <script type="text/javascript" src="./js/moment.min.js"></script>
        <script type="text/javascript" src="./js/daterangepicker.js"></script>

        <!-- Custom JQuery -->
        <script type="text/javascript" src="./js/common.js"></script>
        <script type="text/javascript" src="./js/loginJquery.js"></script>
        <script type="text/javascript" src="./js/topNavJquery.js"></script>
        <script type="text/javascript" src="./js/sportsListJquery.js"></script>
        <script type="text/javascript" src="./js/userProfile.js"></script>
        <!-- Custom JQuery -->

        <!-- Custom VueJs -->
        <script type="text/javascript" src="./js/commonVue.js"></script>
        <script type="text/javascript" src="./js/loginVue.js"></script>
        <script type="text/javascript" src="./js/sportListVue.js"></script>
        <!-- Custom VueJs -->
        <script>
            $(document).ready(function(){
        		var show_time='time';
        		show_t(show_time);
        		setInterval(function(){show_t(show_time); },1000);
        	});
        	function show_t(show_time){
        		$.ajax({
        			url:"timestamp.php",
        			method:"post",
        			data:{show_time:show_time},
        			success:function(data){
        				$('#timestamp').html(data);
        			}
        		})
        	}
        </script>
        <script>
            function check() {
                document.getElementById("req-deposit-to").value=document.getElementById("sel1").value;
            } 
        </script>
        <script>

            function depositPost() {

                var amount=document.getElementById("req-deposit-amount").value;
                var sellist1=document.getElementById("sel1").value;
                var from=document.getElementById("req-deposit-from").value;
                var to=document.getElementById("req-deposit-to").value;
                var transection_number=document.getElementById("req-deposit-transaction_number").value;
                $.ajax({
                    url : "deposit.php",
                    type : "post",
                    dataType:"text",
                    data : {
                         transection_number: transection_number,
                         sellist1: sellist1,
                         from: from,
                         to: to,
                         amount: amount
                    },
                    success : function (a){
                        var respData2 = JSON.parse(a);
                        $('#status_data').html(respData2.statues);
                        $('#requestDepositModal').modal('show');
                    }
                });
                 
            } 
        </script>
        <script>

            function withdrawPost() {

                var withdraw_amount=document.getElementById("req-withdraw-amount").value;
                var withdraw_method=document.getElementById("withdraw_method").value;
                var withdraw_to=document.getElementById("req-withdraw-to").value;
                var account_type=document.getElementById("withdraw_account_type").value;
                $.ajax({
                    url : "withdraw.php",
                    type : "post",
                    dataType:"text",
                    data : {
                         withdraw_method: withdraw_method,
                         account_type: account_type,
                         withdraw_to: withdraw_to,
                         withdraw_amount: withdraw_amount
                    },
                    success : function (a){
                        var respData3 = JSON.parse(a);
                        $('#status_data1').html(respData3.wstatues);
                        $('#requestWithdrawModal').modal('show');
                    }
                });
                 
            } 
        </script>
    </footer>
</body>

</html>