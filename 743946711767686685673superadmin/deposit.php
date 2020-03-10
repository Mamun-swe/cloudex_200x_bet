<?php require_once('header.php'); ?>

<section class="content-header">
	<div class="content-header-left">
		<h1>View Deposits</h1>
	</div>
	<div class="content-header-right">
		<a href="deposit-add.php" class="btn btn-primary btn-sm">Add New Deposit</a>
	</div><br><br>
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
			        <th>Request By</th>
			        <th>Deposit To</th>
			        <th>Deposit By</th>
			        <th>Amount (Tk)</th>
			        <th>Method</th>
			        <th>Transaction Number</th>
			        <th>Requested At</th>
			        <th>Note</th>
			        <th>Status</th>
			        <th>Action</th>
			        <th>Action</th>
			        <th>Action</th>
			        <th>Action</th>
			    </tr>
			</thead>
            <tbody>
            	<?php
				$i=0;
                $statement = $pdo->prepare("SELECT note,deposit_id,user_name,deposit_to,deposit_by,amount,method,transection_number,tbl_deposit.status,date FROM tbl_deposit  JOIN tbl_member ON tbl_deposit.request_by=tbl_member.user_id ORDER BY deposit_id DESC");
            	$statement->execute();
            	$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
            	foreach ($result as $row) {
            		$i++;
            		?>
					<tr class="<?php if($row['status']==1) {echo 'bg-g';} else if($row['status']==2) {echo 'bg-r';} ?>">
	                    <td><?php echo $i; ?></td>
	                    <td><?php echo $row['user_name']; ?></td>
	                    <td><?php echo $row['deposit_to']; ?></td>
	                    <td><?php echo $row['deposit_by']; ?></td>
	                    <td><?php echo $row['amount']; ?></td>
	                    <td><?php echo $row['method']; ?></td>
	                    <td><?php echo $row['transection_number']; ?></td>
	                    <td><?php echo $row['date']; ?></td>
	                    <td><?php echo $row['note']; ?></td>
	                    <td><?php if($row['status']==1) {echo 'Accepted';} else if($row['status']==2) {echo 'Rejected';} else {echo 'Pending';}?></td>
	                    <td>
							<a href="deposit-accept.php?id=<?php echo $row['deposit_id']; ?>" class="btn btn-success btn-xs">Accept</a>
						</td>
						<td>
							<a href="deposit-reject.php?id=<?php echo $row['deposit_id']; ?>" class="btn btn-danger btn-xs">Reject</a>
						</td>
	                    <td>
	                        <a href="deposit-edit.php?id=<?php echo $row['deposit_id']; ?>" class="btn btn-primary btn-xs">Edit</a>
	                    </td>
	                    <td>
	                        <a href="#" class="btn btn-danger btn-xs" data-href="deposit-delete.php?id=<?php echo $row['deposit_id']; ?>" data-toggle="modal" data-target="#confirm-delete">Delete</a>
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


<?php require_once('footer.php'); ?>