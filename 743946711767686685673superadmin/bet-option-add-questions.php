<?php 
require_once('header.php');
?>
<?php
if(isset($_POST['form1'])) {


// 	$c=$_REQUEST['count'];
	$question = $_POST['question'];
    $bet = $_POST['bet'];
	$stake=$_SESSION['question'];
    
	foreach( array_combine($question, $bet) as $f => $n ){

		$price='0.00';
		
		$statement = $pdo->prepare("INSERT INTO `tbl_stake`(
					    `game_id`, 
					    `stake_name`,
					    `bet_name`,
					    `rate`,
					    `sell_price`,
					    `stake_status`
					) VALUES (?,?,?,?,?,?)");

		$statement->execute(array(
								$_SESSION['id'],
								$stake,
								$f,
								$n,
								$price,
								1
							));
		$url = "bet-option-add-new.php";
		header("Location: ".$url);

	}
}

if(isset($_POST['form2'])) {

// 	$c=$_REQUEST['count'];
	$question = $_POST['question'];
    $bet = $_POST['bet'];
	$stake=$_SESSION['question'];
	foreach( array_combine($question, $bet) as $f => $n ){

		$price='0.00';
		
		$statement = $pdo->prepare("INSERT INTO `tbl_stake`(
					    `game_id`, 
					    `stake_name`,
					    `bet_name`,
					    `rate`,
					    `sell_price`,
					    `stake_status`
					) VALUES (?,?,?,?,?,?)");

		$statement->execute(array(
								$_SESSION['id'],
								$stake,
								$f,
								$n,
								$price,
								1
							));
		$msg="All bets are added successfully.";
		$id=$_SESSION['id'];
		$url = "bet-option.php?id=$id&message=$msg";
		header("Location: ".$url);
	}

}
?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Add Bet Answers</h1>
	</div>
</section>


<section class="content">

	<div class="row">
		<div class="col-md-12">

			<form class="form-horizontal" action="" method="post">

				<div class="box box-info">
					<div class="box-body">
						<?php
						$c=$_REQUEST['count'];
						for($i=0; $i<$c; $i++){
						?>
						
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Enter Answer<span>*</span></label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="question[]">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Enter Bet<span>*</span></label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="bet[]">
							</div>
						</div>
						<?php
						}
						?>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
								<?php 
								if($_SESSION['number'] < $_SESSION['count'])
								{
									?>
								<button type="submit" class="btn btn-success pull-left" name="form1">Next</button>
								<?php
								}
								else if($_SESSION['number'] == $_SESSION['count'])
								{
								?>
									<button type="submit" class="btn btn-success pull-left" name="form2">Submit</button>
								<?php
								}
								?>
							</div>
						</div>
					</div>
				</div>

			</form>


		</div>
	</div>

</section>

<?php require_once('footer.php'); ?>