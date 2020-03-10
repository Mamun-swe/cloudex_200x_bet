<div id="wrapper  ">

	<header><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<nav class="navbar navbar-default heading_color">
			<div class="container ">

				<div class="navbar-header ">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<div class="headerLogoWrap">
						<div class="logo">
							<a class="" href="index.php"><img src="images/coollogo_com-3628899.png"/></a>
						</div>
						<div class="dateshow" style="background: none !important">
							<span class=" "></span>
							<span id="MyClockDisplayx" onload="showTimex()" style="font-size: 15px;"></span>
						</div>
					</div>
					<?php
					if(isset($_SESSION['user'])){
						?>
						<table class="guest" id="content-mobile" style="width:80% ;margin: 0px auto;margin-bottom: 5px">
							<tbody>
								<tr>
									<td>
										<table width="100%">
											<tbody><tr>
												<td>
													<div class="balanceTabWrap">
														<span class="menu-icon fa fa-usd"></span> <?php echo $m; ?></div>
													</td>
													<td>
														<div class="panel text-center balanceTabWrap" id="deposit-number" data-toggle="modal" data-target="#deposit">
															<span class="menu-icon fa fa-inbox"></span> Deposit
														</div>
													</td>
												</tr>
											</tbody></table>
										</td>
									</tr>
								<!--	<tr>-->
								<!--		<td>-->
								<!--			<table width="100%">-->
								<!--				<tbody><tr>-->
								<!--					<td>-->
								<!--						<div class="balanceTabWrap">-->
								<!--							<img src="svg/acc_active.svg" width="25px" height="25px">-->
								<!--						</div>-->
								<!--					</td>-->
								<!--					<td>-->
								<!--						<div class="balanceTabWrap">-->
								<!--							<div class="icon-wrap">-->
								<!--							</div>-->
								<!--							<img src="img/send-money.png" width="25px" height="25px">-->
								<!--						</div>-->
								<!--					</td>-->
								<!--					<td>-->
								<!--						<div class="balanceTabWrap">-->
								<!--							<div class="icon-wrap">-->
								<!--								<i class="fa fa-times-circle"></i>-->
								<!--							</div>-->
								<!--							<img src="img/withdrow.png" width="25px" height="25px">-->
								<!--						</div>-->
								<!--					</td>-->
								<!--				</tr>-->
								<!--			</tbody>-->
								<!--		</table>-->
								<!--	</td>-->
								<!--</tr>-->
							</tbody>
						</table>
						<?php } ;?>
						<?php
					if(!isset($_SESSION['user'])){
						?>
						<table class="guest" id="content-mobile" style="width:96% ;margin: 0px auto">
						<tbody>
							<tr>
								<td>
									<a href="#">
										<div style=" padding:7px;cursor: pointer;background: #11668f!important;margin-right:10px;color: #fff!important;border: 1px solid #C29625!important;" class="panel text-center " data-toggle="modal" data-target="#registrationModal">
											<span class="menu-icon fa fa-sign-out">Sign Up</span>
										</div>
									</a>
								</td>
								<td>
									<a href="#" data-toggle="modal" data-target="#loginModal">
										<div style="  padding: 7px;cursor: pointer;background: #11668f!important;color: #fff!important;border: 1px solid #C29625!important;" class="panel text-center " data-toggle="modal" data-target="#SignIn">
											<span class="menu-icon fa fa-sign-out"> Log In</span>
										</div>
									</a>
								</td>
							</tr>
						</tbody>
					</table>
				<?php } ?>
				</div>

				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-middle nv">
						<?php
						if(!isset($_SESSION['user'])){
							?>
						

							<?php
						}
						else{
						    
						   
    $cm=$_SESSION['user']['club_name'];
    $uid=$_SESSION['user']['cc_id'];
	$statement666 = $pdo->prepare("SELECT * FROM tbl_club WHERE club_id=?");
	$statement666->execute(array($uid));
	$result666 = $statement666->fetchAll(PDO::FETCH_ASSOC);
	foreach ($result666 as $row666) {
		$m=$row666['balance'];
	}
	
	$statement9 = $pdo->prepare("SELECT * FROM tbl_member WHERE tbl_member.club_id=? ORDER BY tbl_member.user_id ASC");
                                            	$statement9->execute(array($uid));
                                            	$tm = $statement9->rowCount();
                                            //	$result9 = $statement9->fetchAll(PDO::FETCH_ASSOC);
							?>
							
							

							<li><a style="color: #000 !important;"><?php echo $cm; ?></a> </li>
							<li> <a href="statement.php">My Statement</a></li> 
							<li> <a href="wallet.php"> My Wallet</a></li>
							<li><a href="club_member.php">Member (<?php echo $tm; ?>) </a>
							</li>
							<li><a href="contact-us.php"> <img src="svg/ticket_Icon.svg" style="height: 20px;"> Contact Support</a>
							</li>
							<li class="my-balance"> <a href="#">Balance (<?php echo number_format($m, 2, '.', ','); ?>)</a></li>
							<li>
								<a class="dropdown-item" href="logout.php">
									Logout
								</a>
								<form id="logout-form" action="#" method="POST" style="display: none;">
									<input type="hidden" name="_token" value=""> </form>
								</li>
							<?php } ?>
						</ul>
					</div>

				</div>

			</nav>
		</header>
	</div>

	