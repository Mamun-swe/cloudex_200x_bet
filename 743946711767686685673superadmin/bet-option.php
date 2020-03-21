<?php 
require_once('header.php'); 
$statements = $pdo->prepare("SELECT * FROM tbl_game WHERE game_id=?");
$statements->execute(array($_REQUEST['id']));
$results = $statements->fetchAll(PDO::FETCH_ASSOC);	
?>

<section class="content-header">
	<div class="content-header-left">
		<h1>
			View Bets For:
			<?php 
			foreach ($results as $rows) {
				$show=$rows['desh1'].' VS '.$rows['desh2']." -> ".$rows['date']." @ ".$rows['time'];
				echo $show;
			}

			?>
		</h1>
	</div>
	<div class="content-header-right">
		<a href="bet-option-add.php?id=<?php echo $_REQUEST['id']; ?>&name=<?php echo $show; ?>" class="btn btn-primary btn-sm">Add Bets</a>
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
								<th width="180">Match</th>
								<th width="180">Question</th>
								<th width="180">Answer</th>
								<th width="30">Rate</th>
								<th width="100">Sell Price(Per Tk)</th>
								<th width="30">Status</th>
								<th width="150">Action</th>
								<th width="100">Action</th>
								<th width="50">Action</th> 
							</tr>
						</thead>
						<tbody>
							<?php
							$i=0;
							$statement = $pdo->prepare("SELECT * FROM tbl_stake 
								JOIN tbl_game ON tbl_stake.game_id=tbl_game.game_id
								WHERE tbl_stake.game_id=? ORDER BY stake_id ASC
								");
							$statement->execute(array($_REQUEST['id']));
							$result = $statement->fetchAll(PDO::FETCH_ASSOC);						
							foreach ($result as $row) {
								$i++;
								$game=$rows['desh1'].'<span style="color:green;"> VS </span>'.$rows['desh2']." -> ".$row['tournament']." || ".$row['date']." , ".$row['time'];
								?>
								<tr class="<?php if($row['stake_status']==1) {echo 'bg-g';}else if($row['stake_status']==0) {echo 'bg-r';} ?>">
									<td><?php echo $i; ?></td>
									<td><?php echo $game; ?></td>
									<td><?php echo $row['stake_name']; ?></td>
									<td><?php echo $row['bet_name']; ?></td>
									<td><?php echo $row['rate']; ?></td>
									<td>
										<?php echo $row['sell_price']; ?>
										<br><br>
										<a href="bet-price-change.php?id=<?php echo $row['stake_id']; ?>&page=<?php echo $row['game_id']; ?>" class="btn btn-warning btn-xs">Change Price</a>
									</td>
									<td><?php if($row['stake_status']==1) {echo 'Active';} else if($row['stake_status']==2) {echo 'WIN';} else if($row['stake_status']==3) {echo 'LOSS';} else {echo 'Inactive';} ?></td>
									<td>
									
										<?php 
											if($_SESSION['admin']['role'] == 'Live'){
											if($row['stake_status'] == 2){
										?>

											<form action="bet-win.php" method="post">
												<input type="hidden" value="win" name="status">
												<input type="hidden" value="<?php echo $row['game_id']; ?>" name="game_id">
												<input type="hidden" value="<?php echo $row['stake_id']; ?>" name="stake_id">
												<button type="submit" name="submit_win" class="btn btn-success btn-xs">WIN</button>
											</form>

											<a href="bet-win-return.php?id=<?php echo $row['stake_id']; ?>&page=<?php echo $row['game_id']; ?>" class="btn btn-info btn-xs">Admin Return</a>

										<?php 
											}elseif($row['stake_status'] == 3){
										?>

											<form action="bet-win.php" method="post">
												<input type="hidden" value="loss" name="status">
												<input type="hidden" value="<?php echo $row['game_id']; ?>" name="game_id">
												<input type="hidden" value="<?php echo $row['stake_id']; ?>" name="stake_id">
												<button type="submit" name="submit_win" class="btn btn-danger btn-xs">LOSS</button>
											</form>

											<a href="bet-win-return.php?id=<?php echo $row['stake_id']; ?>&page=<?php echo $row['game_id']; ?>" class="btn btn-info btn-xs">Admin Return</a>

										<?php 
											}else{
										?>

											<form action="bet-win.php" method="post">
												<input type="hidden" value="win" name="status">
												<input type="hidden" value="<?php echo $row['game_id']; ?>" name="game_id">
												<input type="hidden" value="<?php echo $row['stake_id']; ?>" name="stake_id">
												<button type="submit" name="submit_win" class="btn btn-success btn-xs">WIN</button>
											</form>

											<form action="bet-win.php" method="post">
												<input type="hidden" value="loss" name="status">
												<input type="hidden" value="<?php echo $row['game_id']; ?>" name="game_id">
												<input type="hidden" value="<?php echo $row['stake_id']; ?>" name="stake_id">
												<button type="submit" name="submit_win" class="btn btn-danger btn-xs">LOSS</button>
											</form>
											
											<a href="bet-win-return.php?id=<?php echo $row['stake_id']; ?>&page=<?php echo $row['game_id']; ?>" class="btn btn-info btn-xs">Admin Return</a>
										<?php 
											} 
										}
										if($_SESSION['admin']['role'] == 'Super admin'){
										?>
											<form action="bet-win.php" method="post">
												<input type="hidden" value="win" name="status">
												<input type="hidden" value="<?php echo $row['game_id']; ?>" name="game_id">
												<input type="hidden" value="<?php echo $row['stake_id']; ?>" name="stake_id">
												<button type="submit" name="submit_win" class="btn btn-success btn-xs">WIN</button>
											</form>

											<form action="bet-win.php" method="post">
												<input type="hidden" value="loss" name="status">
												<input type="hidden" value="<?php echo $row['game_id']; ?>" name="game_id">
												<input type="hidden" value="<?php echo $row['stake_id']; ?>" name="stake_id">
												<button type="submit" name="submit_win" class="btn btn-danger btn-xs">LOSS</button>
											</form>
											
											<a href="bet-win-return.php?id=<?php echo $row['stake_id']; ?>&page=<?php echo $row['game_id']; ?>" class="btn btn-info btn-xs">Admin Return</a>

										<?php 
											}	
										?>
										<!-- <a href="bet-loss.php?id=<?php echo $row['stake_id']; ?>&page=<?php echo $row['game_id']; ?>" class="btn btn-danger btn-xs">LOSS</a> -->
										
									</td>
											<td>
												<a href="bet-status-change.php?id=<?php echo $row['stake_id']; ?>&page=<?php echo $row['game_id']; ?>" class="btn btn-success btn-xs">Change Status</a>
											</td>
											<td>
												<a href="bet-option-edit.php?id=<?php echo $row['stake_id']; ?>&page=<?php echo $row['game_id']; ?>" class="btn btn-info btn-xs">Edit</a>
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

<!-- 
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
		</div> -->


		<?php require_once('footer.php'); ?>