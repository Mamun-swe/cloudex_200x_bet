<?php require_once('header.php'); ?>

<?php
if(isset($_POST['form1'])) {
	$valid = 1;

    if(empty($_POST['deposit_to'])) {
        $valid = 0;
        $error_message .= "Deposit To can not be empty<br>";
    }
    
    if(empty($_POST['deposit_by'])) {
        $valid = 0;
        $error_message .= "Deposit By can not be empty<br>";
    }
    
    
    if(empty($_POST['amount'])) {
        $valid = 0;
        $error_message .= "Amount can not be empty<br>";
	}
	
	if(empty($_POST['method'])) {
        $valid = 0;
        $error_message .= "Method can not be empty<br>";
	}
	
	if(empty($_POST['tran'])) {
        $valid = 0;
        $error_message .= "Transaction Number can not be empty<br>";
    }
    
    

    if($valid == 1) {

		// Saving data into the main table tbl_size
		$a="0";
		$statement = $pdo->prepare("UPDATE `tbl_deposit` SET `deposit_to`=?,`deposit_by`=?,`method`=?,`amount`=?,`transection_number`=?, `status`=? WHERE deposit_id=?");
		$statement->execute(array($_POST['deposit_to'],$_POST['deposit_by'],$_POST['method'],$_POST['amount'],$_POST['tran'],$a,$_REQUEST['id']));
		$msg="Deposit is updated successfully.";
	    $url = "deposit.php?message=$msg";
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
	$statement = $pdo->prepare("SELECT * FROM tbl_deposit WHERE deposit_id=?");
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
		<h1>Edit Deposits</h1>
	</div>
	<div class="content-header-right">
		<a href="deposit.php" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>


<?php							
foreach ($result as $row) {
	$deposit_id = $row['deposit_id'];
	$deposit_to = $row['deposit_to'];
	$deposit_by = $row['deposit_by'];
	$amount = $row['amount'];
	$email = $row['method'];
	$transaction_number = $row['transection_number'];
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
                    <label for="" class="col-sm-2 control-label">Deposit To <span>*</span></label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="deposit_to" value="<?php echo $deposit_to; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Deposit By <span>*</span></label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="deposit_by" value="<?php echo $deposit_by; ?>">
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
							$statement = $pdo->prepare("SELECT * FROM tbl_deposit WHERE deposit_id=?");
							$statement->execute(array($deposit_id));
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
                    <label for="" class="col-sm-2 control-label">Transaction Number <span>*</span></label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="tran" value="<?php echo $transaction_number; ?>">
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