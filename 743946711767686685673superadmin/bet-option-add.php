<?php 
require_once('header.php');
?>
<?php
if(isset($_POST['form1'])) {
	$valid = 1;

    if(empty($_POST['question_number'])) {
        $valid = 0;
        $error_message .= "You must select number of questions<br>";
    }

    if($valid == 1) {
        
        $_SESSION['number']=0;
        $_SESSION['count']=$_POST['question_number'];
        $_SESSION['id']=$_REQUEST['id'];
        $url = "bet-option-add-new.php";
        header("Location: ".$url);

    }
}
?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Bet Option For: <?php echo $_REQUEST['name']; ?></h1>
	</div>
	<div class="content-header-right">
		<a href="bet-option.php?id=<?php echo $_REQUEST['id']; ?>" class="btn btn-primary btn-sm">Back To Betting Option List</a>
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
			<form class="form-horizontal" action="" method="post">

				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Select Number of Questions</label>
							<div class="col-sm-4">
								<select name="question_number" class="form-control select2">
								    <option value="0">Select</option>
								    <option value="1">1</option>
								    <option value="2">2</option>
								    <option value="3">3</option>
								    <option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
								</select>
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