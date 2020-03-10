<?php require_once('header.php'); ?>

<section class="content-header">
	<div class="content-header-left">
		<h1>View Clubs</h1>
	</div>
	<div class="content-header-right">
		<a href="club-add.php" class="btn btn-primary btn-sm">Add Club</a>
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
								<th width="30">Club Name</th>
								<th width="180">Club Owner</th>
								<th width="180">Opening Date</th>
								<th width="180">Status</th>
								<th width="180" class="text-center">Members</th>
								<th width="180" class="text-center">Profile</th>
								<th width="100">Action</th>
								<th width="50">Action</th>
								<th width="50">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i=0;
							$statement = $pdo->prepare(
								"SELECT tbl_club.club_id,tbl_club.open_date,tbl_club.club_status,tbl_member.full_name,tbl_club.club_name 
								FROM tbl_club JOIN tbl_member ON tbl_club.club_owner_id=tbl_member.user_id
								");
							$statement->execute();
							$result = $statement->fetchAll(PDO::FETCH_ASSOC);						
							foreach ($result as $row) {
								$i++;
								?>
								<tr class="<?php if($row['club_status']==1) {echo 'bg-g';}else {echo 'bg-r';} ?>">
									<td><?php echo $i; ?></td>
									<td><?php echo $row['club_name']; ?></td>
									<td><?php echo $row['full_name']; ?></td>
									<td><?php echo $row['open_date']; ?></td>
									<td><?php if($row['club_status']==1) {echo 'Active';} else {echo 'Inactive';} ?></td>
									<td class="text-center">
										<?php
											$clubId = $row['club_id'];
											$statement = $pdo->prepare("SELECT count(user_id) FROM tbl_member WHERE club_id = '$clubId'");
											$statement->execute();
											$clubMembers = $statement->fetchColumn();
											echo $clubMembers;
										?>
									
									</td>
									<td class="text-center">
										<?php
											$postvalue = base64_encode(serialize($row));
										?>
										<form method="post">
											<input type="hidden" value="<?php echo $postvalue; ?>" name="user">
											<button type="submit" name="showprofile" class="btn btn-sm btn-orange">Visit profile</button>
										</form>
									</td>
									<td>
							            <a href="club-change-status.php?id=<?php echo $row['club_id']; ?>" class="btn btn-success btn-xs">Change Status</a>
						            </td>
        	                        <td>
	                                    <a href="club-edit.php?id=<?php echo $row['club_id']; ?>" class="btn btn-primary btn-xs">Edit</a>
	                                </td>
	                                <td>
	                                    <a href="#" class="btn btn-danger btn-xs" data-href="club-delete.php?id=<?php echo $row['club_id']; ?>" data-toggle="modal" data-target="#confirm-delete">Delete</a>
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


<?php
	if(isset($_POST['showprofile'])){
		$postvalue = unserialize(base64_decode($_POST['user']));
    	// $_SESSION['user'] = $postvalue;
        // header("location: ../club/wallet.php");
		// unset($_SESSION['login_error']);;
		
		echo $postvalue['club_name'];
	}
?>



<?php require_once('footer.php'); ?>