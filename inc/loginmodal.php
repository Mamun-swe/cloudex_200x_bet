<div id="loginModal" class="modal fade in" role="dialog" aria-hidden="false" style="display: none;">
    <div class="modal-dialog  ">
        <div class="alert-float alert alert-dismissable ajaxalert" id="" style="display: none">
            <button type="button" class="close ajaxclose" id="">×</button>
            <ul class="list-unstyled">
            </ul>
        </div>
        <div class="modal-content m-content" style="background: white;padding: 0">
            <div class="modal-header m-head" style="background: #1C69C2">
                <button type="button" class="close" data-dismiss="modal" style="color: #ffffff">×</button>
                <h4 class="modal-title" style="color: #D2D2D2"> &nbsp; Sign In</h4>
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
            <div class="modal-body" style="padding: 2% !important">
                <div class="signup-form">
                    <form action="" method="POST" style="padding: 0;box-shadow: none">
                        
                        <div id="formData">
                            <div id="errorSignIn" class="alert alert-danger errorSignIn" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                ×</button> <strong> Opps !!</strong> Please Insert Right Data !!
                            </div>
                            <div class="form-group">
                                <label>User Name <span style="color: red">*</span></label>
                                <input type="text" class="form-control" name="user_name" id="userIdOfuser" placeholder="user name" required="">
                                <span id="userIdError" style="color: #C84038;font-family: initial;"></span>
                            </div>
                            <div class="form-group">
                                <label>Password <span style="color: red">*</span></label>
                                <input type="password" class="form-control" name="password" value="" id="passwordOfuser" placeholder="password" required="required" pattern=".{6,}" title="6 characters minimum">
                                <span>Password at least 6 characters.</span>
                            </div>
                            <div class="form-group">
                                <button style="background: #1C69C2 !important;color: #fff" type="submit" name="form" class="btn btn-lg btn-block">Sign In</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<div id="registrationModal" class="modal fade in" role="dialog" aria-hidden="false" style="display: none;">
    <div class="modal-dialog  ">


        <div class="alert-float alert alert-dismissable ajaxalert" id="" style="display: none">
            <button type="button" class="close ajaxclose" id="">×</button>
            <ul class="list-unstyled">
            </ul>
        </div>

        <div class="modal-content m-content" style="background: white; padding: 0">
            <div class="modal-header m-head" style="background: #1C69C2">
                <button type="button" class="close" data-dismiss="modal"><a href="" style="color: #ffffff"><span class="fa fa-close"></span></a></button>
                <h4 class="modal-title text-center" style="color: #e7b989"> Sign Up</h4>
                <!--<marquee class="marqueeText text-center" behavior="alternate" style="font-size: 20px; color: #FFF;">Webcome to <span>200X Bet</span></marquee>-->
            </div>
            <div class="modal-body" style="padding: 2% !important">
                <div class="signup-form">
                    <form method="POST" action="" style="padding: 0;box-shadow: none">
                        <input type="hidden" name="_token" value="">
                        <div id="formData">
                            <div id="error" class="alert alert-danger error" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                ×</button> <strong> Opps !! </strong><span id="signuperrorText"></span>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <label>Full Name <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="full_name" id="user-reg-reg-name" placeholder="Name" required="">
                                    </div>
                                    <div class="col-xs-6">
                                        <label>User Name <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="username" id="userId" placeholder="User Name" required="">
                                        <span id="user-reg-username" style="color: #C84038;font-family: initial;"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <label>Mobile Number <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="number" id="user-reg-mobile" placeholder="mobileNumber" required="">
                                        <span id="mobileError" style="color: #C84038;font-family: initial;"></span>
                                    </div>
                                    <div class="col-xs-6">
                                        <label>Email <span style="color: red">*</span></label>
                                        <input type="email" class="form-control" name="email" id="user-reg-email" placeholder="email" required="">
                                        <span id="user-reg-username" style="color: #C84038;font-family: initial;"></span>
                                    </div>
                                </div>
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
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <label>Select Club <span style="color: red">*</span></label>
                                        <select class="form-control" name="club" required="required">
                                            <option value="">Select Club</option>
                                            <?php
                                            foreach ($result2 as $row2) {
                                                ?>
                                                <option value="<?php echo $row2['club_id']; ?>">
                                                    <?php echo $row2['club_name']; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-xs-6">
                                        <label>Sponsor's Username</label>
                                        <input type="text" class="form-control" name="sponsor_name" id="user-reg-sponsor_id" placeholder="Optional">
                                        <span id="sponsorError" style="color: #C84038;font-family: initial;"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <label>Password <span style="color: red">*</span></label>
                                        <input type="password" class="form-control" name="password" value="" id="user-reg-password" placeholder="password" required="required" pattern=".{6,}" title="6 characters minimum">
                                        <span>Password at least 6 characters.</span>
                                    </div>
                                    <div class="col-xs-6">
                                        <label>Confirm Password <span style="color: red">*</span></label>
                                        <input type="password" class="form-control" name="confirm_password" id="user-reg-cnf_password" placeholder="confirmPassword" required="required" pattern=".{6,}" title="6 characters minimum">
                                        <span id="passwordError" style="color: #C84038;font-family: initial;"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button style="background:#1C69C2 !important;color: #fff" type="submit" name="registration" class=" btn-lg btn-block">Register Now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
                    <!-- Registration Modal -->













											