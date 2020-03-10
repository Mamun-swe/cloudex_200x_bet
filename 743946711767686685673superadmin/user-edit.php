<?php require_once('header.php'); ?>

<?php
if(isset($_POST['form1'])) {
	$valid = 1;

    if(empty($_POST['full_name'])) {
        $valid = 0;
        $error_message .= "Full Name can not be empty<br>";
    }
    
    if(empty($_POST['user_name'])) {
        $valid = 0;
        $error_message .= "User Name can not be empty<br>";
    }
    
    if(empty($_POST['credit'])) {
        $valid = 0;
        $error_message .= "Credit can not be empty<br>";
    }
    
    if(empty($_POST['phone'])) {
        $valid = 0;
        $error_message .= "Credit can not be empty<br>";
    }
    
    if(empty($_POST['email'])) {
        $valid = 0;
        $error_message .= "Credit can not be empty<br>";
    }
    
    if(empty($_POST['club'])) {
        $valid = 0;
        $error_message .= "Club can not be empty<br>";
    }
    
    

    if($valid == 1) {

		// Saving data into the main table tbl_size
		$statement = $pdo->prepare("UPDATE `tbl_member` SET `full_name`=?,`user_name`=?,`credit`=?,`email`=?,`phone`=?, `club_id`=? WHERE user_id=?");
		$statement->execute(array($_POST['full_name'],$_POST['user_name'],$_POST['credit'],$_POST['email'],$_POST['phone'],$_POST['club'],$_REQUEST['id']));
		$msg="User is updated successfully.";
	    $url = "user.php?message=$msg";
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
	$statement = $pdo->prepare("SELECT * FROM tbl_member WHERE user_id=?");
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
		<h1>Edit User</h1>
	</div>
	<div class="content-header-right">
		<a href="user.php" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>


<?php							
foreach ($result as $row) {
	$full_name = $row['full_name'];
	$user_name = $row['user_name'];
	$credit = $row['credit'];
	$email = $row['email'];
	$phone = $row['phone'];
	$club_id = $row['club_id'];
	$sponsor_id = $row['sponsor_id'];
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
                    <label for="" class="col-sm-2 control-label">Full Name <span>*</span></label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="full_name" value="<?php echo $full_name; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">User Name <span>*</span></label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="user_name" value="<?php echo $user_name; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Credit <span>*</span></label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="credit" value="<?php echo $credit; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Email <span>*</span></label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Phone <span>*</span></label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="phone" value="<?php echo $phone; ?>">
                    </div>
                </div>
                <div class="form-group">
					<label for="" class="col-sm-2 control-label">Select Club</label>
					<div class="col-sm-4">
						<select name="club" class="form-control select2">
						    <option value="0">Select Club</option>
							<?php
							$statement = $pdo->prepare("SELECT * FROM tbl_club ORDER BY club_id ASC");
							$statement->execute();
							$result = $statement->fetchAll(PDO::FETCH_ASSOC);
							foreach ($result as $row) {
							    if($row['club_id'] == $club_id) {
									$is_select = 'selected';
								}
								else {
									$is_select = '';
								}

							?>
								<option value="<?php echo $row['club_id']; ?>" <?php echo $is_select; ?>><?php echo $row['club_name']; ?></option>
								<?php
							}
							?>
						</select>
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