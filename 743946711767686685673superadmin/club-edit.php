<?php require_once('header.php'); ?>

<?php
if(isset($_POST['form1'])) {
	$valid = 1;

    if(empty($_POST['name'])) {
        $valid = 0;
        $error_message .= "You must have to enter club name<br>";
    }

    if(empty($_POST['date'])) {
        $valid = 0;
        $error_message .= "You must have to enter club opening date<br>";
    }

    if(empty($_POST['owner'])) {
        $valid = 0;
        $error_message .= "You must have to enter owner id<br>";
	}
	
	if(empty($_POST['percenteg'])) {
        $valid = 0;
        $error_message .= "You must have to enter club percenteg<br>";
	}


    if($valid == 1) {

		$statement = $pdo->prepare(
			"UPDATE `tbl_club` 
			 SET `club_name`=?,
			 	`club_owner_id`=?,
				`open_date`=?, 
				`club_percenteg`=?
			WHERE club_id=?");
		
		$statement->execute(array(
			$_POST['name'],
			$_POST['owner'],
			$_POST['date'],
			$_POST['percenteg'],
			$_REQUEST['id']
		));
		$msg="CLub is edited successfully.";
	    $url = "club.php?message=$msg";
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
	$statement = $pdo->prepare("SELECT * FROM tbl_club WHERE club_id=?");
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
		<h1>Edit Club Information</h1>
	</div>
	<div class="content-header-right">
		<a href="club.php" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>

<?php
$statement = $pdo->prepare("SELECT * FROM tbl_club WHERE club_id=?");
$statement->execute(array($_REQUEST['id']));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
	$club_name = $row['club_name'];
	$owner_id = $row['club_owner_id'];
	$date = $row['open_date'];
	$club_percenteg = $row['club_percenteg'];
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
							<label for="" class="col-sm-3 control-label">Club Name <span>*</span></label>
							<div class="col-sm-4">
								<input type="text" name="name" class="form-control" value="<?php echo $club_name; ?>">
							</div>
						</div>	
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Club Owner Id <span>*</span></label>
							<div class="col-sm-4">
								<input type="number" name="owner" class="form-control" value="<?php echo $owner_id; ?>">
							</div>
						</div>	
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Club Opening Date <span>*</span></label>
							<div class="col-sm-4">
								<input type="text" name="date" class="form-control" value="<?php echo $date; ?>">
							</div>
						</div>

						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Club Percenteg <span>*</span></label>
							<div class="col-sm-4">
								<input type="text" name="percenteg" class="form-control" value="<?php echo $club_percenteg; ?>">
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