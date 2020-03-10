<?php require_once('header.php'); ?>

<?php
if(isset($_POST['form1'])) {
	$valid = 1;

    if(empty($_POST['method'])) {
        $valid = 0;
        $error_message .= "You must have to enter payment methid name<br>";
    }

    if(empty($_POST['number'])) {
        $valid = 0;
        $error_message .= "You must enter payment number<br>";
    }
    
    if($valid == 1) {

		//Saving data into the main table tbl_product
		$statement = $pdo->prepare("INSERT INTO `tbl_payment`(
									    `method`, 
									    `number`
									) VALUES (?,?)");

		$statement->execute(array(
										$_POST['method'],
										$_POST['number']
									));

	
	
    	$msg="Payment is added successfully.";
	    $url = "payment.php?message=$msg";
        header("Location: ".$url);
    }
}
?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Add Payment</h1>
	</div>
	<div class="content-header-right">
		<a href="payment.php" class="btn btn-primary btn-sm">View All</a>
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

			<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">

				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Method Name <span>*</span></label>
							<div class="col-sm-4">
								<input type="text" name="method" class="form-control">
							</div>
						</div>	
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Payment Number<span>*</span></label>
							<div class="col-sm-4">
								<input type="text" name="number" class="form-control">
							</div>
						</div>	
						<div class="form-group">
							<label for="" class="col-sm-3 control-label"></label>
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