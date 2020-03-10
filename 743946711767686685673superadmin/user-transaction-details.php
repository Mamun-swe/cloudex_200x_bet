<?php 
require_once('header.php'); 
$statement4 = $pdo->prepare("SELECT *
    FROM tbl_transaction WHERE ORDER BY transaction_id DESC");
$statement4->execute();
$result4 = $statement4->fetchAll(PDO::FETCH_ASSOC);
?>

<section class="content-header">
	<div class="content-header-left">
		<h1>View User Transactions</h1>
	</div>
</section>


<section class="content">

  <div class="row">
    <div class="col-md-12">
        
      <div class="box box-info">
        
        <div class="box-body table-responsive">
          <table id="example1" class="table table-bordered table-striped">
			<thead>
			    <tr>
			        <th>SL</th>
			        <th>Date & Time</th>
			        <th>Description/th>
			        <th>Notes</th>
			        <th>Debit (Out)</th>
			        <th>Credit (In)</th>
					<th>Balance</th>
			    </tr>
			</thead>
            <tbody>
				<?php
				foreach ($result4 as $row4) {
					if($row4['type'] == "Deposit"){

						$statement5 = $pdo->prepare("SELECT * FROM tbl_deposit WHERE deposit_id=? AND request_by=?");
						$statement5->execute(array($row4['detail_id'],$uid));
						$result5 = $statement5->fetchAll(PDO::FETCH_ASSOC);
						foreach ($result5 as $row5) {
							?>
							<tr>
								<tr>
									<td class="text-center"><?php echo $row4['transaction_date']; ?></td>
									<td colspan="2" class="text-center"><?php echo $row4['description']; ?></td>
									<td class="text-center"><?php echo $row5['note']; ?></td>
									<td class="text-center">0.00</td>
									<td class="text-center">
										<?php 
										if($row5['status']==1){
											echo number_format($row5['amount'], 2, '.', ',');
										}else{
											echo "0.00";
										}
										?>
									</td>
									<td class="text-center"><?php echo number_format($row4['user_balance'], 2, '.', ','); ?></td>
								</tr>
								<?php

							}

						}if($row4['type']=="Withdraw"){

							$statement6 = $pdo->prepare("SELECT * FROM tbl_withdraw WHERE withdraw_id=? AND request_by=?");
							$statement6->execute(array($row4['detail_id'],$uid));
							$result6 = $statement6->fetchAll(PDO::FETCH_ASSOC);
							foreach ($result6 as $row6) {
								?>
								<tr>
									<td class="text-center"><?php echo $row4['transaction_date']; ?></td>
									<td colspan="2" class="text-center"><?php echo $row4['description']; ?></td>
									<td class="text-center"><?php echo $row6['withdraw_note']; ?></td>
									<td class="text-center">
										<?php 
										if($row6['withdraw_status']==1){
											echo number_format($row6['amount'], 2, '.', ',');
										}else{
											echo "0.00";
										}
										?>
									</td>
									<td class="text-center">
									    <?php
									    if(($row6['withdraw_status']==1) || ($row6['withdraw_status']==2) || ($row6['withdraw_status']==3)){
											echo number_format($row6['amount'], 2, '.', ',');
										}else{
											echo "0.00";
										}
										?>
								    </td>
									<td class="text-center"><?php echo number_format($row4['user_balance'], 2, '.', ','); ?></td>
								</tr>
								<?php

							}

						}if($row4['type']=="Transfer"){

							$uname=$_SESSION['user']['user_name'];
							$statement7 = $pdo->prepare("SELECT * FROM tbl_transfer_list WHERE transfer_id=? AND transfer_to=?");
							$statement7->execute(array($row4['detail_id'],$uname));
							$result7 = $statement7->fetchAll(PDO::FETCH_ASSOC);
							foreach ($result7 as $row7) {
								if($row4['description']=="Credit Transfer Add"){
									?>
									<tr>
										<td class="text-center"><?php echo $row4['transaction_date']; ?></td>
										<td colspan="2" class="text-center"><?php echo $row4['description']; ?></td>
										<td class="text-center"><?php echo $row7['notes']; ?></td>
										<td class="text-center">
											<?php 
											echo "0.00";
											?>
										</td>
										<td class="text-center">
											<?php 
											echo $row7['amount']; 
											?>
										</td>
										<td class="text-center"><?php echo number_format($row4['user_balance'], 2, '.', ','); ?></td>
									</tr>
									<?php
								}
							} $statement78 = $pdo->prepare("SELECT * FROM tbl_transfer_list WHERE transfer_id=? AND transferred_by=?");
							$statement78->execute(array($row4['detail_id'],$uname));
							$result78 = $statement78->fetchAll(PDO::FETCH_ASSOC);
							foreach ($result78 as $row78) {
								if($row4['description']=="Credit Send"){
									?>
									<tr>
										<td class="text-center"><?php echo $row4['transaction_date']; ?></td>
										<td colspan="2" class="text-center"><?php echo $row4['description']; ?></td>
										<td class="text-center"><?php echo $row78['notes']; ?></td>
										<td class="text-center">
											<?php 
											echo number_format($row78['amount'], 2, '.', ',');

											?>
										</td>
										<td class="text-center">
											<?php 

											echo "0.00";

											?>
										</td>
										<td class="text-center"><?php echo number_format($row4['user_balance'], 2, '.', ','); ?></td>
									</tr>
									<?php
								}



							}

						}if($row4['type']=="Bet Sell"){

							$statement8 = $pdo->prepare("SELECT * FROM tbl_bet JOIN tbl_stake ON tbl_bet.stake_id=tbl_stake.stake_id WHERE bet_id=? AND bet_by=?");
							$statement8->execute(array($row4['detail_id'],$uid));
							$result8 = $statement8->fetchAll(PDO::FETCH_ASSOC);
							foreach ($result8 as $row8) {
								?>
								<tr>
									<td class="text-center"><?php echo $row4['transaction_date']; ?></td>
									<td colspan="2" class="text-center"><?php echo $row4['description']; ?></td>
									<td class="text-center"></td>
									<td class="text-center"><?php echo "0.00"; ?></td>
									<td class="text-center">
										<?php 
										$ro=$row8['amount'] * $row8['sell_price'];
										echo number_format($ro, 2, '.', ',');

										?>
									</td>
									<td class="text-center"><?php echo number_format($row4['user_balance'], 2, '.', ','); ?></td>
								</tr>
								<?php

							}

						}
						if($row4['type']=="Bet Win"){

							$statement9 = $pdo->prepare("SELECT * FROM tbl_bet WHERE bet_id=? AND bet_by=?");
							$statement9->execute(array($row4['detail_id'],$uid));
							$result9 = $statement9->fetchAll(PDO::FETCH_ASSOC);
							foreach ($result9 as $row9) {
								?>
								<tr>
									<td class="text-center"><?php echo $row4['transaction_date']; ?></td>
									<td colspan="2" class="text-center"><?php echo $row4['description']; ?></td>
									<td class="text-center"></td>
									<td class="text-center"><?php echo "0.00"; ?> </td>
									<td class="text-center">
										<?php 

										$ass=$row9['return_amount'];
										$ass1=$ass*0.01;
										$ass2=$ass-$ass1;
										echo number_format($ass2, 2, '.', ',');

										?>
									</td>
									<td class="text-center"><?php echo number_format($row4['user_balance'], 2, '.', ','); ?></td>
								</tr>
								<?php

							}

						}
						if($row4['type']=="Bet Loss"){

							$statement99 = $pdo->prepare("SELECT * FROM tbl_bet WHERE bet_id=? AND bet_by=?");
							$statement99->execute(array($row4['detail_id'],$uid));
							$result99 = $statement99->fetchAll(PDO::FETCH_ASSOC);
							foreach ($result99 as $row99) {
								?>
								<tr>
									<td class="text-center"><?php echo $row4['transaction_date']; ?></td>
									<td colspan="2" class="text-center"><?php echo $row4['description']; ?></td>
									<td class="text-center">Inproper Bet Place</td>
									<td class="text-center"><?php echo number_format($row99['amount'], 2, '.', ','); ?> </td>
									<td class="text-center">
										<?php echo "0.00"; ?>
									</td>
									<td class="text-center"><?php echo number_format($row4['user_balance'], 2, '.', ','); ?></td>
								</tr>
								<?php

							}

						}
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