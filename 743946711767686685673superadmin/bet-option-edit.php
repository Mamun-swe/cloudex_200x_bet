<?php require_once('header.php'); ?>

<?php
if(isset($_POST['form1'])) {
	$valid = 1;

    if(empty($_POST['question'])) {
        $valid = 0;
        $error_message .= "Deposit To can not be empty<br>";
    }
    
    if(empty($_POST['answer'])) {
        $valid = 0;
        $error_message .= "Deposit By can not be empty<br>";
    }
    
    
    if(empty($_POST['rate'])) {
        $valid = 0;
        $error_message .= "Amount can not be empty<br>";
	}
       

    if($valid == 1) {

		// Saving data into the main table tbl_size
		$a="0";
		$statement = $pdo->prepare("UPDATE `tbl_stake` SET `stake_name`=?,`bet_name`=?,`rate`=? WHERE stake_id=?");
		$statement->execute(array($_POST['question'],$_POST['answer'],$_POST['rate'],$_REQUEST['id']));
		$msg="Bet Option is updated successfully.";
        $page=$_REQUEST['page'];
		$url = "bet-option.php?id=$page&message=$msg";
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

<section class="content-header">
	<div class="content-header-left">
		<h1>Edit Bet Option</h1>
	</div>
	<!-- <div class="content-header-right">
		<a href="deposit.php" class="btn btn-primary btn-sm">View All</a>
	</div> -->
</section>


<?php							
foreach ($result as $row) {
	$stake_name = $row['stake_name'];
	$bet_name = $row['bet_name'];
	$rate = $row['rate'];
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

        <form class="form-horizontal" action="" method="post">

        <div class="box box-info">

            <div class="box-body">
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Question <span>*</span></label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="question" value="<?php echo $stake_name; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Answer <span>*</span></label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="answer" value="<?php echo $bet_name; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Bet Rate <span>*</span></label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="rate" value="<?php echo $rate; ?>">
                    </div>
                </div>
                <div class="form-group">
                	<label for="" class="col-sm-2 control-label"></label>
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