<?php require_once('header.php'); ?>

<?php
// $bet_id="";
if(!isset($_REQUEST['id'])) {
    header('location: logout.php');
    exit;
} else {
    // Check the id is valid or not
    $statement5 = $pdo->prepare("SELECT * FROM tbl_stake WHERE stake_id=?");
    $statement5->execute(array($_REQUEST['id']));
    $total = $statement5->rowCount();
    if( $total == 0 ) {
        header('location: logout.php');
        exit;
    }
}
?>

<?php
//update stake
$statement4 = $pdo->prepare("UPDATE tbl_stake SET stake_status=? WHERE stake_id=?");
$statement4->execute(array(3,$_REQUEST['id']));

$slayer="Canceled";
$state = $pdo->prepare("SELECT * FROM tbl_bet WHERE stake_id=? AND bet_status != ?");
$state->execute(array($_REQUEST['id'],$slayer));
$result = $state->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
    $bet_id=$row['bet_id'];
    $bet_by=$row['bet_by'];
    $amount=$row['amount'];
    $sponsor_amount=$amount * 0.05;
    $final_amount=$amount-$sponsor_amount;
  //  $final_amount_by=$amount-$sponsor_amount;
    
    //enter winning in winner
    $statemen = $pdo->prepare("SELECT * FROM tbl_member WHERE user_id=?");
    $statemen->execute(array($bet_by));
    $result1 = $statemen->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result1 as $row1) {
        $credit = $row1['credit'];
       // $sponsor = $row1['sponsor_id'];
    }
    /*
    if(!empty($sponsor)){
        $stated = $pdo->prepare("SELECT * FROM tbl_member WHERE user_id=?");
        $stated->execute(array($bet_by));
        $totals = $stated->rowCount();
        $resul = $stated->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resul as $rows) {
            $sponsor_credit = $rows['credit'];
            $sponsor_id = $rows['user_id'];
        }
        
        if($totals > 0){
           
            //enter winning in sponsor
            
            $final_sponsor_amounts = $credit-$final_amount;
            $statement6 = $pdo->prepare("UPDATE tbl_member SET credit=? WHERE user_id=?");
            $statement6->execute(array($final_sponsor_amounts,$sponsor_id));
            
            //enter commision table
            $date=date("Y-m-d h:i");
       //     $statement7 = $pdo->prepare("INSERT INTO tbl_commission (commission_to, amount, commission_date) VALUES (?,?,?)");
       //     $statement7->execute(array($bet_by,$final_amount,$date));
       //     $last_id = $pdo->lastInsertId();
            
            //enter comission transaction
            $detail="Return";
            $date=date("Y-m-d h:i");
            $type="Return";
            $statement2 = $pdo->prepare("INSERT INTO tbl_transaction (detail_id, type, description,transaction_date,user_balance) VALUES (?,?,?,?,?)");
            $statement2->execute(array($bet_by,$type,$detail,$date,$final_sponsor_amounts));
        
  //      }
//    }
  */
    $final_amounts = $credit+$final_amount;
    $statement1 = $pdo->prepare("UPDATE tbl_member SET credit=? WHERE user_id=?");
    $statement1->execute(array($final_amounts,$bet_by));
    
    
    //enter bet win transaction
    $detail1="Return by Admin";
    $date=date("Y-m-d h:i");
    $type1="Return win";
    $statement8 = $pdo->prepare("INSERT INTO tbl_transaction (detail_id, type, description,transaction_date,user_balance) VALUES (?,?,?,?,?)");
    $statement8->execute(array($bet_id,$type1,$detail1,$date,$final_amounts));
    
    
    $statement3 = $pdo->prepare("UPDATE tbl_bet SET bet_status=? WHERE bet_id=?");
    $statement3->execute(array(3,$bet_id)); 
}

$page=$_REQUEST['page'];
$url = "bet-option.php?id=$page";
header("Location: ".$url);
?>