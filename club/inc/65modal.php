<div id="deposit11" class="modal fade" role="dialog">
    <div class="modal-dialog  ">
        <div class="modal-content">
            <div class="modal-header m-head" style="  background: #174F8C  !important;">
                <button onClick="window.location.reload();" type="button" class="close" data-dismiss="modal" style="color: #ffffff">×</button>
                <h4 class="modal-title" style="color: #D2D2D2"> <img style="width: 85px;height: 32px;margin-left: 10px;" src="images/logo.png"> &nbsp; Request a deposit</h4>
            </div>
            <div class="modal-body" style="padding: 2% !important">
                <div class="">
                    <div role="form" class="register-form">
                        <div id="status_data">
                    </div>
                        <hr class="colorgraph">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label style="text-align: left;width: 100%;">Method<span style="color:#DD4F43;">*</span></label>
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
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label style="text-align: left;width: 100%;">To <span style="color:#DD4F43;">*</span></label>
                                    <input type="text" class="form-control bg-light-gray" id="req-deposit-to"
                                    name="to" placeholder="To" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label style="text-align: left;width: 100%;">Amount <span style="color:#DD4F43;">*</span></label>
                                    <input type="text" id="req-deposit-amount" name="amount" placeholder="Amount" class="form-control input-lg" placeholder="Amount" tabindex="1">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <label style="text-align: left;width: 100%;">From <span style="color:#DD4F43;">*</span></label>
                                <div class="form-group">
                                    <input type="text" id="req-deposit-from" name="from" class="form-control input-lg" placeholder="From" tabindex="1">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <label style="text-align: left;width: 100%;">Transaction Number<span style="color:#DD4F43;">*</span></label>
                                <div class="form-group">
                                    <input type="text" name="transection_number" id="req-deposit-transaction_number" class="form-control input-lg" placeholder="Transaction Number" tabindex="1">
                                </div>
                            </div>
                        </div>
                        <hr class="colorgraph">
                        <div class="row">
                            <div class="col-lg-3"></div>
                            <div class="col-lg-6">
                                <a onClick="depositPost();" type="button" class="btn  btn-block btn-lg" tabindex="7" style="background: #174F8C; color: #fff;">Submit
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





<div id="requestWithdrawModal11" class="modal fade" role="dialog" >
	<div class="modal-dialog  ">
		<div class="modal-content">
			<div class="modal-header m-head" style="  color:#fff; !important;">
				<button onClick="window.location.reload();" type="button" class="close" data-dismiss="modal" style="color: #ffffff">×</button>
				<h4 class="modal-title" style="color: #D2D2D2" id="requestWithdrawModalLabel"> <img style="width: 85px;height: 32px;margin-left: 10px;" src="images/logo.png"> &nbsp;Request a withdraw</h4>
			</div>
			<form action="" method="post">
				<div class="modal-body" style="padding: 2% !important">
					<div role="form" class="register-form">
						 <div id="status_data1">
                    </div>
                    <h2>fgh</h2>
						<hr class="colorgraph">
						<div class="row">
							<div class="col-xs-12 col-sm-6 col-md-6">
								<div class="form-group">
									<label style="text-align: left;width: 100%;">Method<span style="color:#DD4F43;">*</span></label>
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
							<div class="col-xs-12 col-sm-6 col-md-6">
								<div class="form-group">
									<label style="text-align: left;width: 100%;">Type <span style="color:#DD4F43;">*</span></label>
									<select placeholder="Account Type" class="form-control" id="withdraw_account_type" name="account_type">
										<option value="">Account Type</option>
										<option value="Personal">Personal</option>
										<option value="Agent">Agent</option>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-6 col-md-6">
								<div class="form-group">
									<label style="text-align: left;width: 100%;">Amount <span style="color:#DD4F43;">*</span></label>
									<input type="text" class="form-control bg-light-gray" id="req-withdraw-amount"
									name="withdraw_amount"  placeholder="Amount" tabindex="1">
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6">
								<label style="text-align: left;width: 100%;"> To <span style="color:#DD4F43;">*</span></label>
								<div class="form-group">
									<input type="text" id="req-withdraw-to"
									name="withdraw_to" class="form-control input-lg" placeholder=" To " tabindex="1">
								</div>
							</div>
						</div>
						<hr class="colorgraph">
						<div class="row">
							<div class="col-lg-3"></div>
							<div class="col-lg-6"><a  onclick="withdrawPost();" value="" class="btn btn-block btn-lg" tabindex="7" style="background: #016D5F !important; color:#fff;;"> Submit </a></div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>










