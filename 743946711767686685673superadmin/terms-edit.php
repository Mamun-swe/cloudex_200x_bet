<?php require_once('header.php'); ?>

<?php
if(isset($_POST['form1'])) {
	$valid = 1;

    if(empty($_POST['terms'])) {
        $valid = 0;
        $error_message .= "You must have to enter term<br>";
    }


    if($valid == 1) {

		$statement = $pdo->prepare("UPDATE `tbl_terms` SET `terms`=? WHERE terms_id=?");
		
		$statement->execute(array($_POST['terms'],$_REQUEST['id']));
		$msg="Term is edited successfully.";
	    $url = "terms.php?message=$msg";
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
	$statement = $pdo->prepare("SELECT * FROM tbl_terms WHERE terms_id=?");
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
		<h1>Edit Terms & Conditions</h1>
	</div>
	<div class="content-header-right">
		<a href="terms.php" class="btn btn-primary btn-sm">View Terms & Conditions</a>
	</div>
</section>

<?php
$statement = $pdo->prepare("SELECT * FROM tbl_terms WHERE terms_id=?");
$statement->execute(array($_REQUEST['id']));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
	$terms = $row['terms'];
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

			<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">

				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Scroll Message <span>*</span></label>
							<div class="col-sm-4">
								<textarea name="terms" class="form-control" cols="30" rows="10" id="editor1"><?php echo $terms; ?></textarea>

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