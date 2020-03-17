<div id="allBets" class="bhoechie-tab">
	<div class="bhoechie-tab-content ">
		<div class="">
			<div class="row">
				<div class="col-xs-12">
					<div class="tile">
						<div class="tile-body">
							<div class="table-responsive">
								<div id="betingTable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
									<div class="row">
										<div class="col-sm-6">
											<div class="dataTables_length" id="betingTable_length">
												<label>Show
													<select name="betingTable_length" aria-controls="betingTable" class="form-control input-sm">
														<option value="10" selected="selected">10</option>
														<option value="25">25</option>
														<option value="50">50</option>
														<option value="100">100</option>
													</select>entries
												</label>
											</div>
										</div>
										<div class="col-sm-6">
											<div id="betingTable_filter" class="dataTables_filter">
												<label>Search:
													<input type="search" class="form-control input-sm" placeholder="" aria-controls="betingTable">
												</label>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12">
											<table class="table table-hover table-bordered dataTable no-footer" id="betingTable" role="grid" style="width: 1083px;">
												<thead>
													<tr role="row">
														<th style="font-size: 20px;">SN.</th>
														<th style="font-size: 20px;">Match</th>
														<th style="font-size: 20px;">Question</th>
														<th style="font-size: 20px;">Answer</th>
														<th style="font-size: 20px;">Amount</th>
														<th style="font-size: 20px;">Rate</th>
														<th style="font-size: 20px;">Amount(Won)</th>
														<th style="font-size: 20px;">Notes</th>
														<th style="font-size: 20px;">Win/Lose</th>
													</tr>
												</thead>
												<tbody>
													<?php
													$i=1;
													foreach ($result21 as $row21) {
														$game=$row21['desh1']." VS ".$row21['desh2'].','.$row21['tournament']." || ".$row21['date']." , ".$row21['time'];$game=$row21['desh1']." VS ".$row21['desh1'].','.$row21['tournament']." || ".$row21['date']." , ".$row21['time'];
														$amount=$row21['return_amount'];
														$sponsor_amount=$amount * 0.01;
														$final_amount=$amount;//-$sponsor_amount;
														?>
														<tr>

															<td><?php echo $i++; ?></td>
															<td><?php echo $game; ?></td>
															<td><?php echo $row21['stake_name']; ?></td>
															<td><?php echo $row21['bet_name']; ?></td>
															<td>
															<?php 
															    echo number_format($row21['amount'], 2, '.', ','); 
														    ?>
															</td>
															<td><?php echo $row21['current_rate']; ?></td>
															<td>
																<?php 
																if($row21['bet_status']==1){
																	echo number_format($final_amount, 2, '.', ',');  

																}
																else if($row21['bet_status']==2){
																	echo "0.00"; 
																}
																else if($row21['bet_status']==3){
																	echo number_format($row21['sell_price'], 2, '.', ',');

																}
																else if($row21['bet_status']=="Canceled"){
																	echo number_format($row21['amount'], 2, '.', ',');
																}
																else if($row21['bet_status']==0){
																	echo number_format($final_amount, 2, '.', ',');  
																}
																?>
															</td>
															<td>
																<?php 

																if($row21['sell_price']=="0.00"){
																	echo number_format($row21['sell_price'], 2, '.', ',');
																}
																else if(($row21['sell_price']!="0.00") AND ($row21['bet_status']!= 3) AND ($row21['bet_status']!=1) AND ($row21['bet_status']!=2) AND ($row21['bet_status']!="Canceled")){

																	$a=$row21['amount']*$row21['sell_price']; 
																	echo number_format($a, 2, '.', ',');
																	?>
																	<a href="bet-sell.php?id=<?php echo $row21['bet_id']; ?>&sell=<?php echo $row21['amount']*$row21['sell_price']; ?>" class="btn btn-info"> Sell Bet</a>
																	<?php
																}
																?>
															</td>
															<td>
																<?php 
																if($row21['bet_status']==1){
																	?>
																	<strong style="color: green;">
																		<?php echo "WIN"; ?>
																	</strong>
																	<?php    
																}
																else if($row21['bet_status']==2){
																	?>
																	<strong style="color: red;">
																		<?php echo "LOSS"; ?>
																	</strong> 
																	<?php
																}
																else if($row21['bet_status']==3){
																	?>
																	<strong style="color: green;">
																		<?php echo "SOLD"; ?>
																	</strong>
																	<?php    
																}
																else if($row21['bet_status']=="Canceled"){
																	?>
																	<strong style="color: red;">
																		<?php echo "CANCELLED"; ?>
																	</strong> 
																	<?php     
																}
																else if($row21['bet_status']==0){
																	?>
																	<strong style="color: #cc338b;">
																		<?php echo "PENDING"; ?>
																	</strong> 
																	<?php    
																}
																?>
															</td>
														</tr>
													<?php } ?>
												</tbody>
											</table>
											<div id="betingTable_processing" class="dataTables_processing panel panel-default" style="display: none;">Processing...
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-5"></div>
										<div class="col-sm-5">
											<div class="dataTables_paginate paging_simple_numbers" id="betingTable_paginate">
												<ul class="pagination">
													<li class="paginate_button previous disabled" id="betingTable_previous">
														<a href="#" aria-controls="betingTable" data-dt-idx="0" tabindex="0">
															<span class="fa fa-angle-double-left"></span>
														</a>
													</li>
													<li class="paginate_button next disabled" id="betingTable_next">
														<a href="#" aria-controls="betingTable" data-dt-idx="1" tabindex="0">
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
		</div>
	</div>
