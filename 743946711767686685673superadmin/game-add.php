<?php require_once('header.php'); ?>

<?php
if(isset($_POST['form1'])) {
	$valid = 1;

	if(empty($_POST['game_name'])) {
        $valid = 0;
        $error_message .= "Please Enter Game Name<br>";
    }

    if(empty($_POST['type'])) {
        $valid = 0;
        $error_message .= "Please Select Game Type<br>";
    }

    if(empty($_POST['desh1'])) {
        $valid = 0;
        $error_message .= "You must enter Country 1 name<br>";
	}

    if(empty($_POST['desh2'])) {
        $valid = 0;
        $error_message .= "You must enter Country 2 name<br>";
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
	
	if(empty($_POST['status'])) {
        $valid = 0;
        $error_message .= "Please Select Game Status<br>";
    }
    
    if($valid == 1) {

		//Saving data into the main table tbl_product
		$update="--";
		$statement = $pdo->prepare("INSERT INTO `tbl_game`(
										`game_name`,
									    `type`, 
									    `desh1`, 
									    `desh2`, 
										`tournament`, 
										`date`, 
										`time`, 
										`game_update`,
									    `game_status`
									) VALUES (?,?,?,?,?,?,?,?,?)");

		$statement->execute(array(
										$_POST['game_name'],
										$_POST['type'],
										$_POST['desh1'],
										$_POST['desh2'],
										$_POST['tournament'],
										$_POST['day'],
										$_POST['time'],
										$update,
										$_POST['status']
									));

	
	
    	$msg="Game is added successfully.";
	    $url = "game.php?message=$msg";
        header("Location: ".$url);
    }
}
?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Add Game</h1>
	</div>
	<div class="content-header-right">
		<a href="game.php" class="btn btn-primary btn-sm">View All</a>
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
							<label for="" class="col-sm-3 control-label">Game name <span>*</span></label>
							<div class="col-sm-4">
								<input type="text" name="game_name" class="form-control">
							</div>
						</div>
						<div class="form-group">
        					<label for="" class="col-sm-3 control-label">Select Game Type</label>
        					<div class="col-sm-4">
        						<select name="type" class="form-control select2">
        						    <option value="">Select Type</option>
										<option value="Cricket">Cricket</option>
										<option value="Football">Football</option>
										<option value="Hockey">Hockey</option>
										<option value="Basketball">Basketball</option>
										<option value="Badminton">Badminton</option>
										<option value="Tennis">Tennis</option>
										<option value="Virtual Game">Virtual Game</option>
										<option value="Handball">Handball</option>
        						</select>
        					</div>
        				</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">country 1 <span>*</span></label>
							<div class="col-sm-4">
								<input type="text" name="desh1" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">country 2 <span>*</span></label>
							<div class="col-sm-4">
								<input type="text" name="desh2" class="form-control">
							</div>
						</div>	
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Tournament Name<span>*</span></label>
							<div class="col-sm-4">
								<input type="text" name="tournament" class="form-control">
							</div>
						</div>	
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Game Day<span>*</span></label>
							<div class="col-sm-4">
								<input type="text" name="day" class="form-control">
							</div>
						</div>	
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Game Time<span>*</span></label>
							<div class="col-sm-4">
								<input type="text" name="time" class="form-control">
							</div>
						</div>	
						<div class="form-group">
        					<label for="" class="col-sm-3 control-label">Select Game Status</label>
        					<div class="col-sm-4">
        						<select name="status" class="form-control select2">
        						    <option value="">Select Status</option>
										<option value="1">LIVE</option>
										<option value="2">UPCOMING</option>
        						</select>
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