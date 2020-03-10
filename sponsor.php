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
/*	$statement9 = $pdo->prepare("SELECT * FROM tbl_sponsor JOIN tbl_member ON  tbl_sponsor.sponsor_user_id=tbl_member.user_id WHERE tbl_sponsor.user_id=?");
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
	}*/
}
/*
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

*/
?>

<?php include 'inc/head.php'; ?>
<?php include 'inc/header.php'; ?>
<div class="">
	<section class="callaction " style="border-bottom: 1px solid #5F5F5F;min-height: 430px;">
		<div class="content-container mx-auto p-0 ">
			<div class="container  p-0 ">
				<div class="row">
					<div class="col-xs-12">
						<div class="table-responsive">
							<div id="sampleTable2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
								<div class="row">
									<div class="col-sm-6">
										<div class="dataTables_length" id="sampleTable2_length">
											<label>Show
												<select name="sampleTable2_length" aria-controls="sampleTable2" class="form-control input-sm">
													<option value="10" selected="selected">10</option>
													<option value="25">25</option>
													<option value="50">50</option>
													<option value="100">100</option>
												</select>entries
											</label>
										</div>
									</div>
									<div class="col-sm-6">
										<div id="sampleTable2_filter" class="dataTables_filter">
											<label>Search:
												<input type="search" class="form-control input-sm" placeholder="" aria-controls="sampleTable2">
											</label>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<table class="table table-bordered table-hover dataTable no-footer" id="sampleTable2" role="grid" aria-describedby="sampleTable2_info">
											<thead>
												<tr role="row">
													<th>SN.</th>
													<th>Joining Date</th>
													<th>Recent Bet Date</th>
													<th>Name</th>
													<th>Username</th>
													<th>Total Bet</th>
													<th>Commission Earned</th>
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
											//	foreach ($result9 as $row9) {

													$i++;
													$statement10 = $pdo->prepare("SELECT * FROM tbl_member WHERE sponsor_id=?");
													$statement10->execute(array($uid));
													$total = $statement10->rowCount(); 
													$result10 = $statement10->fetchAll(PDO::FETCH_ASSOC);
													$amount=0;
													$bets=0;
														foreach ($result10 as $row10) {
														    $sponsor_id=$row10['user_id'];
																$statementb = $pdo->prepare("SELECT * FROM tbl_bet WHERE bet_by=? ORDER BY bet_id ASC");
													$statementb->execute(array($sponsor_id));
													$total = $statementb->rowCount(); 
													$resultb = $statementb->fetchAll(PDO::FETCH_ASSOC);
														            	foreach ($resultb as $rowb) {
													                        $amount=$amount+$rowb['amount'];
													                        $bets++;
													                        $last=$rowb['date'];
														            	}
														            	$total_bet=$total_bet+$bets;
														            	$commission=$amount*0.01;
														            	
													?>
													<tr>
														<td scope="col"><?php echo $i; ?></td>
														<td scope="col" class="text-center"><?php echo $row10['joining_date']; ?></td>
														<td scope="col" class="text-center"><?php echo $last; ?></td>
														<td scope="col"><?php echo $row10['full_name']; ?></td>
														<td scope="col" class="text-center"><?php echo $row10['user_name']; ?></td>
														<td scope="col" class="text-center"><?php echo $bets; ?></td>
														<td scope="col" class="text-center text-success"><?php echo $commission; ?></td>
													</tr>
													<?php
													$total_commission= $total_commission+$commission;
												$commission=0;
												$bets=0;
														            	   
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
								<div class="row">
									<div class="col-sm-5">
										<div class="dataTables_info" id="sampleTable2_info" role="status" aria-live="polite">Showing 0 to 0 of 0 entries</div>
									</div>
									<div class="col-sm-7">
										<div class="dataTables_paginate paging_simple_numbers" id="sampleTable2_paginate">
											<ul class="pagination">
												<li class="paginate_button previous disabled" id="sampleTable2_previous">
													<a href="#" aria-controls="sampleTable2" data-dt-idx="0" tabindex="0">
														<span class="fa fa-angle-double-left"></span>
													</a>
												</li>
												<li class="paginate_button next disabled" id="sampleTable2_next">
													<a href="#" aria-controls="sampleTable2" data-dt-idx="1" tabindex="0">
														<span class="fa fa-angle-double-right"></span>
													</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<?php include 'inc/scripts.php'; ?>
<?php include 'inc/footer.php'; ?>