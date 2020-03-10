<?php require_once('header.php'); ?>

<?php
if(isset($_POST['form1'])) {
	$valid = 1;

    
    if(empty($_POST['terms'])) {
        $valid = 0;
        $error_message .= "You must select an instructor<br>";
    }
    

    if($valid == 1) {

		// Saving data into the main table tbl_size
		$statement = $pdo->prepare("INSERT INTO tbl_terms (terms) VALUES (?)");
		$statement->execute(array($_POST['terms']));
		$msg="Term is added successfully.";
	    $url = "terms.php?message=$msg";
        header("Location: ".$url);

    }
}
?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Add Terms & Conditions</h1>
	</div>
	<div class="content-header-right">
		<a href="terms.php" class="btn btn-primary btn-sm">View All</a>
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

			<?php if($success_message): ?>
			<div class="callout callout-success">
			
			<p><?php echo $success_message; ?></p>
			</div>
			<?php endif; ?>

			<form class="form-horizontal" action="" method="post">

				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
                            <label for="" class="col-sm-2 control-label">Add Term <span>*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="terms">
                            </div>
                        </div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
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