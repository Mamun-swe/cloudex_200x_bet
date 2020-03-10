<?php $statement = $pdo->prepare("SELECT *
   FROM tbl_message_sent WHERE type=? OR message_sent_to=? ORDER BY message_sent_id ASC");
$statement->execute(array($type,$uid));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
 ?>
<div id="inboxmsg" class="bhoechie-tab">
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
												</label> Inbox Massage
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
														<th style="font-size: 20px;">Date & Time</th>
														<th style="font-size: 20px;">Massage</th>
														<th style="font-size: 20px;">Action</th>
													</tr>
												</thead>
												<tbody>
													<?php
													foreach ($result as $row) {
														$i++;
														?>
														<tr>
															<td class="text-center"><?php echo $i; ?></td>
															<td class="text-center">
																<?php echo $row['message_sent_date'].' '.$row['sent_time']; ?>
																	
																</td>
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
<div id="sentmsg" class="bhoechie-tab hide">
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
												</label> Sentbox Massage
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
														<th style="font-size: 20px;">Date & Time</th>
														<th style="font-size: 20px;">Massage</th>
														<th style="font-size: 20px;">Action</th>
													</tr>
												</thead>
												<tbody>
													<?php
													foreach ($resultsent as $row) {
														$i++;
														?>
														<tr>
															<td class="text-center"><?php echo $i; ?></td>
															<td><?php echo $date=$row['date'].' '.$row['time']; ?></td>
															<td><?php echo $row['message']; ?></td>
															<td>
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
<div id="newmsg" class="modal fade" role="dialog">
	<div class="modal-dialog  ">
		<div class="modal-content">
			<div class="modal-header m-head" style="background: #1C69C2">
				<button onClick="window.location.reload();" type="button" class="close" data-dismiss="modal" style="color: #ffffff">×</button>
				<h4 class="modal-title" style="color: #D2D2D2"> &nbsp; Request a massage</h4>
			</div>
			<form  action="" method="post">
				<div class="modal-body" style="padding: 2% !important">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12">
							<div class="form-group">
								<label style="text-align: left;width: 100%;">Type Your Text :</label>
								<textarea name="message" id="message_frm_message" class="form-control bg-light-gray" cols="30" rows="5" placeholder="Type Your Text"></textarea>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-3"></div>
						<div class="col-lg-6">
							<button type="submit" name="form7"
							class="btn  btn-block btn-lg" style="background: #1C69C2;color: #fff">
							Send
						</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
</div>
</div>