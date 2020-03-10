<?php require_once('header.php'); ?>
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
	}else {
		foreach ($result as $row) {
			$method = $row['method'];
			$request_by = $row['request_by'];
		}
	}
}
?>
<?php
if(isset($_POST['form1'])) {
	$valid = 1;

    if(empty($_POST['note'])) {
        $valid = 0;
        $error_message .= "You must have to enter rejection note<br>";
    }


    if($valid == 1) {
        
        $statement11 = $pdo->prepare("SELECT * FROM tbl_member WHERE user_id=?");
	    $statement11->execute(array($request_by));
	    $result11 = $statement11->fetchAll(PDO::FETCH_ASSOC);
	    foreach ($result11 as $row11) {
	        $user_id = $row11['user_id'];
	        $user_balance = $row11['credit'];
	    }

		$statement1 = $pdo->prepare("UPDATE tbl_deposit SET status=?, note=? WHERE deposit_id=?");
        $statement1->execute(array(2,$_POST['note'],$_REQUEST['id']));
        
        $detail="Deposit By ".$method;
        $date=date("Y-m-d h:i");
        $type="Deposit";
        $statements = $pdo->prepare("INSERT INTO tbl_transaction (detail_id, type, description,transaction_date,user_balance) VALUES (?,?,?,?,?)");
        $statements->execute(array($_REQUEST['id'],$type,$detail,$date,$user_balance));
        header('location: deposit.php');
		
	}
	
}
?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Edit Deposit Status</h1>
	</div>
	<div class="content-header-right">
		<a href="deposit.php" class="btn btn-primary btn-sm">View Deposits</a>
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
							<label for="" class="col-sm-3 control-label">Note <span>*</span></label>
							<div class="col-sm-4">
								<textarea name="note" class="form-control" cols="30" rows="10" id="editor1"></textarea>

							</div>
						</div>	
						<div class="form-group">
							<label for="" class="col-sm-3 control-label"></label>
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