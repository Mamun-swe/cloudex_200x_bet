<?php require_once('header.php'); ?>

<?php
if(isset($_POST['form1'])) {
	$valid = 1;

    if(empty($_POST['about'])) {
        $valid = 0;
        $error_message .= "You must have to enter about us details<br>";
    }


    if($valid == 1) {

		$statement = $pdo->prepare("UPDATE `tbl_about` SET `about`=? WHERE about_id=?");
		
		$statement->execute(array($_POST['about'],$_REQUEST['id']));
		$msg="About Us is edited successfully.";
	    $url = "about.php?message=$msg";
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
	$statement = $pdo->prepare("SELECT * FROM tbl_about WHERE about_id=?");
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
		<h1>Edit About Us</h1>
	</div>
	<div class="content-header-right">
		<a href="scroll.php" class="btn btn-primary btn-sm">View About Us</a>
	</div>
</section>

<?php
$statement = $pdo->prepare("SELECT * FROM tbl_about WHERE about_id=?");
$statement->execute(array($_REQUEST['id']));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
	$about = $row['about'];
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
							<label for="" class="col-sm-3 control-label">About Us <span>*</span></label>
							<div class="col-sm-4">
								<textarea name="about" class="form-control" cols="30" rows="10" id="editor1"><?php echo $about; ?></textarea>

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