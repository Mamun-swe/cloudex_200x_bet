<?php require_once('header.php'); ?>

<section class="content-header">
	<div class="content-header-left">
		<h1>View Finished Games</h1>
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
								<th width="180">Betting Options</th>
								<th width="180">Status</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i=0;
							$status="5";
							$statement = $pdo->prepare("SELECT * FROM tbl_game
													WHERE game_status=? ORDER BY game_id DESC");
							$statement->execute(array($status));
							$result = $statement->fetchAll(PDO::FETCH_ASSOC);						
							foreach ($result as $row) {
								$i++;
								?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $row['type']; ?></td>
									<td><?php echo $row['desh1'].' VS '.$row['desh2']; ?></td>
									<td><?php echo $row['tournament']; ?></td>
									<td><?php echo $row['date']; ?></td>
									<td><?php echo $row['time']; ?></td>
									<td>
	                                    <a href="bet-option.php?id=<?php echo $row['game_id']; ?>" class="btn btn-info btn-xs">BETTING OPTIONS</a>
	                                </td>
									<td><?php if($row['game_status']==5) {echo 'GAME FINISHED';} ?></td>
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



<?php require_once('footer.php'); ?>