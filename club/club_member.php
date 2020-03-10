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
	$uid=$_SESSION['user']['cc_id'];
	$pass=$_SESSION['user']['password'];
	
	

}



?>
<?php include 'inc/betmodal.php'; ?>
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
												
												$last="--";
												$total="0";
												$total_commission=0;
												
												$statement9 = $pdo->prepare("SELECT * FROM tbl_member WHERE tbl_member.club_id=? ORDER BY tbl_member.user_id ASC");
                                            	$statement9->execute(array($uid));
                                            	$result9 = $statement9->fetchAll(PDO::FETCH_ASSOC);
												foreach ($result9 as $row9) {
												    $total_bet=0;
												    $commission=0;
													$i++;
													$statementb = $pdo->prepare("SELECT * FROM tbl_bet WHERE tbl_bet.bet_by=? ORDER BY bet_id ASC");
                                            	    $statementb->execute(array($row9['user_id']));
                                            	    $resultb = $statementb->fetchAll(PDO::FETCH_ASSOC);
                                            	    foreach ($resultb as $rowb) {
                                            	    //    if($rowb['bet_by']==$row9['user_id']){
                                            	            $last=$rowb['date'];
                                            	            $total_bet++;
                                            	            $commission=$commission+$rowb['amount'];
                                            	            
                                            	   //     }
                                            	    }
                                            	    $commission=$commission*0.02;
                                            	    
                                            	    $total=$total+$total_bet;
                                            	    $total_commission=$total_commission+$commission;
													?>
													<tr>
														<td scope="col"><?php echo "$i"; ?></td>
														<td scope="col" class="text-center"><?php echo $row9['joining_date']; ?></td>
														<td scope="col" class="text-center"><?php echo $last; ?></td>
														<td scope="col"><?php echo $row9['full_name']; ?></td>
														<td scope="col" class="text-center"><?php echo $row9['user_name']; ?></td>
														<td scope="col" class="text-center"><?php echo $total_bet; ?></td>
														<td scope="col" class="text-center text-success"><?php echo number_format($commission, 2, '.', ','); ?></td>
													</tr>
													<?php
												}
												?>
											</tbody>
											<tfoot>
												<tr>
													<th scope="col" colspan="5">Total</th>
													<th scope="col" class="text-center"><?php echo $total; ?></th>
													<th scope="col" class="text-center"><?php echo number_format($total_commission, 2, '.', ','); ?></th>
												</tr>
											</tfoot>
										</table>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-5">
										
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