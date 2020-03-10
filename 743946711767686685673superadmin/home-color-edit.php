<?php require_once('header.php'); ?>

<?php
if(!isset($_REQUEST['id'])) {
	header('location: logout.php');
	exit;
} else {
	// Check the id is valid or not
	$statement = $pdo->prepare("SELECT * FROM tbl_home_color WHERE function_id=?");
	$statement->execute(array($_REQUEST['id']));
	$total = $statement->rowCount();
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);
	if( $total == 0 ) {
		header('location: logout.php');
		exit;
	}
	else{
						
        foreach ($result as $row) {
            $function=$row['function_name'];
            $color=$row['color_code'];
        }
	}
}
?>

<?php
if(isset($_POST['form1'])) {
	$valid = 1;
	
	if(empty($_POST['color'])) {
        $valid = 0;
        $error_message .= "You must have to enter color code<br>";
    }
    


    if($valid == 1) {

		$statement = $pdo->prepare("UPDATE `tbl_home_color` SET `color_code`=? WHERE function_id=?");
		
		$statement->execute(array($_POST['color'],$_REQUEST['id']));
		$msg="Color is edited successfully.";
	    $url = "home-color.php?message=$msg";
        header("Location: ".$url);
		
	}
	
}
?>


<section class="content-header">
	<div class="content-header-left">
		<h1>Edit Color of <?php echo $function; ?></h1>
	</div>
	<div class="content-header-right">
		<a href="home-color.php" class="btn btn-primary btn-sm">View All</a>
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
							<label for="" class="col-sm-3 control-label">Enter HTML Color Code <span>*</span></label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="color" value="<?php echo $color; ?>">

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