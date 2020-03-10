<?php require_once('header.php'); ?>

<?php
if(isset($_POST['form1'])) {
	$valid = 1;

    if(empty($_POST['request_by'])) {
        $valid = 0;
        $error_message .= "Requested User Id can not be empty<br>";
    }
    
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
		date_default_timezone_set('Asia/Dhaka');
		$date=date("Y-m-d h:i");
		$a="0";
		$statement = $pdo->prepare("INSERT INTO tbl_deposit (request_by,deposit_to, deposit_by, method, amount, transection_number, date, status) VALUES (?,?,?,?,?,?,?,?)");
		$statement->execute(array($_POST['request_by'],$_POST['deposit_to'],$_POST['deposit_by'],$_POST['method'],$_POST['amount'],$_POST['tran'],$date,$a));
		$msg="Deposit is added successfully.";
	    $url = "deposit.php?message=$msg";
        header("Location: ".$url);

    }
}
?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Add Deposit</h1>
	</div>
	<div class="content-header-right">
		<a href="deposit.php" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>


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

			<?php if($success_message): ?>
			<div class="callout callout-success">
			
			<p><?php echo $success_message; ?></p>
			</div>
			<?php endif; ?>

			<form class="form-horizontal" action="" method="post">

				<div class="box box-info">
					<div class="box-body">
					    <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Requested User Id <span>*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="request_by">
                            </div>
                        </div>
						<div class="form-group">
                            <label for="" class="col-sm-2 control-label">Deposit To <span>*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="deposit_to">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Deposit By <span>*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="deposit_by">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Amount <span>*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="amount">
                            </div>
						</div>
						<div class="form-group">
        					<label for="" class="col-sm-2 control-label">Select Payment Method</label>
        					<div class="col-sm-4">
        						<select name="method" class="form-control select2">
        						    <option value="">Select Method</option>
										<option value="Bkash">Bkash</option>
										<option value="Nogod">Nogod</option>
        						</select>
        					</div>
        				</div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Transection Number <span>*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="tran">
                            </div>
                        </div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="form1">Submit</button>
							</div>
						</div>
					</div>
				</div>

			</form>


		</div>
	</div>

</section>

<?php require_once('footer.php'); ?>