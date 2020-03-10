<?php require_once('header.php'); 
$total_Fund= 0;
 $total_w= 0;
$statement = $pdo->prepare("SELECT * FROM tbl_member  ORDER BY user_id ASC");
                // $statement = $pdo->prepare("SELECT * FROM tbl_member JOIN tbl_club ON tbl_member.club_id=tbl_club.club_id ORDER BY user_id ASC");
            	$statement->execute();
            	$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
            	foreach ($result as $row) {
                    $total_Fund= $total_Fund+$row['credit'];
                }
                
                 $statement = $pdo->prepare("SELECT * FROM tbl_withdraw JOIN tbl_member ON tbl_withdraw.request_by=tbl_member.user_id ORDER BY withdraw_id DESC");
            	$statement->execute();
            	$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
            	foreach ($result as $row) {
            	    if($row['withdraw_status']==1){
            	        $total_w= $total_w+$row['amount'];
            	    }
            	}
?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Game Stake</h1>
	</div>
	<!--<div class="content-header-right">-->
	<!--	<a href="user-add.php" class="btn btn-primary btn-sm">Add New User</a>-->
	<!--</div><br><br>-->
</section>

 
<section class="content">
<div class="row">
       <!-- 		<div class="col-md-4 col-sm-6 col-xs-12">
        			<div class="info-box">
        				<span class="info-box-icon bg-green"><i class="fa fa-user-circle"></i></span>
        				<div class="info-box-content">
        					<span class="info-box-text">User Fund in Account</span>
        					<span class="info-box-number"><?php echo $total_Fund; ?></span>
        				</div>
        			</div>
        		</div>
        		<div class="col-md-4 col-sm-6 col-xs-12">
        			<div class="info-box">
        				<span class="info-box-icon bg-green"><i class="fa fa-users"></i></span>
        				<div class="info-box-content">
        					<span class="info-box-text">User Withdraws</span>
        					<span class="info-box-number"><?php echo $total_w; ?></span>
        				</div>
        			</div>
        		</div>
        		-->
        	
        		
        	</div>
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
		<!--	<thead>
			    <tr>
			        <th>SL</th>
			        <th>Date</th>
			        <th>User Name</th>
			        <th>User ID</th>
			        <th>Credit (Tk)</th>
			        <th>Sponsor</th>
			    </tr>
			</thead> -->
            <tbody>
            	<?php
            	$i=0;
            	$statement = $pdo->prepare("SELECT * FROM tbl_game JOIN tbl_stake ON tbl_game.game_id=tbl_stake.game_id JOIN tbl_bet ON tbl_stake.stake_id=tbl_bet.stake_id ORDER BY tbl_game.game_id DESC");
                // $statement = $pdo->prepare("SELECT * FROM tbl_member JOIN tbl_club ON tbl_member.club_id=tbl_club.club_id ORDER BY user_id ASC");
            	$statement->execute();
            	$result = $statement->fetchAll(PDO::FETCH_ASSOC);
            	
            	
                $prev_game_id = '';
                $prev_game_type = '';
                $property_types = array();
                $property_bet = array();
            	foreach ($result as $row) {
            	    $bet_total=0;
            	    $return_total=0;
            	    $bname=$row['bet_name'];
            	    if ( in_array($row['stake_id'], $property_types) ) {
                            continue;
                        }
                        $property_types[] = $row['stake_id'];
                        
                        
                    if ( in_array($row['bet_id'], $property_types) ) {
                            continue;
                        }
                        $property_types[] = $row['bet_id'];
                 //       foreach ($property_types as &$value) {
                            $statement1 = $pdo->prepare("SELECT * FROM tbl_bet JOIN tbl_stake ON tbl_stake.stake_id=tbl_bet.stake_id ORDER BY bet_id DESC");
                // $statement = $pdo->prepare("SELECT * FROM tbl_member JOIN tbl_club ON tbl_member.club_id=tbl_club.club_id ORDER BY user_id ASC");
            	$statement1->execute();
            	$result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);
            	foreach ($result1 as $row1) {
            	    if($row['stake_id']==$row1['stake_id']){
                                $bet_total=$bet_total+$row1['amount'];
                                $return_total=$return_total+$row1['return_amount'];
                            }      
                    }
                 //       }
            	   // first
            //	    if($row['game_id'])
            		
            		$crn_game_id = $row['game_id'];
                    if (($crn_game_id != $prev_game_id) && ($crn_game_id != $prev_game_id)){
                
                        $prev_game_id = $crn_game_id;
                        $i++;
                        ?>
                        <tr class="<?php if($row['game_status']==1) {echo 'bg-g';}else {echo 'bg-w';} ?>">
                        <td><?php echo ""; ?></td>
                        </tr>
                        	<tr class="<?php if($row['game_status']==1) {echo 'bg-g';}else {echo 'bg-r';} ?>">
                        <td><?php echo $i; ?></td>
	                    <td><?php echo $row['type']; ?></td>
	                    <td><?php echo $row['tournament']; ?></td>
	                    <td><?php echo $row['desh1']." VS ".$row['desh2']; ?></td>
	                    <td><?php echo $row['stake_name']; ?></td>
	                    <td><?php echo $row['bet_name']."-".$bet_total." BDT"; ?></td>
	                    <td><?php echo "Return: ".$return_total." BDT"; ?></td>
                        </tr>
                        <?php
                $bet_total=0;
                $return_total=0;
                    }else{
                    
                        ?>
                        	<tr class="<?php if($row['game_status']==1) {echo 'bg-g';}else {echo 'bg-r';} ?>">
                        <td><?php echo ""; ?></td>
	                    <td><?php echo ""; ?></td>
	                    <td><?php echo "" ?></td>
	                    <td><?php echo "" ?></td>
	                    <td><?php echo $row['stake_name']; ?></td>
	                    <td><?php echo $row['bet_name']."-".$bet_total." BDT"; ?></td>
	                    <td><?php echo "Return: ".$return_total." BDT"; ?></td>
                        </tr>
                        
                        <?php
                $bet_total=0;
                $return_total=0;
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