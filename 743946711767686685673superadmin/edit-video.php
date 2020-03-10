<?php require_once('header.php'); ?>

<?php
$state = $pdo->prepare("SELECT *
 FROM tbl_video WHERE id=? ORDER BY id DESC");
$state->execute(array($_REQUEST['id']));
$results = $state->fetchAll(PDO::FETCH_ASSOC);
foreach ($results as $result) {
  $description=$result['description'];
  $link=$result['link'];
}
if(isset($_POST['form1'])) {
	$valid = 1;

	if(empty($_POST['description'])) {
		$valid = 0;
		$error_message .= "Please Provide a Description Game Type<br>";
	}

	if(empty($_POST['link'])) {
		$valid = 0;
		$error_message .= "You must be provide a youtube link<br>";
	}

	if($valid == 1) {

		//Saving data into the main table tbl_product
		$status="1";
		
		$statement = $pdo->prepare("UPDATE `tbl_video` SET `description`=?,`link`=?,`status`=?");
		$statement->execute(array($_POST['description'],$_POST['link'],$status));
		$msg="Video updated successfully.";
		$url = "video.php?message=$msg";
		header("Location: ".$url);
	}
}
?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Update Video</h1>
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
								<input type="text" name="description" value="<?php echo $description ; ?>" class="form-control">
							<label for="" class="">Max 500 Letter <span>*</span></label>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Youtubr Link <span>*</span></label>
							<div class="col-sm-4">
								<input type="text" name="link" class="form-control" value="<?php echo $link ; ?>">
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