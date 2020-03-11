<?php require_once('header.php'); ?>

<section class="content-header">
	<div class="content-header-left">
		<h1>View Games</h1>
	</div>
	<div class="content-header-right">
		<a href="game-add.php" class="btn btn-primary btn-sm">Add Game</a>
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
								<th width="30">Game Type</th>
								<th width="180">Game Name</th>
								<th width="180">Tournament Name</th>
								<th width="180">Game Day</th>
								<th width="180">Game Time</th>
								<th width="180">Game Update</th>
								<th width="180">Betting Options</th>
								<th width="180">Status</th>
								<th width="100">Action</th>
								<th width="100">Action</th>
								<th width="100">Action</th>
								<th width="100">Action</th>
								<th width="50">Action</th>
								<th width="50">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i=0;
							$num="5";
							$statement = $pdo->prepare("SELECT * FROM tbl_game
													WHERE game_status != ?");
							$statement->execute(array($num));
							$result = $statement->fetchAll(PDO::FETCH_ASSOC);						
							foreach ($result as $row) {
								$i++;
								?>
								<tr class="<?php if($row['game_status']==1) {echo 'bg-g';}else if($row['game_status']==2) {echo 'bg-r';} else {echo 'bg-a';} ?>">
									<td><?php echo $i; ?></td>
									<td><?php echo $row['type']; ?></td>
									<td><?php echo $row['game_name']; ?></td>
									
									<td><?php echo $row['desh1'].'<span style="color:red;"> VS </span>'. $row['desh2']; ?></td>
									<td><?php echo $row['tournament']; ?></td>
									<td><?php echo $row['date']; ?></td>
									<td><?php echo $row['time']; ?></td>
									<td>
									    <?php echo $row['game_update']; ?>
									    <br>
									    <a href="game-add-update.php?id=<?php echo $row['game_id']; ?>" class="btn btn-warning btn-xs">Add Update</a>
								    </td>
									<td>
	                                    <a href="bet-option.php?id=<?php echo $row['game_id']; ?>" class="btn btn-info btn-xs">BETTING OPTIONS</a>
	                                </td>
									<td><?php if($row['game_status']==1) {echo 'LIVE';} else if($row['game_status']==2) {echo 'UPCOMING';} else if($row['game_status']==5) {echo 'GAME FINISHED';} else if($row['game_status']=="Hidden") {echo 'HIDDEN';} else if($row['game_status']==0) {echo 'PAUSED';} ?></td>
									<td>
									    <?php 
									        if(($row['game_status']==1) OR  ($row['game_status']==2)){
								        ?>
							                    <a href="game-pause.php?id=<?php echo $row['game_id']; ?>" class="btn btn-warning btn-xs">Pause Game</a>
							            <?php
									        }
							                else{
						                ?>
							                    <a href="game-start.php?id=<?php echo $row['game_id']; ?>" class="btn btn-warning btn-xs">Start Game</a>
							                <?php
					                        }
							            ?>
						            </td>
						            <td>
							            <a href="game-finish.php?id=<?php echo $row['game_id']; ?>" class="btn btn-danger btn-xs">Game Finished</a>
						            </td>
						            <td>
							            <?php 
									        if(($row['game_status']=="Hidden")){
								        ?>
							                    <a href="game-live.php?id=<?php echo $row['game_id']; ?>" class="btn btn-warning btn-xs">Go Live</a>
							            <?php
									        }
							                else{
						                ?>
							                    <a href="game-hide.php?id=<?php echo $row['game_id']; ?>" class="btn btn-warning btn-xs">Hide Game</a>
							                <?php
					                        }
							            ?>
						            </td>
									<td>
							            <a href="game-change-status.php?id=<?php echo $row['game_id']; ?>" class="btn btn-success btn-xs">Change Status</a>
						            </td>
        	                        <td>
	                                    <a href="game-edit.php?id=<?php echo $row['game_id']; ?>" class="btn btn-primary btn-xs">Edit</a>
	                                </td>
	                                <!-- <td>
	                                    <a href="#" class="btn btn-danger btn-xs" data-href="game-delete.php?id=<?php echo $row['game_id']; ?>" data-toggle="modal" data-target="#confirm-delete">Delete</a>
	                                </td> -->
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


<!-- <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
</div> -->


<?php require_once('footer.php'); ?>