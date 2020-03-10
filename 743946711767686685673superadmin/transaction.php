<?php require_once('header.php'); ?>

<section class="content-header">
	<div class="content-header-left">
		<h1>View Transactions</h1>
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
			        <th>User Name</th>
			        <th>Date & Time</th>
					<th>Description</th>
					<th>Notes</th>
			        <th>Debit(Out)</th>
			        <th>Credit(In)</th>
			        <th>Balance</th>
			    </tr>
			</thead>
            <tbody>
            	<?php
            	$i=0;
                $statement = $pdo->prepare("SELECT * FROM tbl_transaction ORDER BY transaction_id ASC");
            	$statement->execute();
            	$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
            	foreach ($result as $row) {
            	    
            	    if($row['type']=="Deposit"){
            	        
            	        $type="Deposit";
            	        $statement = $pdo->prepare("SELECT * FROM tbl_transaction JOIN tbl_deposit ON tbl_transaction.detail_id=tbl_deposit.deposit_id 
            	                                    JOIN tbl_member ON tbl_deposit.request_by=tbl_member.user_id WHERE tbl_transaction.type=? ORDER BY transaction_id ASC");
            	        $statement->execute();
            	        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                		$i++;
                		?>
    					<tr>
    	                    <td><?php echo $i; ?></td>
    	                    <td><?php echo $row['full_name']; ?></td>
    	                    <td><?php echo $row['email']; ?></td>
    	                    <td><?php echo $row['phone']; ?></td>
    	                    <td><?php echo $row['role']; ?></td>
    	                    <td><?php if($row['status']==1) {echo 'Active';} else {echo 'Inactive';} ?></td>
    	                </tr>
            		<?php
        	        }
        	        else if($row['type']=="Withdraw"){
        	            $type="Deposit";
            	        $statement = $pdo->prepare("SELECT * FROM tbl_transaction JOIN tbl_deposit ON tbl_transaction.detail_id=tbl_deposit.deposit_id 
            	                                    JOIN tbl_member ON tbl_deposit.request_by=tbl_member.user_id WHERE tbl_transaction.type=? ORDER BY transaction_id ASC");
            	        $statement->execute();
            	        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                		$i++;
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