<?php require_once('header.php'); ?>

<section class="content-header">
	<div class="content-header-left">
		<h1>View Transfers</h1>
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
			        <th>Transfer To</th>
			        <th>Transferred By</th>
			        <th>Amount (Tk)</th>
			        <th>Notes</th>
			        <th>Status</th>
			    </tr>
			</thead>
            <tbody>
            	<?php
            	$i=0;
                $statement = $pdo->prepare("SELECT * FROM tbl_transfer_list ORDER BY transfer_id DESC");
            	$statement->execute();
            	$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
            	foreach ($result as $row) {
            		$i++;
            		?>
					<tr class="<?php if($row['status']==1) {echo 'bg-g';} else if($row['status']==2) {echo 'bg-r';} ?>">
	                    <td><?php echo $i; ?></td>
						<td><?php echo $row['transfer_to']; ?></td>
	                    <td><?php echo $row['transferred_by']; ?></td>
	                    <td><?php echo $row['amount']; ?></td>
	                    <td><?php echo $row['notes']; ?></td>
	                    <td><?php if($row['status']==1) {echo 'Accepted';} else if($row['status']==2) {echo 'Rejected';} else {echo 'Pending';} ?></td>
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