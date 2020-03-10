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
$statement = $pdo->prepare("SELECT *
							FROM tbl_message_sent WHERE type=? OR message_sent_to=? ORDER BY message_sent_id ASC");
$statement->execute(array($type,$uid));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);

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
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Betin69|Largest Betting portal in Banglaesh</title>

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
                                                href="">Balance: <?php echo $m; ?> Tk</a>
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
                    ?>
                </div>

                <a class="nav-link " href="message.php"><span
                        class="badge-notification mt-5">Inbox</span></a>
                <a id="multi_bet_stack_count" class="nav-link" href="javascript:void(0);"><span
                        class="badge-notification mt-5" data-badge="">Bet Slip</span></a>
                <span id="clock" style="color:white;">
                    <p><?php echo date("d-m-Y"); ?></p>
                    <p id="timestamp"></p>
                </span>
            </nav>
            <div class="header-buttons">
                <a style="background-color: #4372E5;" data-toggle="modal" data-target="#requestDepositModal" class="btn register bonus-waiting" href="#">
                    <strong> Balance : <?php echo $m; ?></strong>
                </a>
                <a style="background-color: red;" data-toggle="modal" data-target="#requestDepositModal" class="btn login"
                    href="#"><strong>Deposit</strong></a>
            </div>

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
                                            class="col-form-label text-light-white">Transaction Number <span
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



            <div class="modal fade" id="multibet-alert" tabindex="-1" role="dialog" aria-labelledby="MultibetAlert"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content rounded-0">
                        <div class="modal-header bg-black rounded-0">
                            <h5 class="modal-title text-dark" id="changePasswordModalLabel">Multi bet Alert</h5>
                            <button type="button" class="close text-dark" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>



                        <div class="modal-body">

                            <p class="p-5">You cannot add multiple question from same match in multi bet slip. If you
                                wanna back to single bet system please click <a id="multi_bet_stack_count_alert"
                                    href="javascript:void(0);">Bet Slip</a> and un-select multi bet checkbox.</p>

                        </div>


                        </form>

                    </div>
                </div>
            </div>
            <!-- Change Password Modal -->

        </div>
    </div>

    <!-- NEW -->
    <div class="container-fluid p-0" style="background-color:#1e1e1e;">

        <!-- NEW -->
        <div class="container-fluid cream-color"
            style=" padding:2px 2px;font-size: 16px; border-left: 3px solid red !important; border-right: 3px solid green !important"
            id="news_scroller">

            <p class="marquee"><span style="color:red" class="slow"><b style='color:#e32078'><?php echo $message; ?></b>
                </span></p>
        </div>
    </div>

    <div id="wrapper-container">

        <!-- NEW -->
        <div class="justify-content-center p-0 container-fluid" id="content-container">
            <div id="userProfile">

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 card pl-0 pr-0 rounded-0 clearfix">

                    <div class="container">

                        <div class="row">

                            <div class="nav flex-column nav-pills col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12"
                                id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <a class="nav-link active rounded-0 border-right border-bottom border-left border-top"
                                    id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab"
                                    aria-controls="v-pills-profile">
                                    Profile
                                </a>
                                <a href="javascript:void(0);"
                                    class="nav-link rounded-0 border-right border-bottom border-left"
                                    data-target="#requestDepositModal" data-toggle="modal">
                                    Request Deposit
                                </a>
                                <a href="javascript:void(0);"
                                    class="nav-link rounded-0 border-right border-bottom border-left"
                                    data-target="#requestWithdrawModal" data-toggle="modal">
                                    Request Withdraw
                                </a>
                                <a v-on:click="open_cange_pwd_modal"
                                    class="nav-link rounded-0 border-right border-bottom border-left"
                                    id="v-pills-change-password" data-toggle="pill" href="#v-pills-change-password"
                                    role="tab" aria-controls="change-password-modal" aria-selected="false">
                                    Change Password
                                </a>

                                <a
                                    class="nav-link rounded-0 border-right border-bottom border-left"
                                    id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab"
                                    aria-controls="v-pills-messages" aria-selected="false">
                                    Messages
                                </a>

                            </div>

                            <div class="tab-content col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12 p-0"
                                id="v-pills-tabContent" v-cloak>

                                <!-- Profile Area -->
                                <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel"
                                    aria-labelledby="v-pills-profile-tab">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <th>Full Name</th>
                                                <td><?php echo $_SESSION['user']['full_name']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Username</th>
                                                <td><?php echo $_SESSION['user']['user_name']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Mobile No.</th>
                                                <td><?php echo $_SESSION['user']['phone']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Email</th>
                                                <td><?php echo $_SESSION['user']['email']; ?></td>
                                            </tr>
                                            
                                            <tr>
                                                <th>Referred By</th>
                                                <td>
                                                    <form action="" method="post">
                                                        <input type="text"
                                                            class="form-control bg-light-gray" id="req-deposit-from"
                                                            name="referral_name" placeholder="Enter Referral User Name" required="required">
    
                                                        <button
                                                            type="submit" name="form5"
                                                            class="btn btn-dark mx-auto rounded-0 border-0 bg-dark text-white font-weight-bold mt-5">
                                                            Change Sponsor</button>
                                                            <!--@click="save_sponsor_and_club_confirmation_modal('sponsor', 'Do you really want to change sponsor?')"-->
                                                    </form>

                                                </td>
                                            </tr>
                                                
                                            <tr>
                                                <th>Club</th>
                                                <td>
                                                    <form action="" method="post">
                                                        <div dir="auto" class="dropdown bg-light-gray single searchable">
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
                                                        </div>
    
                                                        <button
                                                            type="submit" name="form6"
                                                            class="btn btn-dark mx-auto rounded-0 border-0 bg-dark text-white font-weight-bold mt-5">Change
                                                            Club</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>

                                </div>
                                <!-- Profile Area -->

                                <!-- Club History -->
                                <div class="tab-pane fade" id="v-pills-club-history" role="tabpanel"
                                    aria-labelledby="v-pills-club-history-tab">

                                    <div v-if="clubHistoryErr != ''" class="alert alert-danger" role="alert"
                                        v-html="clubHistoryErr"></div>

                                    <table v-if="clubHistoryErr == ''" class="table table-bordered table-responsive">
                                        <thead>
                                            <tr>
                                                <th class="text-center">SN.</th>
                                                <th class="text-center">Date & Time</th>
                                                <th class="text-center">User ID</th>
                                                <th class="text-center">User name</th>
                                                <th class="text-center">Answer</th>
                                                <th class="text-center">Bet Rate</th>
                                                <th class="text-center">Amount</th>
                                                <th class="text-center">Commission</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(ch, index) in clubHistory">
                                                <td class="text-center">{{index + 1}}</td>
                                                <td class="text-center">{{ch.created_at}}</td>
                                                <td class="text-center">{{ch.username}}</td>
                                                <td class="text-center">{{ch.name}}</td>
                                                <td class="text-center">{{ch.answer_title}}</td>
                                                <td class="text-center">{{ch.return_rate | round(2)}}</td>
                                                <td class="text-center">{{ch.bet_amount | round(2)}}</td>
                                                <td class="text-center">{{ch.commission_amount | round(2)}}</td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="6" class="text-right">Total</th>
                                                <th class="text-center">{{total_club_amounts.total_club_bet | round(2)}}
                                                </th>
                                                <th class="text-center">
                                                    {{total_club_amounts.total_club_commission | round(2)}}</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- Club History -->

                                <!-- Transaction History -->
                                <div class="tab-pane fade" id="v-pills-transaction-history" role="tabpanel"
                                    aria-labelledby="v-pills-transaction-history-tab">

                                    <div v-if="trxnHistoryErr != ''" class="alert alert-danger" role="alert"
                                        v-html="trxnHistoryErr"></div>

                                    <table v-if="trxnHistoryErr == ''" class="table table-bordered table-responsive">
                                        <thead>
                                            <tr>
                                                <th class="text-center">SN.</th>
                                                <th class="text-center">Date & Time</th>
                                                <th class="text-center">Description</th>
                                                <th class="text-center">Notes</th>
                                                <th class="text-center">Debit (Out)</th>
                                                <th class="text-center">Credit (In)</th>
                                                <th class="text-center">Balance</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(th, index) in transactionHistory">
                                                <td class="text-center">{{index + 1}}</td>
                                                <td class="text-center">{{th.created_at}}</td>
                                                <td class="text-center">{{th.description}}</td>
                                                <td class="text-center">{{th.notes}}</td>
                                                <td class="text-center">{{th.amount_out | round(2)}}</td>
                                                <td class="text-center">{{th.amount_in | round(2)}}</td>
                                                <td class="text-center">{{th.row_balance | round(2)}}</td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>

                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- Transaction History -->

                                <!-- Message History -->
                                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                                    aria-labelledby="v-pills-messages">

                                    <nav class="navbar navbar-light pl-0">
                                        <div class="form-inline msg-btns">
                                            <button id="msg_inbox"
                                                class="btn btn-sm btn-outline-yellow bg-black text-white plr-15"
                                                type="button">Inbox</button>
                                            <button v-on:click="get_user_sent_messages(20444)" id="msg_sent"
                                                class="btn btn-sm btn-outline-yellow bg-black text-white ml-10 plr-15"
                                                type="button">Sent</button>
                                            <button v-on:click="reply_message_modal()" id="msg_new"
                                                class="btn btn-sm btn-outline-yellow bg-black text-white ml-10 plr-15"
                                                type="button">New Message</button>
                                        </div>
                                    </nav>
                                    <table class="table table-bordered table-responsive">
                                        <thead>
                                            <tr>
                                                <th class="text-center">SN.</th>
                                                <th class="text-center">Date & Time</th>
                                                <th class="text-center">Message</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <?php
                                            foreach ($result as $row) {
                                                $i++;
                                            ?>
                                            <tr>
                                                <td class="text-center"><?php echo $i; ?></td>
                                                <td class="text-center"><?php echo $date=$row['message_sent_date'].' '.$row['sent_time']; ?></td>
                                                <td class="text-center"><?php echo $row['message']; ?></td>
                                                <td class="text-center">
                                                    <button v-on:click="reply_message_modal(m.message_id)"
                                                        id="msg_reply"
                                                        class="btn btn-sm btn-outline-yellow bg-transparent ml-10 plr-15"
                                                        type="button">Show</button>
                                                </td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                            
                                        </tbody>
                                        <tfoot>
                                            <tr>

                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- Message History -->

                                <!-- Reply Message Modal -->
                                <div class="modal fade" id="reply-message-modal" tabindex="-1" role="dialog"
                                    aria-labelledby="replyMessageModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content rounded-0">
                                            <div class="modal-header bg-black rounded-0">
                                                <h5 class="modal-title text-dark" id="balanceTranferModalLabel">Messages
                                                </h5>
                                                <button type="button" class="close text-dark" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <form class="bg-dark-gray" action="" method="post">

                                                <div class="modal-body">

                                                    <div class="form-group">
                                                        <label for="message_frm_message"
                                                            class="col-form-label">Message:</label>
                                                        <textarea type="number" class="form-control"
                                                            id="message_frm_message" name="message"
                                                            placholder="Message" required="required"></textarea>
                                                    </div>

                                                </div>

                                                <div class="modal-footer rounded-0">
                                                    <button type="submit" name="form7"
                                                        class="btn btn-dark mx-auto rounded-0 border-0 btn-block bg-dark text-white font-weight-bold position-relative">
                                                        Send
                                                        <div class="loading-spinner login-spinner-wrapper display_none">
                                                        </div>
                                                    </button>
                                                </div>


                                            </form>

                                        </div>
                                    </div>
                                </div>
                                <!-- Reply Message Modal -->

                            </div>

                        </div>

                    </div>

                </div>

                <!-- save_sponsor_and_club_confirmation_modal -->
                <div class="modal fade" id="save_sponsor_and_club_confirmation_modal" tabindex="-1" role="dialog"
                    aria-labelledby="save_sponsor_and_club_confirmation_modal" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content rounded-0">
                            <div class="modal-header bg-dark rounded-0">
                                <h5 class="modal-title text-white" id="save_sponsor_and_club_confirmation_modal_label">
                                    {{club_or_sponsor_modal_label}}</h5>
                                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <form action="" method="post">

                                <div class="modal-body">

                                    <div v-if="Object.keys(profileEditErrors).length > 0" class="alert alert-danger"
                                        role="alert" v-html="profileEditErrors"></div>

                                    <div class="form-group">
                                        <label for="user-profile-password" class="col-form-label">Confirm With
                                            Password:</label>
                                        <input type="password" class="form-control" id="user-profile-password"
                                            v-model="profile.cnf_password" placholder="Confirm With Password"
                                            minlength="6" required="required">
                                    </div>

                                </div>

                                <div class="modal-footer rounded-0">
                                    <button type="submit"
                                        class="btn btn-dark mx-auto rounded-0 border-0 btn-block bg-dark text-white font-weight-bold capitalize position-relative">
                                        Change {{club_or_sponsor_save_method}}
                                        <div class="loading-spinner login-spinner-wrapper display_none"></div>
                                    </button>
                                </div>


                            </form>

                        </div>
                    </div>
                </div>
                <!-- save_sponsor_and_club_confirmation_modal -->

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
                    <p style="color:white;">Betin69 &COPY; 2019, all right reserved.</p>
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
        <script type="text/javascript" src="./js/vue-userProfile.js"></script>
        <script type="text/javascript" src="./js/userClub.js"></script>
        <script type="text/javascript" src="./js/userStatement.js"></script>
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