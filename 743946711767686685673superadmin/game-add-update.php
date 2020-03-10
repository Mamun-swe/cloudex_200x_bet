<?php require_once('header.php'); ?>

<?php
if(!isset($_REQUEST['id'])) {
	header('location: logout.php');
	exit;
} else {
	// Check the id is valid or not
	$statement = $pdo->prepare("SELECT * FROM tbl_game WHERE game_id=?");
	$statement->execute(array($_REQUEST['id']));
	$total = $statement->rowCount();
	if( $total == 0 ) {
		header('location: logout.php');
		exit;
	} else {
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
		foreach ($result as $row) {
			$status = $row['game_status'];
		}
	}
}
?>
<?php
if(isset($_POST['form1'])) {
	$valid = 1;

    if(empty($_POST['update'])) {
        $valid = 0;
        $error_message .= "You must have to enter game update<br>";
    }


    if($valid == 1) {

		$statement1 = $pdo->prepare("UPDATE tbl_game SET game_update=? WHERE game_id=?");
        $statement1->execute(array($_POST['update'],$_REQUEST['id']));
        header('location: game.php');
		
	}
	
}
?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Add Game Update</h1>
	</div>
	<div class="content-header-right">
		<a href="game.php" class="btn btn-primary btn-sm">View Games</a>
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
							<label for="" class="col-sm-3 control-label">Game Update <span>*</span></label>
							<div class="col-sm-4">
								<input type="text" name="update" class="form-control">

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