<?php require_once('header.php'); ?>

<?php
if(isset($_POST['submit_win'])){
    if($_POST['status'] == 'win'){

        $statement4 = $pdo->prepare("UPDATE tbl_stake SET stake_status=? WHERE game_id=? AND stake_id=? AND question_id=?");
        $statement4->execute(array(2, $_POST['game_id'], $_POST['stake_id'], $_POST['question_id']));

        $statement5 = $pdo->prepare("UPDATE tbl_stake SET stake_status=? WHERE game_id=? AND stake_id !=? AND question_id=?");
        $statement5->execute(array(3, $_POST['game_id'], $_POST['stake_id'], $_POST['question_id']));



        $slayer=0;
        $state = $pdo->prepare("SELECT * FROM tbl_bet WHERE stake_id=? AND bet_status=?");
        $state->execute(array($_POST['stake_id'], $slayer));
        $result = $state->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
            $bet_id=$row['bet_id'];
            $bet_by=$row['bet_by'];
            $amount=$row['return_amount'];
            $sponsor_amount=$amount * 0.01;
            $final_amount=$amount;//-$sponsor_amount;
            
            //enter winning in winner
            $statemen = $pdo->prepare("SELECT * FROM tbl_member WHERE user_id=?");
            $statemen->execute(array($bet_by));
            $result1 = $statemen->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result1 as $row1) {
                $credit = $row1['credit'];
            }

            $final_amounts = $credit+$final_amount;
            $statement1 = $pdo->prepare("UPDATE tbl_member SET credit=? WHERE user_id=?");
            $statement1->execute(array($final_amounts,$bet_by));
            
            //enter bet win transaction
            $detail1="Bet Win";
            $date=date("Y-m-d h:i");
            $type1="Bet Win";
            $statement8 = $pdo->prepare("INSERT INTO tbl_transaction (detail_id, type, description,transaction_date,user_balance) VALUES (?,?,?,?,?)");
            $statement8->execute(array($bet_id,$type1,$detail1,$date,$final_amounts));
            
            // $statement3 = $pdo->prepare("UPDATE tbl_bet SET bet_status=? WHERE bet_id=?");
            // $statement3->execute(array(1,$bet_id));
        }
        $bet_table_update = $pdo->prepare("UPDATE tbl_bet SET bet_status=? WHERE stake_id=?");
        $bet_table_update->execute(array(2,$_POST['stake_id']));
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }

    if($_POST['status'] == 'loss'){
        
        $statement4 = $pdo->prepare("UPDATE tbl_stake SET stake_status=? WHERE game_id=? AND stake_id=? AND question_id=?");
        $statement4->execute(array(3, $_POST['game_id'], $_POST['stake_id'], $_POST['question_id']));

        $statement5 = $pdo->prepare("UPDATE tbl_stake SET stake_status=? WHERE game_id=? AND stake_id !=? AND question_id=?");
        $statement5->execute(array(2, $_POST['game_id'], $_POST['stake_id'], $_POST['question_id']));



        $slayer=0;
        $state = $pdo->prepare("SELECT * FROM tbl_bet WHERE stake_id=? AND bet_status=?");
        $state->execute(array($_POST['stake_id'], $slayer));
        $result = $state->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
            
            $bet_by=$row['bet_by'];
            $state12 = $pdo->prepare("SELECT * FROM tbl_member WHERE user_id=?");
            $state12->execute(array($bet_by));
            $result12 = $state12->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result12 as $row12) {
                $credit = $row12['credit'];
            }
            
            $bet_id=$row['bet_id'];
            $detail="Bet Loss";
            $date=date("Y-m-d h:i");
            $type="Bet Loss";
            $statement2 = $pdo->prepare("INSERT INTO tbl_transaction (detail_id, type, description,transaction_date,user_balance) VALUES (?,?,?,?,?)");
            $statement2->execute(array($bet_id,$type,$detail,$date,$credit));
            
            $statement3 = $pdo->prepare("UPDATE tbl_bet SET bet_status=? WHERE bet_id=?");
            $statement3->execute(array(2,$bet_id));
        }
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }

}else{
    header('location: logout.php');
    exit;
}
?>
