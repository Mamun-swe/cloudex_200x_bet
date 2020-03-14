<?php
    ob_start();
    session_start();
    include("inc/config.php");

    for($count = 0; $count < count($_POST["myArray"]); $count++) {  
        $statement = $pdo->prepare("DELETE FROM tbl_bet WHERE bet_id=?");
        $statement->execute(array($_POST["myArray"][$count]['id']));
        $response=array(
            "success" => 1
        );
    }
    echo json_encode($response);

?>