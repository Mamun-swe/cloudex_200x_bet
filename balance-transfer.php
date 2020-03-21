<?php

    if(isset($_POST)){
        include('config.php');

        $statement = "SELECT credit FROM tbl_member WHERE user_id=?";
        $statement->execute(array($_POST['sender']));
        $stmt =  $pdo->query($statement);
        $result290 = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result290 as $row290){
        $credit = $row['credit'];
        $response = $credit;
        // if($credit > $_POST['amount']){
        //     $response ='Your is low ...';
        // }else{
        //     $response ='continue ...';
        // }

    }
        

        
        echo json_encode($response);
    }

    


?>