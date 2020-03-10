<?php require_once('header.php'); ?>

<section class="content-header">
	<div class="content-header-left">
		<h1>View Sponsor List</h1>
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
								<th width="30">SL</th>
								<th width="100">User Name</th>
								<th width="100">Sponsor Name</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i=0;
							$statement = $pdo->prepare("SELECT *
														FROM tbl_sponsor JOIN tbl_member ON tbl_sponsor.user_id=tbl_member.user_id ORDER BY tbl_sponsor.user_id DESC
													");
							$statement->execute();
							$result = $statement->fetchAll(PDO::FETCH_ASSOC);						
							foreach ($result as $row) {
								$i++;
								?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $row['user_name']; ?></td>
									<td>
										<?php 
											$statement1 = $pdo->prepare("SELECT *
											FROM tbl_member WHERE user_id=? 
										");
										$statement1->execute(array($row['sponsor_user_id']));
										$result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);						
										foreach ($result1 as $row1) {
											echo $row1['user_name']; 
										}
										?>
									</td>
								</tr>
								<?php
							}
							?>							
						</tbody>
					</table>
				</div>
			</div>
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
                <p>Are you sure want to delete this item?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger btn-ok">Delete</a>
            </div>
        </div>
    </div>
</div>


<?php require_once('footer.php'); ?>