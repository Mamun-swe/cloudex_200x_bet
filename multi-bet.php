<?php 
include('config.php');

if(isset($_POST)){

    $user = $_POST['user_id'];
    $game = $_POST['game_id'];
    $stack = $_POST['stack_id'];

    
    
    $stated = $pdo->prepare("SELECT * FROM multi_bet_info WHERE user_id=? AND game_id=?");
    $stated->execute(array($user, $game));
    $resultd = $stated->fetchAll(PDO::FETCH_ASSOC);

    if(count($resultd) > 0){
        echo json_encode('found');
    }else{
        $state1 = $pdo->prepare("INSERT INTO `multi_bet_info`(`user_id`, `game_id`, `stack_id`) VALUES (?,?,?)");
        $state1->execute(array($user, $game, $stack));
        echo json_encode('success');
    }

}

?>