<?php 
session_start();
require_once('header.php');
?>
<?php
if(isset($_POST['form1'])) {
	$valid = 1;

	if(empty($_POST['question'])) {
        $valid = 0;
        $error_message .= "You must enter question<br>";
	}
	
	if(empty($_POST['answer_number'])) {
        $valid = 0;
        $error_message .= "You must select number of answers<br>";
    }

    if($valid == 1) {
		$_SESSION['number']=$_SESSION['number']+1;
		$number=$_POST['answer_number'];
		$id=$_POST['question'];
		$_SESSION['question']=$_POST['question'];
		$url = "bet-option-add-questions.php?count=$number";
        header("Location: ".$url);

	}
}
?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Add Bet Option: </h1>
	</div>
	<div class="content-header-right">
		<a href="bet-option.php?id=<?php echo $_SESSION['id']; ?>" class="btn btn-primary btn-sm">Back To Bettting Option List</a>
	</div>
</section>


<section class="content">

	<div class="row">
		<div class="col-md-12">

			<form class="form-horizontal" action="" method="post">

				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Enter Question <?php echo $_SESSION['number']+1; ?><span>*</span></label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="question">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Select Number of Answers</label>
							<div class="col-sm-4">
								<select name="answer_number" class="form-control select2">
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
								<button type="submit" class="btn btn-success pull-left" name="form1">Next</button>
							</div>
						</div>
					</div>
				</div>

			</form>


		</div>
	</div>

</section>

<?php require_once('footer.php'); ?>