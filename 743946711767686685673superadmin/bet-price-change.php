<?php require_once('header.php'); ?>
<?php
if(!isset($_REQUEST['id'])) {
	header('location: logout.php');
	exit;
} else {
	// Check the id is valid or not
	$statement = $pdo->prepare("SELECT * FROM tbl_stake WHERE stake_id=?");
	$statement->execute(array($_REQUEST['id']));
	$total = $statement->rowCount();
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);
	if( $total == 0 ) {
		header('location: logout.php');
		exit;
	}
}
?>
<?php
if(isset($_POST['form1'])) {
	$valid = 1;

    if(empty($_POST['price'])) {
        $valid = 0;
        $error_message .= "You must have to enter selling price for bet<br>";
    }


    if($valid == 1) {

		$statement1 = $pdo->prepare("UPDATE tbl_stake SET sell_price=? WHERE stake_id=?");
        $statement1->execute(array($_POST['price'],$_REQUEST['id']));
        
        $statement2 = $pdo->prepare("UPDATE tbl_bet SET sell_price=? WHERE stake_id=?");
        $statement2->execute(array($_POST['price'],$_REQUEST['id']));
        
        $page=$_REQUEST['page'];
		$url = "bet-option.php?id=$page";
        header("Location: ".$url);
	}
	
}
?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Change Selling Price</h1>
	</div>
	<div class="content-header-right">
		<a href="bet-option.php?id=<?php echo $_REQUEST['id']; ?>" class="btn btn-primary btn-sm">View All Bets</a>
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
							<label for="" class="col-sm-3 control-label">Selling Price <span>*</span></label>
							<div class="col-sm-4">
                                <input type="text" class="form-control" name="price">

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