<div id="passwordVerify" class="modal fade" role="dialog">
	<div class="modal-dialog modal-sm ">

		<div class="modal-content">
			<div id="" class="showCategoryId"></div>
			<div class="modal-header m-head" style="  background: #174F8C  !important;">
				<button type="button" class="close" data-dismiss="modal" style="color: #ffffff">×</button>
				<h4 class="modal-title" style="color: #D2D2D2"> <img style="width: 85px;height: 32px;margin-left: 10px;" src="img/hhh.png"> &nbsp; Verification step</h4>
			</div>
			<div class="modal-body" style="padding: 2% !important">
				<div class="">
					<div role="form" class="register-form">
						<div id="codeError" style="display: none" class="alert alert-danger codeError" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
							×</button> <strong> Opps !!</strong> <span id="codeErrorText"></span>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<div class="form-group">
									<label style="text-align: left;width: 100%;">Password <span style="color:#DD4F43;">*</span></label>
									<input type="password" name="password" id="Vcode" class="form-control input-lg" placeholder="Enter password" tabindex="1">
								</div>
							</div>
						</div>
						<hr class="colorgraph">
						<div class="row">
							<div class="col-lg-12">
								<button type="button" id="verifyPassword" value="" class="btn btn-block btn-lg" tabindex="7" style="background: #174F8C; color:#fff;"> Submit </button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



<div id="change-password-modalqq" class="modal fade" role="dialog" style="display: none;" aria-hidden="true">
	<div class="modal-dialog  ">

		<div class="modal-content">
			<div class="modal-header m-head" style="  background: #174F8C  !important;">
				<button type="button" class="close" data-dismiss="modal" style="color: #ffffff">×</button>
				<h4 class="modal-title" style="color: #D2D2D2"> <img style="width: 85px;height: 32px;margin-left: 10px;" src="img/hhh.png"> &nbsp; Change Password</h4>
			</div>
			<form action="" method="post">
			<div class="modal-body" style="padding: 2% !important">
				<div class="">
					<div role="form" class="register-form">
						

						<hr class="colorgraph">
						<div class="form-group">
							<label style="text-align: left;width: 100%;">Current Password <span style="color:#DD4F43;">*</span></label>
							<input type="password" name="current_password" id="user-current-password" class="form-control input-lg" placeholder="Current Password " tabindex="3" required="">
						</div>
						<div class="form-group">
							<label style="text-align: left;width: 100%;">New Password <span style="color:#DD4F43;">*</span></label>
							<input type="password" name="new_password" id="user-new-password" class="form-control input-lg" placeholder="New Password" tabindex="3" minlength="6" required="">
						</div>
						<div class="form-group">
							<label style="text-align: left;width: 100%;">Confirm Password <span style="color:#DD4F43;">*</span></label>
							<input type="password" name="confirm_password" id="user-cnf-password" class="form-control input-lg" placeholder="Confirm Password" tabindex="3" required="" minlength="6">
						</div>
						<hr class="colorgraph">
						<div class="row">
							<div class="col-lg-3"></div>
							<div class="col-lg-6"><button type="button" name="form3" class="btn btn-block btn-lg" tabindex="7" style="background: #174F8C; color:#fff;"> Submit </button></div>
						</div>
					</div>
				</div>
			</div>
		</form>
		</div>
	</div>
</div>



