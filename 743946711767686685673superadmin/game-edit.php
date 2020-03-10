<?php require_once('header.php'); ?>

<?php
if(isset($_POST['form1'])) {
	$valid = 1;

    if(empty($_POST['game'])) {
        $valid = 0;
        $error_message .= "You must enter game name<br>";
	}

	if(empty($_POST['tournament'])) {
        $valid = 0;
        $error_message .= "You must enter tournament name<br>";
	}
	
	if(empty($_POST['day'])) {
        $valid = 0;
        $error_message .= "You must enter game day<br>";
	}
	
	if(empty($_POST['time'])) {
        $valid = 0;
        $error_message .= "You must enter game time<br>";
	}


    if($valid == 1) {

		$statement = $pdo->prepare("UPDATE `tbl_game` SET `game_name`=?,`tournament`=?,`date`=?,`time`=? WHERE game_id=?");
		
		$statement->execute(array($_POST['game'],$_POST['tournament'],$_POST['day'],$_POST['time'],$_REQUEST['id']));
		$msg="Game is edited successfully.";
	    $url = "game.php?message=$msg";
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
	$statement = $pdo->prepare("SELECT * FROM tbl_game WHERE game_id=?");
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
		<h1>Edit Game Information</h1>
	</div>
	<div class="content-header-right">
		<a href="game.php" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>

<?php
$statement = $pdo->prepare("SELECT * FROM tbl_game WHERE game_id=?");
$statement->execute(array($_REQUEST['id']));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
	$game_name = $row['game_name'];
	$tournament = $row['tournament'];
	$date = $row['date'];
	$time = $row['time'];
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
							<label for="" class="col-sm-3 control-label">Game Name <span>*</span></label>
							<div class="col-sm-4">
								<input type="text" name="game" class="form-control" value="<?php echo $game_name; ?>">
							</div>
						</div>	
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Tournament Name <span>*</span></label>
							<div class="col-sm-4">
								<input type="text" name="tournament" class="form-control" value="<?php echo $tournament; ?>">
							</div>
						</div>	
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Game Day <span>*</span></label>
							<div class="col-sm-4">
								<input type="text" name="day" class="form-control" value="<?php echo $date; ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Game Time <span>*</span></label>
							<div class="col-sm-4">
								<input type="text" name="time" class="form-control" value="<?php echo $time; ?>">
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