<?php require_once('header.php'); ?>

<?php
if(isset($_POST['form1'])) {
	$valid = 1;

	if(empty($_POST['description'])) {
		$valid = 0;
		$error_message .= "Please Provide a Description of Game <br>";
	}

	if(empty($_POST['link'])) {
		$valid = 0;
		$error_message .= "You must be provide a youtube link<br>";
	}

	if($valid == 1) {

		//Saving data into the main table tbl_product
		$status="1";
		
		$statement = $pdo->prepare("INSERT INTO `tbl_video`(
                 `description`,
                 `link`,
                 `status`
             ) VALUES (?,?,?)");
        $statement->execute(array($_POST['description'],$_POST['link'],$status));
		$msg="Video added successfully.";
		$url = "video.php?message=$msg";
		header("Location: ".$url);
	}
}
?>


      
      
      

<section class="content-header">
	<div class="content-header-left">
		<h1>Add Video</h1>
	</div>
</section>


<section class="content">

	<div class="row">
		<div class="col-md-12">
			<?php if(isset($_REQUEST['message'])) { ?>
				<div class="callout callout-success">
					<p><?php echo $_REQUEST['message']; ?></p>
				</div>
			<?php } ?>
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
							<label for="" class="col-sm-3 control-label">Description<span>*</span></label>
							<div class="col-sm-4">
								<input type="text" name="description" class="form-control">
							<label for="" class="">Max 500 Letter <span>*</span></label>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Youtubr Link <span>*</span></label>
							<div class="col-sm-4">
								<input type="text" name="link" class="form-control">
							<label for="" class="">Max 1000 Letter <span>*</span></label>
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