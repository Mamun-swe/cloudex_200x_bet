<?php require_once('header.php'); ?>

<?php
    $minimum_error_message = $maximum_error_message = $msg = "";
    if(isset($_POST['submit'])){
        $minimum = $_POST['minimum_amount'];
        $maximum = $_POST['maximum_amount'];
    }
    if(isset($_POST['submit'])) {
        $valid = 1;
        if(empty($_POST['minimum_amount'])) {
            $valid = 0;
            $minimum_error_message = "<br>Minimun amount is required.";
        }
            
        if(empty($_POST['maximum_amount'])) {
            $valid = 0;
            $maximum_error_message = "<br>Maximum amount is required.";
        }
        
        if($valid == 1) {
            $statement = $pdo->prepare("INSERT INTO `tbl_deposite_limit`(
                `minimum_amount`,
                `maximum_amount`
            ) VALUES (?,?)");
            $statement->execute(array($_POST['minimum_amount'],$_POST['maximum_amount']));
            $msg="Limit is added successfully.";
        }
    }
    ?>

    <div class="diposite-limit">
        <div class="card border-0">
            <div class="card-body">
                <div class="text-center">
                    <h3>Diposite Limit</h3>
                    <h5 class="text-success"><?php if($msg){ echo $msg; } ?></h5>
                </div>
                <form action="" method="post">
                    <div class="form-group">
                        <small class="text-muted">Minimum amount</small>
                        <small class="text-danger"><?php if($minimum_error_message){ echo $minimum_error_message; } ?></small>
                        <input type="number" class="form-control rounded-0 shadow-none" name="minimum_amount" placeholder="Enter Minimum amount" required>
                    </div>

                    <div class="form-group">
                        <small class="text-muted">Minimum amount</small>
                        <small class="text-danger"><?php if($maximum_error_message){ echo $maximum_error_message; } ?></small>
                        <input type="number" class="form-control rounded-0 shadow-none" name="maximum_amount" placeholder="Enter Minimum amount" required>
                    </div>

                    <button type="submit" name="submit" class="btn btn-info rounded-0 shadow-none text-white float-right">Submit</button>
                </form>

            </div>
        </div>
    </div>

<?php require_once('footer.php'); ?>