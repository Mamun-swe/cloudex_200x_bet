<?php require_once('header.php');

$statement = $pdo->prepare("SELECT * FROM tbl_member");
$statement->execute();
$total_member = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_club");
$statement->execute();
$total_club = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_deposit");
$statement->execute();
$total_deposit = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_message_sent");
$statement->execute();
$total_message_sent = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_referral");
$statement->execute();
$total_referral = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_terms");
$statement->execute();
$total_terms = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_transfer_list");
$statement->execute();
$total_transfer_list = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_user");
$statement->execute();
$total_user = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_game");
$statement->execute();
$total_game = $statement->rowCount();

$date_now = date('yy-m-d');
$statement = $pdo->prepare("SELECT sum(amount) FROM tbl_deposit WHERE date = '$date_now' AND status = 1");
$statement->execute();
$today_deposite = $statement->fetchColumn();


?>
 <!DOCTYPE html>  
 <html>  
      <head>  
      </head>
      <body> 
        <section class="content-header">
        	<h1>Dashboard</h1>
        </section>
        <br><br>
        <div class="ml-1" style="margin-left: 1.25rem">
        <a href="../index.php" target="_blank" class="btn btn-primary ml-1">Main Site</a></div>
        <section class="content">
        	<div class="row">
        		<div class="col-md-4 col-sm-6 col-xs-12">
        			<div class="info-box">
        				<span class="info-box-icon bg-green"><i class="fa fa-user-circle"></i></span>
        				<div class="info-box-content">
        					<span class="info-box-text">Total Users</span>
        					<span class="info-box-number"><?php echo $total_member; ?></span>
        				</div>
        			</div>
        		</div>
        		<div class="col-md-4 col-sm-6 col-xs-12">
        			<div class="info-box">
        				<span class="info-box-icon bg-green"><i class="fa fa-users"></i></span>
        				<div class="info-box-content">
        					<span class="info-box-text">Total Clubs</span>
        					<span class="info-box-number"><?php echo $total_club; ?></span>
        				</div>
        			</div>
        		</div>
        		<div class="col-md-4 col-sm-6 col-xs-12">
        			<div class="info-box">
        				<span class="info-box-icon bg-green"><i class="fa fa-money"></i></span>
        				<div class="info-box-content">
        					<span class="info-box-text">Total Deposits</span>
        					<span class="info-box-number"><?php echo $total_deposit; ?></span>
        				</div>
        			</div>
        		</div>
        		<div class="col-md-4 col-sm-6 col-xs-12">
        			<div class="info-box">
        				<span class="info-box-icon bg-aqua"><i class="fa fa-comments-o"></i></span>
        				<div class="info-box-content">
        					<span class="info-box-text">Total Sent Message</span>
        					<span class="info-box-number"><?php echo $total_message_sent; ?></span>
        				</div>
        			</div>
        		</div>
        		<div class="col-md-4 col-sm-6 col-xs-12">
        			<div class="info-box">
        				<span class="info-box-icon bg-aqua"><i class="fa fa-handshake-o"></i></span>
        				<div class="info-box-content">
        					<span class="info-box-text">Total Referrals</span>
        					<span class="info-box-number"><?php echo $total_referral; ?></span>
        				</div>
        			</div>
        		</div>
        		<div class="col-md-4 col-sm-6 col-xs-12">
        			<div class="info-box">
        				<span class="info-box-icon bg-aqua"><i class="fa fa-file-text"></i></span>
        				<div class="info-box-content">
        					<span class="info-box-text">Total Terms</span>
        					<span class="info-box-number"><?php echo $total_terms; ?></span>
        				</div>
        			</div>
        		</div>
        		<div class="col-md-4 col-sm-6 col-xs-12">
        			<div class="info-box">
        				<span class="info-box-icon bg-orange"><i class="fa fa-exchange"></i></span>
        				<div class="info-box-content">
        					<span class="info-box-text">Total Transfers</span>
        					<span class="info-box-number"><?php echo $total_transfer_list; ?></span>
        				</div>
        			</div>
        		</div>
        		<div class="col-md-4 col-sm-6 col-xs-12">
        			<div class="info-box">
        				<span class="info-box-icon bg-orange"><i class="fa fa-user"></i></span>
        				<div class="info-box-content">
        					<span class="info-box-text">Total Admins</span>
        					<span class="info-box-number"><?php echo $total_user; ?></span>
        				</div>
        			</div>
        		</div>
        		<div class="col-md-4 col-sm-6 col-xs-12">
        			<div class="info-box">
        				<span class="info-box-icon bg-orange"><i class="fa fa-trophy"></i></span>
        				<div class="info-box-content">
        					<span class="info-box-text">Total Games</span>
        					<span class="info-box-number"><?php echo $total_game; ?></span>
        				</div>
        			</div>
        		</div>

				<div class="col-md-4 col-sm-6 col-xs-12">
					<div class="card">
						<div class="card-body">
						<small class="text-orange">Select date for deposite</small>
						<input type="date" id="date" class="form-control shadow-none mt-2">
						</div>
					</div>
 
					<div class="card result">
					</div>
					
				</div>
					

				<script>
				$('#date').change(function(){
					var data = {
						date: $('#date').val()
					}
					$.ajax({
						type: 'POST',
						url: 'live-deposite-count.php',
						data: data,
						success : function(response){
							var obj = JSON.parse(response);
							var deposite = obj.amount;
							if(deposite > 0){
								$('.result').append('<div class="card-body"><h5 class="text-success"><b>Total deposite of this date: '+ deposite +'</b></h5></div>');
							} else{
								$('.result').append('<div class="card-body"><h5 class="text-danger"><b>Total deposite of this date: '+ deposite +'</b></h5></div>');
							}
							
						}
					});
				});
				</script>

				<div class="col-md-4 col-sm-6 col-xs-12">
        			<div class="info-box">
        				<span class="info-box-icon bg-primary"><i class="fa fa-money text-white"></i></span>
        				<div class="info-box-content">
        					<span class="info-box-text">Today DEPOSITS</span>
        					<span class="info-box-number">
								<?php
									if($today_deposite > 0){
										echo $today_deposite;
									}else{
										echo "0";
									}
								?>
							</span>
        				</div>
        			</div>
        		</div>
        		
        	</div>
        </section>
        <br><br>
      </body>  
 </html> 
<?php require_once('footer.php'); ?>