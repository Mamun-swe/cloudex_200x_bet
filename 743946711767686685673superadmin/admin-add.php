<?php require_once('header.php'); ?>

<?php
if(isset($_POST['form1'])) {
	$valid = 1;

    if(empty($_POST['full_name'])) {
        $valid = 0;
        $error_message .= "Full Name can not be empty<br>";
    }
    
    if(empty($_POST['phone'])) {
        $valid = 0;
        $error_message .= "Phone Number can not be empty<br>";
    }
    
    if(empty($_POST['email'])) {
        $valid = 0;
        $error_message .= "Email can not be empty<br>";
    }

    
    if($valid == 1) {

		// Saving data into the main table tbl_size
      $photo=" ";
      $status="1";
      $password= md5($_POST['password']);
      $statement = $pdo->prepare("INSERT INTO `tbl_user`(
         `full_name`,
         `email`,
         `phone`,
         `password`,
         `photo`,
         `role`, 
         `status`
     ) VALUES (?,?,?,?,?,?,?)");
      $statement->execute(array($_POST['full_name'],$_POST['email'],$_POST['phone'],$password,$photo,$_POST['role'],$status));
      $msg="Admin is added successfully.";
      $url = "admin.php?message=$msg";
      header("Location: ".$url);
  }
}
?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Add New Admin</h1>
	</div>
	<div class="content-header-right">
		<a href="admin.php" class="btn btn-primary btn-sm">View All</a>
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

      <form class="form-horizontal" action="" method="post">

        <div class="box box-info">

            <div class="box-body">
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Full Name <span>*</span></label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="full_name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Email <span>*</span></label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Phone <span>*</span></label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="phone">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Role <span>*</span></label>
                    <div class="col-sm-4">
                        <select name="role" id="" class="form-control">
                            <option value="">Select Admin Role</option>
                            <option value="Admin">Admin</option>
                            <option value="Super admin">Super admin</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Password <span>*</span></label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control" name="password">
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