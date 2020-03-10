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
										
									</div>
									<div class="row">
										<div class="col-sm-12">
											<table class="table table-hover table-bordered dataTable no-footer" id="betingTable" role="grid" style="width: 1083px;">
												<thead>
													<tr role="row">
														<th style="font-size: 20px;">SN.</th>
														<th style="font-size: 20px;">Date</th>
														<th style="font-size: 20px;">Name</th>
														<th style="font-size: 20px;">User Name</th>
														<th style="font-size: 20px;">Commission</th>
													</tr>
												</thead>
												<tbody>
													<?php
													$i=0;
													$statement9 = $pdo->prepare("SELECT * FROM tbl_member WHERE tbl_member.club_id=? ORDER BY tbl_member.user_id ASC");
                                            	$statement9->execute(array($uid));
                                            	$result9 = $statement9->fetchAll(PDO::FETCH_ASSOC);
												foreach ($result9 as $row9) {
												    $total_bet=0;
												    $commission=0;
													$i++;
													$statementb = $pdo->prepare("SELECT * FROM tbl_bet WHERE tbl_bet.bet_by=? ORDER BY bet_id DESC");
                                            	    $statementb->execute(array($row9['user_id']));
                                            	    $resultb = $statementb->fetchAll(PDO::FETCH_ASSOC);
                                            	    foreach ($resultb as $rowb) {
                                            	    //    if($rowb['bet_by']==$row9['user_id']){
                                            	            
														?>
														<tr>

															<td><?php echo $i++; ?></td>
															<td><?php echo $rowb['date']; ?></td>
															<td><?php echo $row9['full_name']; ?></td>
															<td><?php echo $row9['user_name']; ?></td>
															<td>
															<?php 
															    echo number_format($rowb['amount']*0.02, 2, '.', ','); 
														    ?>
															</td>
															
														</tr>
													<?php }} ?>
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
											$i=1;
				$firstCharacter1="";
                $statementw = $pdo->prepare("SELECT * FROM tbl_withdraw ORDER BY withdraw_id DESC");
            	$statementw->execute();
            	$resultw = $statementw->fetchAll(PDO::FETCH_ASSOC);							
            	foreach ($resultw as $roww) {
            		$uid=$_SESSION['user']['cc_id'];
            	$firstCharacter1 = $roww['request_by'];
            		$firstCharacter =substr($firstCharacter1, 0, 2);
            		$str = preg_replace('/\D/', '', $firstCharacter1);
            		if($firstCharacter=='cc' && $str==$uid){
            		   
													?>
													<tr class="odd">
														<td><?php echo $i++; ?></td>
														<td><?php echo $roww['send_to']; ?></td>
														<td><?php echo number_format($roww['amount'], 2, '.', ','); ?></td>
														<td><?php echo $roww['method']; ?></td>
														<td>
															<?php if($roww['withdraw_status'] == 1){echo "<span style='color:green;'>Completed</span>";} else if($roww['withdraw_status'] == 2){echo "<span style='color:red;'>Rejected</span>";} else if($roww['withdraw_status'] == 3){echo "<span style='color:red;'>Canceled</span>";} else{echo "Pending";} ?>
														</td>
														<td><?php echo $roww['withdraw_note']; ?></td>
														<td><?php echo $roww['date']; ?></td>
														<td>
															<?php
															if($roww['withdraw_status'] == "0"){

															}
															else{
																$type="Withdraw";
																$statement3 = $pdo->prepare("SELECT *
																	FROM tbl_transaction WHERE type=? AND detail_id=?");
																$statement3->execute(array($type,$roww['withdraw_id']));
																$result3 = $statement3->fetchAll(PDO::FETCH_ASSOC);
																foreach ($result3 as $row3) {
																	echo $row3['transaction_date'];
																}
															}
															?>
														</td>
														<td>
														    <?php
														    if(($roww['withdraw_status'] == 0)){
														    ?>
														    <a href="cancel-withdraw.php?id=<?php echo $roww['withdraw_id']; ?>" class="btn btn-danger">Cancel Withdraw</a>
														    <?php
														    }
														    else{
														        echo "X";
														    }
														    ?>
														</td>
													</tr>
												<?php } }?>
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
												<th>Date & Time</th>
												<th colspan="2">Description</th>
												<th>Notes</th>
												<th>Debit (Out)</th>
												<th>Credit (In)</th>
												<th>Balance</th>
											</tr>
										</thead>
										<tbody>
											<?php
											foreach ($result4 as $row4) {
												if($row4['type'] == "Deposit"){

													$statement5 = $pdo->prepare("SELECT * FROM tbl_deposit WHERE deposit_id=? AND request_by=?");
													$statement5->execute(array($row4['detail_id'],$uid));
													$result5 = $statement5->fetchAll(PDO::FETCH_ASSOC);
													foreach ($result5 as $row5) {
														?>
														<tr>
															<tr>
																<td class="text-center"><?php echo $row4['transaction_date']; ?></td>
																<td colspan="2" class="text-center"><?php echo $row4['description']; ?></td>
																<td class="text-center"><?php echo $row5['note']; ?></td>
																<td class="text-center">0.00</td>
																<td class="text-center">
																	<?php 
																	if($row5['status']==1){
																		echo number_format($row5['amount'], 2, '.', ',');
																	}else{
																		echo "0.00";
																	}
																	?>
																</td>
																<td class="text-center"><?php echo number_format($row4['user_balance'], 2, '.', ','); ?></td>
															</tr>
															<?php

														}

													}if($row4['type']=="Withdraw"){

														$statement6 = $pdo->prepare("SELECT * FROM tbl_withdraw WHERE withdraw_id=? AND request_by=?");
														$statement6->execute(array($row4['detail_id'],$uid));
														$result6 = $statement6->fetchAll(PDO::FETCH_ASSOC);
														foreach ($result6 as $row6) {
															?>
															<tr>
																<td class="text-center"><?php echo $row4['transaction_date']; ?></td>
																<td colspan="2" class="text-center"><?php echo $row4['description']; ?></td>
																<td class="text-center"><?php echo $row6['withdraw_note']; ?></td>
																<td class="text-center">
																	<?php 
																	if($row6['withdraw_status']==1){
																		echo number_format($row6['amount'], 2, '.', ',');
																	}else{
																		echo "0.00";
																	}
																	?>
																</td>
																<td class="text-center">
																    <?php
																    if(($row6['withdraw_status']==1) || ($row6['withdraw_status']==2) || ($row6['withdraw_status']==3)){
																		echo number_format($row6['amount'], 2, '.', ',');
																	}else{
																		echo "0.00";
																	}
																	?>
															    </td>
																<td class="text-center"><?php echo number_format($row4['user_balance'], 2, '.', ','); ?></td>
															</tr>
															<?php

														}

													}if($row4['type']=="Transfer"){

														$uname=$_SESSION['user']['user_name'];
														$statement7 = $pdo->prepare("SELECT * FROM tbl_transfer_list WHERE transfer_id=? AND transfer_to=?");
														$statement7->execute(array($row4['detail_id'],$uname));
														$result7 = $statement7->fetchAll(PDO::FETCH_ASSOC);
														foreach ($result7 as $row7) {
															if($row4['description']=="Credit Transfer Add"){
																?>
																<tr>
																	<td class="text-center"><?php echo $row4['transaction_date']; ?></td>
																	<td colspan="2" class="text-center"><?php echo $row4['description']; ?></td>
																	<td class="text-center"><?php echo $row7['notes']; ?></td>
																	<td class="text-center">
																		<?php 
																		echo "0.00";
																		?>
																	</td>
																	<td class="text-center">
																		<?php 
																		echo $row7['amount']; 
																		?>
																	</td>
																	<td class="text-center"><?php echo number_format($row4['user_balance'], 2, '.', ','); ?></td>
																</tr>
																<?php
															}
														} $statement78 = $pdo->prepare("SELECT * FROM tbl_transfer_list WHERE transfer_id=? AND transferred_by=?");
														$statement78->execute(array($row4['detail_id'],$uname));
														$result78 = $statement78->fetchAll(PDO::FETCH_ASSOC);
														foreach ($result78 as $row78) {
															if($row4['description']=="Credit Send"){
																?>
																<tr>
																	<td class="text-center"><?php echo $row4['transaction_date']; ?></td>
																	<td colspan="2" class="text-center"><?php echo $row4['description']; ?></td>
																	<td class="text-center"><?php echo $row78['notes']; ?></td>
																	<td class="text-center">
																		<?php 
																		echo number_format($row78['amount'], 2, '.', ',');

																		?>
																	</td>
																	<td class="text-center">
																		<?php 

																		echo "0.00";

																		?>
																	</td>
																	<td class="text-center"><?php echo number_format($row4['user_balance'], 2, '.', ','); ?></td>
																</tr>
																<?php
															}



														}

													}if($row4['type']=="Bet Sell"){

														$statement8 = $pdo->prepare("SELECT * FROM tbl_bet JOIN tbl_stake ON tbl_bet.stake_id=tbl_stake.stake_id WHERE bet_id=? AND bet_by=?");
														$statement8->execute(array($row4['detail_id'],$uid));
														$result8 = $statement8->fetchAll(PDO::FETCH_ASSOC);
														foreach ($result8 as $row8) {
															?>
															<tr>
																<td class="text-center"><?php echo $row4['transaction_date']; ?></td>
																<td colspan="2" class="text-center"><?php echo $row4['description']; ?></td>
																<td class="text-center"></td>
																<td class="text-center"><?php echo "0.00"; ?></td>
																<td class="text-center">
																	<?php 
																	$ro=$row8['amount'] * $row8['sell_price'];
																	echo number_format($ro, 2, '.', ',');

																	?>
																</td>
																<td class="text-center"><?php echo number_format($row4['user_balance'], 2, '.', ','); ?></td>
															</tr>
															<?php

														}

													}
													if($row4['type']=="Bet Win"){

														$statement9 = $pdo->prepare("SELECT * FROM tbl_bet WHERE bet_id=? AND bet_by=?");
														$statement9->execute(array($row4['detail_id'],$uid));
														$result9 = $statement9->fetchAll(PDO::FETCH_ASSOC);
														foreach ($result9 as $row9) {
															?>
															<tr>
																<td class="text-center"><?php echo $row4['transaction_date']; ?></td>
																<td colspan="2" class="text-center"><?php echo $row4['description']; ?></td>
																<td class="text-center"></td>
																<td class="text-center"><?php echo "0.00"; ?> </td>
																<td class="text-center">
																	<?php 

																	$ass=$row9['return_amount'];
																	$ass1=$ass*0.01;
																	$ass2=$ass-$ass1;
																	echo number_format($ass2, 2, '.', ',');

																	?>
																</td>
																<td class="text-center"><?php echo number_format($row4['user_balance'], 2, '.', ','); ?></td>
															</tr>
															<?php

														}

													}
													if($row4['type']=="Bet Loss"){

														$statement99 = $pdo->prepare("SELECT * FROM tbl_bet WHERE bet_id=? AND bet_by=?");
														$statement99->execute(array($row4['detail_id'],$uid));
														$result99 = $statement99->fetchAll(PDO::FETCH_ASSOC);
														foreach ($result99 as $row99) {
															?>
															<tr>
																<td class="text-center"><?php echo $row4['transaction_date']; ?></td>
																<td colspan="2" class="text-center"><?php echo $row4['description']; ?></td>
																<td class="text-center">Inproper Bet Place</td>
																<td class="text-center"><?php echo number_format($row99['amount'], 2, '.', ','); ?> </td>
																<td class="text-center">
																	<?php echo "0.00"; ?>
																</td>
																<td class="text-center"><?php echo number_format($row4['user_balance'], 2, '.', ','); ?></td>
															</tr>
															<?php

														}

													}
												}
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>