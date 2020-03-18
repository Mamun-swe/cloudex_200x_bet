<?php require_once('header.php'); ?>

<!-- Withdraw turn On -->
<?php 
	if(isset($_POST['turnOn'])){
		$statement = $pdo->prepare("UPDATE `tbl_withdraw_limit` SET `status`=? WHERE id=?");
		$statement->execute(array(1, $_POST['id']));
	}

	if(isset($_POST['turnOff'])){
		$statement = $pdo->prepare("UPDATE `tbl_withdraw_limit` SET `status`=? WHERE id=?");
		$statement->execute(array(0, $_POST['id']));
	}
?>

<section class="content-header">
	<div class="content-header-left">
		<h1>View Withdraw</h1>
	</div>
	<?php if($_SESSION['admin']['role'] == 'Super admin') { ?>
	<div class="content-header-right">
		<form method="post">
			<button type="submit" name="submit" class="btn btn-danger">Delete All</button>
			<?php 
				if(isset($_POST['submit'])){
					$statement = $pdo->prepare("DELETE FROM tbl_withdraw");
					$statement->execute();
				}
			?>
		</form>
	</div>
	
	<div class="content-header-right">
		<button type="button" class="btn btn-info" id="test" style="margin: 0px 8px;">Delete Selected</button>
	</div>
	<?php } ?>
	<div class="content-header-right ml-3">
	<?php 
        $statement = "SELECT * FROM tbl_withdraw_limit ORDER BY id DESC LIMIT 1";
        $stmt =  $pdo->query($statement);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $status = $row['status'];
        	if($status == 0){
    ?>
		<form action="" method="post">
			<input type="hidden" value="<?php echo $row['id']; ?>" name="id">
			<button type="submit" name="turnOn" class="btn btn-danger btn-sm text-white">Withdraw status is off</button>
		</form>
	<?php 
		}else{
	?>
		<form action="" method="post">
			<input type="hidden" value="<?php echo $row['id']; ?>" name="id">
			<button type="submit" name="turnOff" class="btn btn-success btn-sm text-white">Withdraw status is on</button>
		</form>
	<?php
		}
	?>
	</div>
	<div class="content-header-right ml-3">
		<a href="withdraw-limit.php" class="btn btn-orange btn-sm text-white">Withdraw Limit</a>
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
      <div class="box box-info">
        
        <div class="box-body table-responsive">
          <table id="example1" class="table table-bordered table-striped">
			<thead>
			    <tr>
			        <th>SL</th>
			        <th>Request BY</th>
			        <th>Amount (Tk)</th>
			        <th>Method</th>
			        <th>SEND TO</th>
					<th>ACCOUNT TYPE</th>
					<th>Date</th>
					<th>Note</th>
			        <th>Status</th>
			        <th>Action</th>
					<?php if($_SESSION['admin']['role'] == 'Super admin') { ?>
			        <th>Action</th>
			        <th>Action</th>
			        <th>Action</th>
					<?php } ?>
			    </tr>
			</thead>
            <tbody>
            	<?php
				$i=0;
				
                $statement = $pdo->prepare("SELECT * FROM tbl_withdraw ORDER BY withdraw_id DESC");
            	$statement->execute();
            	$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
            	foreach ($result as $row) {
            		$i++;
            	$firstCharacter1 = $row['request_by'];
            		$firstCharacter =substr($firstCharacter1, 0, 2);
            		if($firstCharacter=='cc'){
            		    $str = preg_replace('/\D/', '', $firstCharacter1);
            		    $statement1 = $pdo->prepare("SELECT * FROM tbl_club ORDER BY club_id DESC");
            	$statement1->execute();
            	$result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);
            	foreach ($result1 as $row1) {
            	    if($row1['club_id']==$str){
            	    $name=$row1['club_name']." (CLUB)";
            	    }
            	}
            		}else{
            		 	$statement2 = $pdo->prepare("SELECT * FROM tbl_member ORDER BY user_id DESC");
						$statement2->execute();
						$result2 = $statement2->fetchAll(PDO::FETCH_ASSOC);
						foreach ($result2 as $row2) {
							if($row2['user_id']==$row['request_by']){
								$name=$row2['user_name'];
							}
						}
            		}
            		?>
					<tr class="<?php if($row['withdraw_status']==1) {echo 'bg-g';}else if($row['withdraw_status']==2) {echo 'bg-r';} ?>">
						<td>
							<input type="checkbox" class="form-check-input" value="<?php echo $row['withdraw_id']; ?>">
						</td>
						<td><?php echo $i; ?></td>
	                    <td><?php echo $name; ?></td>
	                    <td><?php echo $row['amount']; ?></td>
	                    <td><?php echo $row['method']; ?></td>
	                    <td><?php echo $row['send_to']; ?></td>
						<td><?php echo $row['account_type']; ?></td>
						<td><?php echo $row['date']; ?></td>
						<td><?php echo $row['withdraw_note']; ?></td>
	                    <td><?php if($row['withdraw_status']==1) {echo 'Approved';} else if($row['withdraw_status']==2) {echo 'Rejected';} else {echo 'Pending';} ?></td>
	                   <td>
					   		<?php
								if($row['withdraw_status']==0) {
							?>
							<a href="withdraw-accept.php?id=<?php echo $row['withdraw_id']; ?>" class="btn btn-success btn-xs">Accept</a>
							<?php 
								} 
								if($row['withdraw_status']==1){
							?>
								<button type="button" class="btn btn-sm btn-success text-white" disabled><i class="fas fa-check"></i></button>
							<?php
								}
							?>
						</td>


						<?php if($_SESSION['admin']['role'] == 'Super admin') { ?>
						<td>
							<a href="withdraw-reject.php?id=<?php echo $row['withdraw_id']; ?>" class="btn btn-danger btn-xs">Reject</a>
						</td>
	                    <td>
	                        <a href="withdraw-edit.php?id=<?php echo $row['withdraw_id']; ?>" class="btn btn-primary btn-xs">Edit</a>
	                    </td>
	                    <td>
	                        <a href="#" class="btn btn-danger btn-xs" data-href="withdraw-delete.php?id=<?php echo $row['withdraw_id']; ?>" data-toggle="modal" data-target="#confirm-delete">Delete</a>
	                    </td>
						<?php } ?>

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


<script>
$("#test").click(function(e) {
    var myArray = [];
    $(":checkbox:checked").each(function() {
        myArray.push({
			id: this.value
		});
    });
   $.ajax({
		type: 'POST',
		url: 'delete_selected_withdraw.php',
		data: {myArray},
		success : function(response){
			var obj = JSON.parse(response);
			var res = obj.success;
			if(res == 1){
				location.reload();
			}
		}
	});
});
</script>

<?php require_once('footer.php'); ?>