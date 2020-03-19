<?php if(isset($_SESSION['user'])){ ?>
    <div id="deposit" class="modal fade" role="dialog">
        <div class="modal-dialog  ">
            <div class="modal-content">
                <div class="modal-header m-head " style="background: #1C69C2 ">
                    <button onClick="window.location.reload();" type="button" class="close" data-dismiss="modal" style="color: #ffffff">×</button>
                    <h4 class="modal-title" style="color: #D2D2D2">  &nbsp; Request a deposit</h4>
                </div>
                <div class="modal-body" style="padding: 2% !important">
                    <div class="">
                        <div role="form" class="register-form">
                            <div id="status_data" style="background-color: rgb(248, 215, 218); font-size: 16px;color: #000;">
                            </div>
                            <hr class="colorgraph">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label style="text-align: left;width: 100%;">Method<span style="color:#DD4F43;">*</span></label>
                                        <select class="form-control" id="sel1" name="sellist1">
                                            <option value="">Select Method</option>
                                            <?php
                                            foreach ($result1 as $row1) {
                                                ?>
                                                <option value="<?php echo $row1['number']; ?>" data-method="<?php echo $row1['method']; ?>"><?php echo $row1['method']; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <input type="hidden" class="form-control" id="method">
                                
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label style="text-align: left;width: 100%;">To <span style="color:#DD4F43;">*</span></label>
                                        
                                        <input type="text" class="form-control bg-light-gray" id="req-deposit-to"
                                        name="to" placeholder="To" required="required" disabled>
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
                                    <a onClick="depositPost();" style="background: #1C69C2;color: #fff" type="button" class="btn  btn-block btn-lg" tabindex="7">Submit
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php } 
if(isset($_SESSION['user'])){
    ?>

    <!-- Request Withdraw Modal -->
    <div id="requestWithdrawModal" class="modal fade" role="dialog" >
        <div class="modal-dialog  ">
            <div class="modal-content">
                <div class="modal-header m-head" style="  color:#fff !important;background: #1C69C2 ">
                    <button onClick="window.location.reload();" type="button" class="close" data-dismiss="modal" style="color: #ffffff">×</button>
                    <h4 class="modal-title" style="color: #D2D2D2" id="requestWithdrawModalLabel"> &nbsp;Request a withdraw</h4>
                </div>

                <?php 
                    $statement = "SELECT * FROM tbl_withdraw_limit ORDER BY id DESC LIMIT 1";
                    $stmt =  $pdo->query($statement);
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    $status = $row['status'];

                    if($status == 0){
                ?>
                <br>
                <br>
                <br>
                <h4 class="text-danger text-center py-2">Withdraw request has been blocked. For a limited time.</h4>
                <br>
                <br>
                <br>
                <?php 
                    }else{

                ?>

                <form action="" method="post">
                    <div class="modal-body" style="padding: 2% !important">
                        <div role="form" class="register-form">
                           <div id="status_data1">
                           </div>
                           <hr class="colorgraph">
                           <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label style="text-align: left;width: 100%;">Method<span style="color:#DD4F43;">*</span></label>
                                    <select class="form-control" name="withdraw_method" id="withdraw_method">
                                        <option value="">Select Method</option>
                                        <option value="Instant Transfer">Instant Transfer</option> 
                                        <option value="TrustPay">TrustPay</option> 
                                        <option value="BKASH   (বাংলাদেশ)">BKASH   (বাংলাদেশ)</option>
                                        <option value="NAGAD (বাংলাদেশ)">NAGAD (বাংলাদেশ)</option>
                                        <option value="Neteller">Neteller</option> 
                                        <option value="Banco Do Brasil">Banco Do Brasil</option> 
                                        <option value="Naranja">Naranja</option> 
                                        <option value="Santander Rio">Santander Rio</option> 
                                        <option value="HiperCard">HiperCard</option> 
                                        <option value="Teleingreso">Teleingreso</option> 
                                        <option value="CMR Falabella">CMR Falabella</option>
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
                            <div class="col-lg-6"><a  style="background: <?php echo $status_bar_color; ?> !important; color: black !important;" onclick="withdrawPost();" value="" class="btn btn-block btn-lg mh-color" tabindex="7" style=" color:#fff;;"> Submit </a></div>
                        </div>
                    </div>
                </div>
            </form>

            <?php } ?>

        </div>
    </div>
</div>
<!-- Request Withdraw Modal -->
<?php
}

 if (isset($_SESSION['user'])) { ?>

    <div id="change-password-modal" class="modal fade" role="dialog" style="display: none;" aria-hidden="true">
        <div class="modal-dialog  ">

            <div class="modal-content">
                <div class="modal-header m-head" style="background: #1C69C2">
                    <button type="button" onClick="window.location.reload();" class="close" data-dismiss="modal" style="color: #ffffff">×</button>
                    <h4 class="modal-title" style="color: #D2D2D2">  Change Password</h4>
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
                                    <div class="col-lg-6"><button style="background: <?php echo $status_bar_color; ?> !important;" type="submit" name="form3" class="btn btn-block btn-lg mh-color" tabindex="7" style="color:#fff;"> Submit </button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php }?>

