<?php require_once('header.php'); ?>
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
	}else {
		foreach ($result as $row) {
			$userid = $row['request_by'];
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

		//get user balance
		$stat = $pdo->prepare("SELECT * FROM tbl_member WHERE user_id=?");
        $stat->execute(array($userid));
        $res = $stat->fetchAll(PDO::FETCH_ASSOC);
        foreach ($res as $ro) {
			$balance = $ro['credit'];
		}
		
		//get withdraw amount
		$state = $pdo->prepare("SELECT * FROM tbl_withdraw WHERE withdraw_id=?");
        $state->execute(array($_REQUEST['id']));
        $results = $state->fetchAll(PDO::FETCH_ASSOC);
        foreach ($results as $row) {
        	$credit = $row['amount'];
        }
        $final_amount = $balance+$credit;
        $statement = $pdo->prepare("UPDATE tbl_member SET credit=? WHERE user_id=?");
        $statement->execute(array($final_amount,$userid));
		
		
		
		$statement1 = $pdo->prepare("UPDATE tbl_withdraw SET withdraw_status=?, withdraw_note=? WHERE withdraw_id=?");
        $statement1->execute(array(2,$_POST['note'],$_REQUEST['id']));
        
        $detail="Withdraw By ".$method;
        $date=date("Y-m-d h:i");
        $type="Withdraw";
        $statements = $pdo->prepare("INSERT INTO tbl_transaction (detail_id, type, description,transaction_date,user_balance) VALUES (?,?,?,?,?)");
        $statements->execute(array($_REQUEST['id'],$type,$detail,$date,$final_amount));
        header('location: withdraw.php');
		
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