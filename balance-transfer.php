<?php
    if(isset($_POST)){
        include('config.php');
        $statement = $pdo->prepare("SELECT * FROM tbl_member WHERE user_id=?");
        $statement->execute(array($_POST['sender']));
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row){
            $credit = $row['credit'];
            if($credit < $_POST['amount']){
                $response=array(
                    "low" => "Your current balance is low ..."
                );
            }else{
                $statement_balance_minus = $pdo->prepare("UPDATE tbl_member SET credit = credit - ? WHERE user_id = ? ");
                $statement_balance_minus->execute(array($_POST['amount'], $_POST['sender']));

                $statement_balance_plus = $pdo->prepare("UPDATE tbl_member SET credit = credit + ? WHERE user_id = ? ");
                $statement_balance_plus->execute(array($_POST['amount'], $_POST['reciver']));

                $response=array(
                    "sucess" => "Balance transfer success ..."
                );
            }
        }
        echo json_encode($response);
    }
?>