<?php
session_start();
include('config.php');
$valid=0;
date_default_timezone_set('Asia/Dhaka');
$date=date("Y-m-d h:i A");
$a=0;
$sell="0.00";

if(isset($_POST['stake_id'])){

	$stated = $pdo->prepare("SELECT *
       FROM tbl_stake JOIN tbl_game ON tbl_stake.game_id=tbl_game.game_id WHERE tbl_stake.stake_id=?");
    $stated->execute(array($_POST['stake_id']));
    $resultd = $stated->fetchAll(PDO::FETCH_ASSOC);
    foreach ($resultd as $rowd) {
        if(($rowd['stake_status']==1) AND ($rowd['game_status']==1) OR (($rowd['stake_status']==1) AND ($rowd['game_status']==2))){
            $valid=1;
        }
    }
    
    $userid=$_SESSION['user']['user_id'];
    $state22 = $pdo->prepare("SELECT *
     FROM tbl_member WHERE user_id=?");
    $state22->execute(array($userid));
    $result22 = $state22->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result22 as $row22) {
      
      $ucredit=$row22['credit'];
  }
  $uid=$_POST['amount']+10;
  $id=$_POST['stake_id'];
  $state = $pdo->prepare("SELECT *
     FROM tbl_stake JOIN tbl_game ON tbl_stake.game_id=tbl_game.game_id WHERE tbl_stake.stake_id=?");
  $state->execute(array($id));
  $result = $state->fetchAll(PDO::FETCH_ASSOC);
  foreach ($result as $row) {
      
      $rat=$row['rate'];
      $taka=($row['rate']*100);
      $gid=$row['game_id'];
      $rate=$row['rate'];
      if($row['type']=="Cricket"){
            $photo="./images/Cricket_Image1.png";
        }
        else if($row['type']=="Football"){
            $photo="./images/Football_Image1.png";;
        }
        else if($row['type']=="Handball"){
            $photo="./images/handball.png";
        }
        else if($row['type']=="Hockey"){
            $photo="./images/hockey.png";
        }
        else if($row['type']=="Basketball"){
            $photo="./images/basketball.png";
        }
        else if($row['type']=="Badminton"){
            $photo="./images/badminton.png";
        }
        else if($row['type']=="Tennis"){
            $photo="./images/tennis.png";
        }
        else if($row['type']=="Virtual Game"){
            $photo="./images/virtual.png";
        }
      if($row['game_status']==1){
        $type="LIVE";
        $badge="danger";
    }
    else{
     $type="UPCOMING";
     $badge="success";
 }
}
$return_amount=$_POST['amount']*$rate;

if($valid==0){
   echo json_encode(array( 
       "fucker"=>"Inactive
       "));
}

	//amount too big or too small
else if(($_POST['amount']<20) OR ($_POST['amount']>5000)){

  echo json_encode(array( 
      "fucker"=>"Active",
      "error"=>
      "<div role='alert' class='alert alert-danger'>
      <strong>Minumum Bet is 20Tk and Maximum Bet is 5000Tk</strong>
      </div>",
      
      "first"=>
      "<li class='matchTitle'>
      <img style='border-radius: 50%;' class='img-circle' src='" .$photo. "' width='25px;'>
      <span>".$row['desh1'].' VS '.$row['desh2']." || ".$row['tournament']." || ".$row['date']." , ".$row['time']. "</span>
      <span class='badge text-right' style=''>".$type."</span>
      </li>
      <li>
      <span>" .$row['stake_name']. "</span>
      </li>

      <li>
      <span>
      <span>". $row['bet_name']."</span>
      <span class='badge text-right'>". $row['rate']."</span>
      </span>
      </li>",

      "second"=>
      "",

      "possible"=>
      "$taka",

      "possible1"=>
      "$rat",

      "button"=>
      "
      <button onClick='betPost(".$id."); return false;'  class='btn btn-lg btn-block mh-color' style='color: #fff;'>Submit
      </button>
      "));
}
else if($ucredit < $uid){

  echo json_encode(array( 
      "fucker"=>"Active",
      "error"=>
      "<div role='alert' class='alert alert-danger'>
      <strong>Insufficient balance {" .$ucredit. "}, please deposit first and continue.</strong>
      </div>",
      
      "first"=>
      "<li class='matchTitle'>
      <img style='border-radius: 50%;' class='img-circle' src='" .$photo. "' width='25px;'>
      <span>".$row['desh1'].' VS '.$row['desh2']." || ".$row['tournament']." || ".$row['date']." , ".$row['time']. "</span>
      <span class='badge text-right' style=''>".$type."</span>
      </li>
      <li>
      <span>" .$row['stake_name']. "</span>
      </li>

      <li>
      <span>
      <span>". $row['bet_name']."</span>
      <span class='badge text-right'>". $row['rate']."</span>
      </span>
      </li>",

      "second"=>
      "",

      "possible"=>
      "$taka",

      "possible1"=>
      "$rat",

      "button"=>
      "
      <button onClick='betPost(".$id."); return false;'  class='btn btn-lg btn-block mh-color' style=' color: #fff;'>Submit
      </button>
      "));
}
else{

  $state1 = $pdo->prepare("INSERT INTO `tbl_bet`(`bet_by`, `game_id`, `stake_id`, `amount`, `current_rate`, `return_amount`, `sell_price`, `date`, `bet_status`) VALUES (?,?,?,?,?,?,?,?,?)");
  $state1->execute(array($userid,$gid,$id,$_POST['amount'],$row['rate'],$return_amount,$sell,$date,$a));
  
  $credit=$ucredit-$_POST['amount'];
  $bet_amount=$_POST['amount'];
  $state2 = $pdo->prepare("UPDATE tbl_member SET credit=? WHERE user_id=?");
  $state2->execute(array($credit,$_SESSION['user']['user_id']));
  $_SESSION['user']['credit']=$credit;
  
  
 // $amount=$row['return_amount'];
    $sponsor_amount=$bet_amount * 0.01;
//	$final_amount=$return_amount-$sponsor_amount;
  
  $statemen = $pdo->prepare("SELECT * FROM tbl_member WHERE user_id=?");
    $statemen->execute(array($userid));
    $result1 = $statemen->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result1 as $row1) {
    //	$credit = $row1['credit'];
    	$sponsor = $row1['sponsor_id'];
    }
    
    if(!empty($sponsor)){
        $stated = $pdo->prepare("SELECT * FROM tbl_member WHERE user_id=?");
        $stated->execute(array($sponsor));
        $totals = $stated->rowCount();
        $resul = $stated->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resul as $rows) {
        	$sponsor_credit = $rows['credit'];
        	$sponsor_id = $rows['user_id'];
        }
        
        if($totals > 0){
            
            //enter winning in sponsor
            
            $final_sponsor_amounts = $sponsor_credit+$sponsor_amount;
            $statement6 = $pdo->prepare("UPDATE tbl_member SET credit=? WHERE user_id=?");
            $statement6->execute(array($final_sponsor_amounts,$sponsor_id));
            
            //enter commision table
            $date=date("Y-m-d h:i");
            $statement7 = $pdo->prepare("INSERT INTO tbl_commission (commission_to, amount, commission_date) VALUES (?,?,?)");
            $statement7->execute(array($sponsor_id,$sponsor_amount,$date));
            $last_id = $pdo->lastInsertId();
            
            //enter comission transaction
            $detail="Sponsor Bonus";
            $date=date("Y-m-d h:i");
            $type="Commission";
            $statement2 = $pdo->prepare("INSERT INTO tbl_transaction (detail_id, type, description,transaction_date,user_balance) VALUES (?,?,?,?,?)");
            $statement2->execute(array($last_id,$type,$detail,$date,$final_sponsor_amounts)); 
        
        }
        
    }
        
        $club_amount=$bet_amount * 0.02;
//	$final_amount=$return_amount-$sponsor_amount;
  
  $statemen = $pdo->prepare("SELECT * FROM tbl_member WHERE user_id=?");
    $statemen->execute(array($userid));
    $result1 = $statemen->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result1 as $row1) {
    //	$credit = $row1['credit'];
    	$club_id = $row1['club_id'];
    }
    
    if(!empty($club_id)){
        $stated = $pdo->prepare("SELECT * FROM tbl_club WHERE club_id=?");
        $stated->execute(array($club_id));
        $totals = $stated->rowCount();
        $resul = $stated->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resul as $rows) {
        //	$club_credit = $rows['credit'];
        	$co_id = $rows['balance'];
        }
    }
    if(!empty($co_id)){
        $co_id=$co_id+$club_amount;
        
        
     //   $club_credit=$club_credit+$club_amount;
    	$statement = $pdo->prepare("UPDATE `tbl_club` SET `balance`=? WHERE club_id=?");
		
		$statement->execute(array($co_id,$club_id)); 
        
        if($totals > 0){
            
            //enter winning in sponsor
            
        //    $final_club_amounts = $club_credit+$club_amount;
        //    $statement6 = $pdo->prepare("UPDATE tbl_member SET credit=? WHERE user_id=?");
        //    $statement6->execute(array($final_club_amounts,$club_id));
            
            //enter commision table
            $date=date("Y-m-d h:i");
            $statement7 = $pdo->prepare("INSERT INTO tbl_commission (commission_to, amount, commission_date) VALUES (?,?,?)");
            $statement7->execute(array($club_id,$club_amount,$date));
            $last_id = $pdo->lastInsertId();
            
            //enter comission transaction
            $detail="Club Bonus";
            $date=date("Y-m-d h:i");
            $type="Commission";
            $statement2 = $pdo->prepare("INSERT INTO tbl_transaction (detail_id, type, description,transaction_date,user_balance) VALUES (?,?,?,?,?)");
            $statement2->execute(array($last_id,$type,$detail,$date,$final_sponsor_amounts)); 
        
        }
        
    }
  
  echo json_encode(array( 
      "fucker"=>"Active",
      "error"=>
      "<div role='alert' class='alert alert-success'>
      <strong>Congratulations! Your Bet has been placed.</strong>
      </div>",
      
      "first"=>
      "<li class='matchTitle'>
      <img style='border-radius: 50%;' class='img-circle' src='" .$photo. "' width='25px;'>
      <span>".$row['desh1'].' VS '.$row['desh2']." || ".$row['tournament']." || ".$row['date']." , ".$row['time']. "</span>
      <span class='badge text-right' style=''>".$type."</span>
      </li>
      <li>
      <span>" .$row['stake_name']. "</span>
      </li>

      <li>
      <span>
      <span>". $row['bet_name']."</span>
      <span class='badge text-right'>". $row['rate']."</span>
      </span>
      </li>",

      "second"=>
      "",

      "possible"=>
      "$taka",

      "possible1"=>
      "$rat",

      "button"=>
      "
      <button onClick='betPost(".$id."); return false;'  class='btn btn-lg btn-block mh-color' style='color: #fff;'>Submit
      </button>
      "));
}


}

?>