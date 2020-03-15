<?php require_once('header.php'); ?>

<section class="content-header">
	<div class="content-header-left">
		<h1>View Games</h1>
	</div>
	<?php if($_SESSION['admin']['role'] == 'Super admin') { ?>
	<div class="content-header-right">
		<form method="post">
			<button type="submit" name="submit" class="btn btn-danger">Delete All</button>
			<?php 
				if(isset($_POST['submit'])){
					$statement = $pdo->prepare("DELETE FROM tbl_game WHERE game_status != 5");
					$statement->execute();
				}
			?>
		</form>
	</div>
	
	<div class="content-header-right">
		<button type="button" class="btn btn-info" id="test" style="margin: 0px 8px;">Delete Selected</button>
	</div>
	<?php } ?>
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
								<th width="30">Select</th>
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
									<td>
										<input type="checkbox" class="form-check-input" value="<?php echo $row['game_id']; ?>">
									</td>
									
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
		url: 'delete_selected_game.php',
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