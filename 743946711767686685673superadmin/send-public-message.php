<?php require_once('header.php'); ?>

<?php
if(isset($_POST['form1'])) {
	$valid = 1;

    if(empty($_POST['message'])) {
        $valid = 0;
        $error_message .= "Please Insert message<br>";
    }
    

    if($valid == 1) {

		// Saving data into the main table tbl_size
		date_default_timezone_set('Asia/Dhaka');
		$date=date("Y-m-d");
		$time=date("h:i:sa");
		$sent_to="All";
		$type="Public";
		$statement = $pdo->prepare("INSERT INTO tbl_message_sent (message_sent_date, sent_time, message, message_sent_to, type) VALUES (?,?,?,?,?)");
		$statement->execute(array($date,$time,$_POST['message'],$sent_to,$type));
		$msg="Message is sent successfully.";
	    $url = "public-messages-sent.php?message=$msg";
        header("Location: ".$url);

    }
}
?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Send Public Message</h1>
	</div>
	<div class="content-header-right">
		<a href="public-messages-sent.php" class="btn btn-primary btn-sm">View All</a>
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
                            <label for="" class="col-sm-2 control-label">Message <span>*</span></label>
                            <div class="col-sm-8">
								<textarea name="message" class="form-control" cols="30" rows="10" id="editor1"></textarea>
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