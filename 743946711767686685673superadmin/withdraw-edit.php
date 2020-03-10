<?php require_once('header.php'); ?>

<?php
if(isset($_POST['form1'])) {
	$valid = 1;

    if(empty($_POST['request_by'])) {
        $valid = 0;
        $error_message .= "Requested user id can not be empty<br>";
    }
    
    if(empty($_POST['amount'])) {
        $valid = 0;
        $error_message .= "Amount By can not be empty<br>";
    }
    
    
    if(empty($_POST['method'])) {
        $valid = 0;
        $error_message .= "Method can not be empty<br>";
	} 
	
	if(empty($_POST['send_to'])) {
        $valid = 0;
        $error_message .= "Send To number can not be empty<br>";
	}
	
	if(empty($_POST['account_type'])) {
        $valid = 0;
        $error_message .= "Acount Type can not be empty<br>";
    }
    
    

    if($valid == 1) {

		// Saving data into the main table tbl_size
		$statement = $pdo->prepare("UPDATE `tbl_withdraw` SET `request_by`=?,`amount`=?,`method`=?,`send_to`=?, `account_type`=? WHERE withdraw_id=?");
		$statement->execute(array($_POST['request_by'],$_POST['amount'],$_POST['method'],$_POST['send_to'],$_POST['account_type'],$_REQUEST['id']));
		$msg="Withdraw is updated successfully.";
	    $url = "withdraw.php?message=$msg";
        header("Location: ".$url);
    }
}
?>

<?php
if(!isset($_REQUEST['id'])) {
	header('location: logout.php');
	exit;
} else {
	// Check the id is valid or not
	$statement = $pdo->prepare("SELECT * FROM tbl_withdraw WHERE withdraw_id=?");
	$statement->execute(array($_REQUEST['id']));
	$total = $statement->rowCount();
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);
	if( $total == 0 ) {
		header('location: logout.php');
		exit;
	}
}
?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Edit Withdraws</h1>
	</div>
	<div class="content-header-right">
		<a href="withdraw.php" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>


<?php							
foreach ($result as $row) {
	
	$withdraw_id = $row['withdraw_id'];
	$request_by = $row['request_by'];
	$amount = $row['amount'];
	$method = $row['method'];
	$send_to = $row['send_to'];
	$account_type = $row['account_type'];
}
?>

<section class="content">

  <div class="row">
    <div class="col-md-12">

		<?php if($error_message): ?>
		<div class="callout callout-danger">
		
		<p>
		<?php echo $error_message; ?>
		</p>
		</div>
		<?php endif; ?>

        <form class="form-horizontal" action="" method="post">

        <div class="box box-info">

            <div class="box-body">
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Requested User Id <span>*</span></label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="request_by" value="<?php echo $request_by; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Amount <span>*</span></label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="amount" value="<?php echo $amount; ?>">
                    </div>
                </div>
				<div class="form-group">
					<label for="" class="col-sm-2 control-label">Select Transaction Method</label>
					<div class="col-sm-4">
						<select name="method" class="form-control select2">
						    <option value="0">Select Method</option>
							<?php
							$statement = $pdo->prepare("SELECT * FROM tbl_withdraw WHERE withdraw_id=?");
							$statement->execute(array($withdraw_id));
							$result = $statement->fetchAll(PDO::FETCH_ASSOC);
							foreach ($result as $row) {
							    if($row['method'] == 'Bkash') {
									$is_select = 'selected';
									?>
									<option value="Bkash" <?php echo $is_select; ?>>Bkash</option>
									<option value="Nogod">Nogod</option>
									<?php
								}
								else {
								    $is_select = 'selected';
									?>
									<option value="Bkash">Bkash</option>
									<option value="Nogod" <?php echo $is_select; ?>>Nogod</option>
									<?php
								}
							}
							?>
						</select>
					</div>
				</div>
				<div class="form-group">
                    <label for="" class="col-sm-2 control-label">Send To <span>*</span></label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="send_to" value="<?php echo $send_to; ?>">
                    </div>
                </div>
				<div class="form-group">
					<label for="" class="col-sm-2 control-label">Select Account Type</label>
					<div class="col-sm-4">
						<select name="account_type" class="form-control select2">
						    <option value="0">Select Type</option>
							<?php
							$statement = $pdo->prepare("SELECT * FROM tbl_withdraw WHERE withdraw_id=?");
							$statement->execute(array($withdraw_id));
							$result = $statement->fetchAll(PDO::FETCH_ASSOC);
							foreach ($result as $row) {
							    if($row['account_type'] == 'Personal') {
									$is_select = 'selected';
									?>
									<option value="Personal" <?php echo $is_select; ?>>Personal</option>
									<option value="Agent">Agent</option>
									<?php
								}
								else {
								    $is_select = 'selected';
									?>
									<option value="Personal">Personal</option>
									<option value="Agent"<?php echo $is_select; ?>>Agent</option>
									<?php
								}
							}
							?>
						</select>
					</div>
				</div>
                <div class="form-group">
                	<label for="" class="col-sm-2 control-label"></label>
                    <div class="col-sm-6">
                      <button type="submit" class="btn btn-success pull-left" name="form1">Update</button>
                    </div>
                </div>

            </div>

        </div>

        </form>



    </div>
  </div>

</section>

<?php require_once('footer.php'); ?>