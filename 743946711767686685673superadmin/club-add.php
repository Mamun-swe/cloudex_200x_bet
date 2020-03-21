<?php require_once('header.php'); ?>

<?php
if(isset($_POST['form1'])) {
	$valid = 1;

    if(empty($_POST['name'])) {
        $valid = 0;
        $error_message .= "You must have to enter club name<br>";
    }

    if(empty($_POST['owner'])) {
        $valid = 0;
        $error_message .= "You must enter owner id<br>";
	}
    
    if($valid == 1) {
		$balance=0;
		$percenteg='3';
		$date=date("d/m/Y");
		$rank = rand(10,1000);
		//Saving data into the main table tbl_product
	
		$statement = $pdo->prepare("INSERT INTO `tbl_club`(
									    `club_name`, 
									    `club_owner_id`, 
									    `open_date`, 
									    `club_status`,
									    `balance`,
										`club_percenteg`,
										`club_rank`
									) VALUES (?,?,?,?,?,?,?)");

		$statement->execute(array(
			$_POST['name'],
			$_POST['owner'],
			$date,
			$valid,
			$balance,
			$percenteg,
			$rank
		));

	
	
    	$msg="Club is added successfully.";
	    $url = "club.php?message=$msg";
        header("Location: ".$url);
    }
}
?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Add Club</h1>
	</div>
	<div class="content-header-right">
		<a href="club.php" class="btn btn-primary btn-sm">View All</a>
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
							<label for="" class="col-sm-3 control-label">Club Name <span>*</span></label>
							<div class="col-sm-4">
								<input type="text" name="name" class="form-control">
							</div>
						</div>	
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Club Owner Id<span>*</span></label>
							<div class="col-sm-4">
								<input type="number" name="owner" class="form-control">
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