<div id="balanceTransfer" class="modal fade" role="dialog">
	<div class="modal-dialog  ">

		<div class="modal-content">
			<div class="modal-header m-head" style="  background: #174F8C  !important;">
				<button type="button" class="close" data-dismiss="modal" style="color: #ffffff">×</button>
				<h4 class="modal-title" style="color: #D2D2D2"> <img style="width: 85px;height: 32px;margin-left: 10px;" src="img/hhh.png"> &nbsp; Balance Transfer</h4>
			</div>
			<div class="modal-body" style="padding: 2% !important">
				<div class="">
					<div role="form" class="register-form">
						<div id="errorBalanceTransfer" class="alert alert-danger errorBalanceTransfer" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
							×</button> <strong> Opps !!</strong> <span id="balanceTransferText"></span>
						</div>
						<hr class="colorgraph">
						<div class="form-group">
							<label style="text-align: left;width: 100%;">To <span style="color:#DD4F43;">*</span></label>
							<input type="text" name="display_name" id="to_userId" class="form-control input-lg" placeholder="User Id" tabindex="3">
						</div>
						<div class="form-group">
							<label class="counter-number" style="text-align: left;width: 100%;">Counter Number <span style="color:#DD4F43;">* </span><button class="btn btn-success btn-xs random-generate"><span class="fa fa-random">Click Here For Auto Generate </span></button></label>
							<input type="text" name="notes" id="notes" class="form-control input-lg" placeholder="CZ5ERW7PG" tabindex="3">
						</div>
						<div class="form-group">
							<label style="text-align: left;width: 100%;">Amount <span style="color:#DD4F43;">*</span></label>
							<input type="text" id="transferAmount" class="form-control input-lg" placeholder="Amount" tabindex="3">
						</div>
						<hr class="colorgraph">
						<div class="row">
							<div class="col-lg-3"></div>
							<div class="col-lg-6"><button type="submit" id="balanceTransferSubmit" value="" class="btn btn-block btn-lg" tabindex="7" style="background: #174F8C; color:#fff;">Submit </button></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<div id="changeClub" class="modal fade" role="dialog" style="display: none;" aria-hidden="true">
	<div class="modal-dialog  ">

		<div class="modal-content">
			<div class="modal-header m-head" style="  background: #174F8C  !important;">
				<button type="button" class="close" data-dismiss="modal" style="color: #ffffff">×</button>
				<h4 class="modal-title" style="color: #D2D2D2"> <img style="width: 85px;height: 32px;margin-left: 10px;" src="img/hhh.png"> &nbsp; Change Club</h4>
			</div>
			<div class="modal-body" style="padding: 2% !important">
				<div class="">
					<div role="form" class="register-form">
						<div id="errorchangeClub" class="alert alert-danger errorchangeClub" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
							×</button> <strong> Opps !!</strong> <span id="errorchangeClubText"></span>
						</div>
						<div class="form-group">
							<label style="text-align: left;width: 100%;">Method<span style="color:#DD4F43;">*</span></label>
							<select class="form-control" id="cClub">
								<option disabled="disabled" selected="selected" value="">Select Club</option>
								<option value="11">Betin77</option>
								<option value="12">Live</option>
								<option value="13">BDG</option>
								<option value="14">AAA</option>
								<option value="15">Tiger Club</option>
								<option value="16">Big Boss Winner BD</option>
								<option value="17">Betwin🇧🇩 Club 🇧🇩</option>
								<option value="18">Sagar Club</option>
								<option value="19">☞ Lions club</option>
								<option value="20">Barcelona Club</option>
								<option value="21">Betting Club</option>
								<option value="22">BOYS CLUB</option>
								<option value="23">Stars club</option>
								<option value="24">Cricbuzz</option>
								<option value="25">Online Club BD</option>
								<option value="26">👬 Bd77 ♥</option>
								<option value="27">YOUNG CLUB</option>
								<option value="28">🏏 BD 24 🏆</option>
								<option value="29">Rock club</option>
								<option value="30">Betting Tips</option>
								<option value="31">💚 Green Club 💚</option>
								<option value="32">RajBET Club</option>
								<option value="11644">🏏 City Club 🏏</option>
								<option value="11645">Bet365 Club</option>
								<option value="12921">Dj Club</option>
								<option value="13589">Mango Club</option>
								<option value="14198">BD Sports</option>
								<option value="15301">STAR WARS</option>
								<option value="19524">AKOTA CLUB</option>
								<option value="20130">Faridpur Club</option>
								<option value="25454">Munshiganj club</option>
								<option value="26929">⭐ Dhaka Club ⭐</option>
								<option value="26985">All Sports Club</option>
								<option value="28127">Betin Winner</option>
								<option value="28129">BD Magura Club</option>
								<option value="28140">Bet Fair Club</option>
								<option value="28315">Help Line Club</option>
								<option value="28370">winBET</option>
								<option value="28458">BangladesH</option>
								<option value="28459">💎 Green Table 💎</option>
								<option value="31252">? Betting Guru ✌</option>
								<option value="31538">✌✌BOSS CLUB ✌✌</option>
								<option value="31690">Golden Club</option>
								<option value="31745">King club</option>
								<option value="32694">Public club</option>
								<option value="32758">Dot Club</option>
								<option value="33728">Brazil Club</option>
							</select>
							<div class="form-group">
								<label style="text-align: left;width: 100%;"> Password <span style="color:#DD4F43;">*</span></label>
								<input type="password" name="PasswordClubChange" id="PasswordClubChange" class="form-control input-lg" placeholder="Current Password " tabindex="3" required="">
							</div>
						</div>
						<hr class="colorgraph">
						<div class="row">
							<div class="col-lg-3"></div>
							<div class="col-lg-6"><button type="submit" id="changeClubSubmit" value="" class=" btn btn-block btn-lg" tabindex="7" style="background: #174F8C; color:#fff;">Update </button></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
