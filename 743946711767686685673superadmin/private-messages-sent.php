<?php require_once('header.php'); ?>

<section class="content-header">
	<div class="content-header-left">
		<h1>View Private Sent Messages</h1>
	</div>
	<div class="content-header-right">
		<a href="send-private-message.php" class="btn btn-primary btn-sm">Send Private Message</a>
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
			        <th>Sent To</th>
			        <th>Sent Date</th>
			        <th>Sent Time</th>
			        <th>Message</th>
			        <th>Message Type</th>
			        <th width="80">Action</th>
			    </tr>
			</thead>
            <tbody>
            	<?php
				$i=0;
				$Private='Private';
                $statement = $pdo->prepare("SELECT * FROM tbl_message_sent  JOIN tbl_member ON tbl_message_sent.message_sent_to=tbl_member.user_id WHERE type=? ORDER BY message_sent_id DESC");
            	$statement->execute(array($Private));
            	$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
            	foreach ($result as $row) {
            		$i++;
            		?>
					<tr>
	                    <td><?php echo $i; ?></td>
						<td><?php echo $row['full_name']; ?></td>
	                    <td><?php echo $row['message_sent_date']; ?></td>
	                    <td><?php echo $row['sent_time']; ?></td>
	                    <td><?php echo $row['message']; ?></td>
	                    <td><?php echo $row['type']; ?></td>
	                    <td>
	                        <a href="#" class="btn btn-danger btn-xs" data-href="delete-private-message.php?id=<?php echo $row['message_sent_id']; ?>" data-toggle="modal" data-target="#confirm-delete">Delete</a>
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