</div>
<?php 
$statement = $pdo->prepare("SELECT *
    FROM tbl_deposit WHERE request_by=?");
$statement->execute(array($uid));
$result = $statement->fetchAll(PDO::FETCH_ASSOC); ?>
<div id="allDeposits" class=" bhoechie-tab hide">

	<div class="bhoechie-tab-content ">
		<div class="">
			<div class="row">
				<div class="col-xs-12">
					<div class="table-responsive">
						<div id="depositTable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
							<div class="row">
								<div class="col-sm-6">
									<div class="dataTables_length" id="depositTable_length">
										<label>Show
											<select name="depositTable_length" aria-controls="depositTable" class="form-control input-sm">
												<option value="10" selected="selected">10</option>
												<option value="25">25</option>
												<option value="50">50</option>
												<option value="100">100</option>
											</select>entries
										</label>
									</div>
								</div>
								<div class="col-sm-6">
									<div id="depositTable_filter" class="dataTables_filter">
										<label>Search:
											<input type="search" class="form-control input-sm" placeholder="" aria-controls="depositTable">
										</label>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<table class="table table-bordered table-hover dataTable no-footer" id="depositTable" role="grid" aria-describedby="depositTable_info" style="width: 1083px;">
										<thead>
											<tr role="row">
												<th style="width:;">SN</th>
												<th style="width:;">From</th>
												<th style="width:;">To</th>
												<th style="width:;">Amount</th>
												<th style="width:;">TrXID</th>
												<th style="width:;">Through</th>
												<th style="width:;">Status</th>
												<th style="width:;">Note</th>
												<th style="width:;">Requested At</th>
												<th style="width:;">Accept/Cancel At</th>
											</thead>
											<tbody>
												<?php
												$i=1;
												foreach ($result as $row) {
													?>
													<tr class="odd">
														<td><?php echo $i++; ?></td>
														<td><?php echo $row['deposit_by']; ?></td>
														<td><?php echo $row['deposit_to']; ?></td>
														<td><?php echo number_format($row['amount'], 2, '.', ','); ?></td>
														<td><?php echo $row['transection_number']; ?></td>
														<td><?php echo $row['method']; ?></td>
														<td>
															<?php 
															if($row['status'] == 1){echo "<span style='color:green;'>Completed</span>";} else if($row['status'] == 2){echo "<span style='color:red;'>Cancelled</span>";} else{echo "Pending";} 
															?>
														</td>
														<td><?php echo $row['note']; ?></td>
														<td><?php echo $row['date']; ?></td>
														<td>
															<?php
															if($row['status'] == "0"){

															}
															else{
																$type="Deposit";
																$statement1 = $pdo->prepare("SELECT *
																	FROM tbl_transaction WHERE type=? AND detail_id=?");
																$statement1->execute(array($type,$row['deposit_id']));
																$result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);
																foreach ($result1 as $row1) {
																	echo $row1['transaction_date'];
																}
															}
															?>
														</td>
													</tr>
												<?php } ?>
											</tbody>
										</table>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-5">
										<div class="dataTables_info" id="depositTable_info" role="status" aria-live="polite">Showing 0 to 0 of 0 entries</div>
									</div>
									<div class="col-sm-5">
										<div class="dataTables_paginate paging_simple_numbers" id="depositTable_paginate">
											<ul class="pagination">
												<li class="paginate_button previous disabled" id="depositTable_previous">
													<a href="#" aria-controls="depositTable" data-dt-idx="0" tabindex="0">
														<span class="fa fa-angle-double-left"></span>
													</a>
												</li>
												<li class="paginate_button next disabled" id="depositTable_next">
													<a href="#" aria-controls="depositTable" data-dt-idx="1" tabindex="0">
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
	</div>


	<div id="allWithdrawals" class="bhoechie-tab hide">
		<div class="bhoechie-tab-content ">
			<div class="">
				<div class="row">
					<div class="col-xs-12">
						<div class="table-responsive">
							<div id="withdrawalTable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
								<div class="row">
									<div class="col-sm-6">
										<div class="dataTables_length" id="withdrawalTable_length">
											<label>Show
												<select name="withdrawalTable_length" aria-controls="withdrawalTable" class="form-control input-sm">
													<option value="10" selected="selected">10</option>
													<option value="25">25</option>
													<option value="50">50</option>
													<option value="100">100</option>
												</select>entries
											</label>
										</div>
									</div>
									<div class="col-sm-6">
										<div id="withdrawalTable_filter" class="dataTables_filter">
											<label>Search:
												<input type="search" class="form-control input-sm" placeholder="" aria-controls="withdrawalTable">
											</label>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<table class="table table-bordered table-hover dataTable no-footer" id="withdrawalTable" role="grid" style="width: 1083px;">
											<thead>
												<tr role="row">
													<th style="width: 40px">SN</th>
													<th style="width: 40px">To</th>
													<th style="width: 40px">Amount</th>
													<th style="width: 40px">Through</th>
													<th style="width: 40px">Status</th>
													<th style="width: 40px">Note</th>
													<th style="width: 40px">Requested At</th>
													<th style="width: 40px">Accepted/Canceled At</th>
													<th style="width: 40px">Cancel</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$i=0;
												foreach ($result2 as $row2) {
												    $i++;
													?>
													<tr class="odd">
														<td><?php echo $i; ?></td>
														<td><?php echo $row2['send_to']; ?></td>
														<td><?php echo number_format($row2['amount'], 2, '.', ','); ?></td>
														<td><?php echo $row2['method']; ?></td>
														<td>
															<?php if($row2['withdraw_status'] == 1){echo "<span style='color:green;'>Completed</span>";} else if($row2['withdraw_status'] == 2){echo "<span style='color:red;'>Rejected</span>";} else if($row2['withdraw_status'] == 3){echo "<span style='color:red;'>Canceled</span>";} else{echo "Pending";} ?>
														</td>
														<td><?php echo $row2['withdraw_note']; ?></td>
														<td><?php echo $row2['date']; ?></td>
														<td>
															<?php
															if($row2['withdraw_status'] == "0"){

															}
															else{
																$type="Withdraw";
																$statement3 = $pdo->prepare("SELECT *
																	FROM tbl_transaction WHERE type=? AND detail_id=?");
																$statement3->execute(array($type,$row2['withdraw_id']));
																$result3 = $statement3->fetchAll(PDO::FETCH_ASSOC);
																foreach ($result3 as $row3) {
																	echo $row3['transaction_date'];
																}
															}
															?>
														</td>
														<td>
														    <?php
														    if(($row2['withdraw_status'] == 0)){
														    ?>
														    <a href="cancel-withdraw.php?id=<?php echo $row2['withdraw_id']; ?>" class="btn btn-danger">Cancel Withdraw</a>
														    <?php
														    }
														    else{
														        echo "X";
														    }
														    ?>
														</td>
													</tr>
												<?php } ?>
											</tbody>
										</table>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-5">
									</div>
									<div class="col-sm-5">
										<div class="dataTables_paginate paging_simple_numbers" id="withdrawalTable_paginate">
											<ul class="pagination">
												<li class="paginate_button previous disabled" id="withdrawalTable_previous">
													<a href="#" aria-controls="withdrawalTable" data-dt-idx="0" tabindex="0">
														<span class="fa fa-angle-double-left"></span>
													</a>
												</li>
												<li class="paginate_button next disabled" id="withdrawalTable_next">
													<a href="#" aria-controls="withdrawalTable" data-dt-idx="1" tabindex="0">
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
	</div>


	
	<div id="transactionHistory" class="bhoechie-tab hide">
		<div class="bhoechie-tab-content ">
			<div class="">
				<div class="row">
					<div class="col-xs-12">
						<div class="tile">
							<div class="tile-body">
								<div class="user table-responsive">
									<table class="table table-hover table-bordered" id="transaction">
										<thead>
											<tr>
												<td><b>Date & Time</b></td>
												<td><b>Description</b></td>
												<td><b>Notes</b></td>
												<td class="text-center"><b>Debit (Out)</b></td>
												<td class="text-center"><b>Credit (In)</b></td>
											</tr>
										</thead>
											<tbody>
												<?php 
													$uid = $_SESSION['user']['user_id'];
													$statement = $pdo->prepare("SELECT * FROM tbl_transfer_list WHERE user_id=?");
													$statement->execute(array($uid));
													$result = $statement->fetchAll(PDO::FETCH_ASSOC);
													foreach ($result as $row) {
												?>

												<tr>
													<td><p><?php echo $row['date']; ?></p></td>
													<td><p><?php echo $row['description']; ?></p></td>
													<td><p><?php echo $row['notes']; ?></p></td>
													<td class="text-center">
														<p>
															<?php 
																if($row['cash_out']){
																	echo $row['cash_out'];
																}else {
																	echo "0";
																}
															?>
														</p>
													</td>
													<td class="text-center">
														<p>
															<?php 
																if($row['cash_in']){
																	echo $row['cash_in'];
																}else{
																	echo "0";
																}
															?>
														</p>
													</td>
												</tr>
												<?php
													}
												?>
											</tbody>
										</table>
										<div class="text-right border p-2">
											<h5><b>Total Balance: </b> <?php echo number_format($m, 2, '.', ','); ?></h5>
										</div>
										<br><br>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>