<?php require_once('header.php'); ?>

<section class="content-header">
	<div class="content-header-left">
		<h1>View Users</h1>
	</div>
	<!--<div class="content-header-right">-->
	<!--	<a href="user-add.php" class="btn btn-primary btn-sm">Add New User</a>-->
	<!--</div><br><br>-->
</section>


<section class="content">

  <div class="row">
    <div class="col-md-12">
    <?php if(isset($_REQUEST['message'])) { ?>
	<div class="callout callout-success">
	    <p><?php echo $_REQUEST['message']; ?></p>
	</div>
	<?php } ?>
      <div class="box box-info">
        
        <div class="box-body table-responsive">
          <table id="example1" class="table table-bordered table-striped">
			<thead>
			    <tr>
			        <th>SL</th>
			        <th>Action</th>
			        <th>Profile</th>
			        <th>Full Name</th>
			        <th>User Name</th>
			        <th>User ID</th>
			        <th>Credit (Tk)</th>
			        <th>Email</th>
			        <th>Phone</th>
			        <th>Password</th>
			        <th>Club</th>
			        <th>Sponsor</th>
			        <th>Joining Date</th>
			        <th>Status</th>
			        <th width="30">Action</th>
			        <th width="180">Action</th>
			    </tr>
			</thead>
            <tbody>
            	<?php
            	$i=0;
            	$statement = $pdo->prepare("SELECT * FROM tbl_member  ORDER BY user_id ASC");
                // $statement = $pdo->prepare("SELECT * FROM tbl_member JOIN tbl_club ON tbl_member.club_id=tbl_club.club_id ORDER BY user_id ASC");
            	$statement->execute();
            	$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
            	foreach ($result as $row) {
            		$i++;
            		?>
					<tr class="<?php if($row['status']==1) {echo 'bg-g';}else {echo 'bg-r';} ?>">
	                    <td><?php echo $i; ?></td>
	                    <td>
							<a href="user-transaction-details.php?id=<?php echo $row['user_id']; ?>" class="btn btn-info btn-xs">Transaction Details</a>
						</td>
						<td>
							<?php
								$postvalue = base64_encode(serialize($row));
							?>
							<form method="post">
								<input type="hidden" value="<?php echo $postvalue; ?>" name="user">
								<button type="submit" name="showprofile" class="btn btn-sm btn-orange">Visit profile</button>
							</form>
							
							
						</td>
	                    <td><?php echo $row['full_name']; ?></td>
	                    <td><?php echo $row['user_name']; ?></td>
	                    <td><?php echo $row['user_id']; ?></td>
	                    <td><?php echo $row['credit']; ?></td>
	                    <td><?php echo $row['email']; ?></td>
	                    <td><?php echo $row['phone']; ?></td>
	                    <td><?php echo $row['password']; ?></td>
	                    <td>
	                        <?php 
	                            $statement7 = $pdo->prepare("SELECT * FROM tbl_club WHERE club_id=?");
	                            $statement7->execute(array($row['club_id']));
            	                $result7 = $statement7->fetchAll(PDO::FETCH_ASSOC);
            	                foreach ($result7 as $row7) {
	                                echo $row7['club_name']; 
            	                }
	                        ?>
                        </td>
	                    <td>
	                        <?php 
	                            $statement1 = $pdo->prepare("SELECT * FROM tbl_member WHERE user_id=?");
            	                $statement1->execute(array($row['sponsor_id']));
            	                $result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);							
            	                foreach ($result1 as $row1) {
	                                echo $row1['user_name']; 
            	                }
                            ?>
                        </td>
                        <td><?php echo $row['joining_date']; ?></td>
	                    <td><?php if($row['status']==1) {echo 'Active';} else {echo 'Inactive';} ?></td>
	                    <td>
							<a href="user-change-status.php?id=<?php echo $row['user_id']; ?>" class="btn btn-success btn-xs">Change Status</a>
						</td>
	                    <td>
	                        <a href="user-edit.php?id=<?php echo $row['user_id']; ?>" class="btn btn-primary btn-xs">Edit</a>
	                        <a href="#" class="btn btn-danger btn-xs" data-href="user-delete.php?id=<?php echo $row['user_id']; ?>" data-toggle="modal" data-target="#confirm-delete">Delete</a>
	                    </td>
	                </tr>
            		<?php
            	}
            	?>
            </tbody>
          </table>
        </div>
      </div>
  

</section>


<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
            </div>
            <div class="modal-body">
                Are you sure want to delete this item?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger btn-ok">Delete</a>
            </div>
        </div>
    </div>
</div>


<?php
	if(isset($_POST['showprofile'])){
		$postvalue = unserialize(base64_decode($_POST['user']));
    	$_SESSION['user'] = $postvalue;
        header("location: ../index.php");
        unset($_SESSION['login_error']);;
	}
?>

<?php require_once('footer.php'); ?>