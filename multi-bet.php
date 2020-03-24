<?php 
include('config.php');

if(isset($_POST['stake_id'])){

$state = $pdo->prepare("SELECT * FROM tbl_stake JOIN tbl_game ON tbl_stake.game_id=tbl_game.game_id WHERE tbl_stake.stake_id=?");
    $state->execute(array($_POST['stake_id']));
    $result = $state->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row) {
        echo json_encode(array($row));
    }
}

?>