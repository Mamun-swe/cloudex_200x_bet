<?php
    include('config.php');
    if(isset($_POST)){
        $statement = $pdo->prepare("DELETE FROM multi_bet_info WHERE user_id=? AND stack_id=?");
        $statement->execute(array($_POST['user_id'], $_POST['stake_id']));
        echo json_encode('success');
    }

?>