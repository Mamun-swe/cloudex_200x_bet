<?php require_once('header.php');

    $success = "";
    if(isset($_POST['submit'])){
        $valid = 1;

        if(empty($_POST['condition'])) {
            $valid = 0;
            $error_message .= "Please select term<br>";
        }
        
        if(empty($_POST['user'])) {
            $valid = 0;
            $error_message .= "Please choose an user<br>";
        }
        
        if(empty($_POST['amount'])) {
            $valid = 0;
            $error_message .= "Please enter amount<br>";
        }

        if(empty($_POST['notes'])) {
            $valid = 0;
            $error_message .= "Please enter notes<br>";
        }

        $date = date("Y-m-d  H:i A");

        
        if($valid == 1) {
            $amount = $_POST['amount'];
            
            if($_POST['condition'] == "add_balance"){
                $add = "Admin give";
                $statement = $pdo->prepare('UPDATE tbl_member SET credit = credit + ? WHERE ( user_id = ? )');
                $statement->execute(array($amount, $_POST['user']));

                $transaction = $pdo->prepare("INSERT INTO `tbl_transfer_list`(`user_id`, `description`, `notes`, `cash_in`, `date` ) VALUES (?,?,?,?,?)");
                $transaction->execute(array($_POST['user'], $add, $_POST['notes'], $_POST['amount'], $date ));
                $success = "Balance successfully added";
            }

            if($_POST['condition'] == "return_balance"){
                $remove = "Admin return";
                $statement = $pdo->prepare('UPDATE tbl_member SET credit = credit - ? WHERE ( user_id = ? )');
                $statement->execute(array($amount, $_POST['user']));

                $transaction = $pdo->prepare("INSERT INTO `tbl_transfer_list`(`user_id`, `description`, `notes`, `cash_out`, `date` ) VALUES (?,?,?,?,?)");
                $transaction->execute(array($_POST['user'], $remove, $_POST['notes'], $_POST['amount'], $date ));
                $success = "Balance successfully added";

                $success = "Balance successfully removed";
            }
        }

    }
?>



<section class="content-header">
	<div class="content-header-left">
		<h1>Balance Add & Return</h1>
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

      <?php if($success){ ?>
            <div class="callout callout-success">
              <p>
                  <?php echo $success; ?>
              </p>
          </div>
      <?php } ?>

      <form class="form-horizontal" action="" method="post">

        <div class="box box-info">

            <div class="box-body">
                
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Select condition <span>*</span></label>
                    <div class="col-sm-4">
                        <select name="condition" class="form-control">
                            <option value="">Select term</option>
                            <option value="add_balance">Add Balance</option>
                            <option value="return_balance">Return Balance</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Select User <span>*</span></label>
                    <div class="col-sm-4">
                        <select name="user" class="form-control select2 rounded-0">
                            <option value="">Select user</option>

                            <?php
                                $statement = $pdo->prepare("SELECT * FROM tbl_member");
                                $statement->execute();
                                $result = $statement->fetchAll(PDO::FETCH_ASSOC);							
                                foreach ($result as $row) {
                            ?>
                                <option value="<?php echo $row['user_id']; ?>"><?php echo $row['user_name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Amount <span>*</span></label>
                    <div class="col-sm-4">
                        <input type="number" class="form-control" name="amount">
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Note <span>*</span></label>
                    <div class="col-sm-4">
                        <textarea name="notes" class="form-control" rows="3" placeholder="Wrtite notes"></textarea>
                    </div>
                </div>


                <div class="form-group">
                	<label for="" class="col-sm-2 control-label"></label>
                    <div class="col-sm-6">
                      <button type="submit" class="btn btn-success pull-left" name="submit">Submit</button>
                  </div>
              </div>

              

          </div>

      </div>

  </form>



</div>
</div>

</section>


<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>
<?php require_once('footer.php'); ?>