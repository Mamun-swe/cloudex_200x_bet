<?php
include('config.php');
$validity=0;

if(isset($_POST['stake_id'])){

    $stated = $pdo->prepare("SELECT *
       FROM tbl_stake WHERE tbl_stake.stake_id=?");
    $stated->execute(array($_POST['stake_id']));
    $resultd = $stated->fetchAll(PDO::FETCH_ASSOC);
    foreach ($resultd as $rowd) {
        if($rowd['stake_status']==1){
            $validity=1;
        }
    }
    foreach ($resultd as $rowd) {
        if($rowd['stake_status']==2){
            $validity=1;
        }
    }

    $state = $pdo->prepare("SELECT *
       FROM tbl_stake JOIN tbl_game ON tbl_stake.game_id=tbl_game.game_id WHERE tbl_stake.stake_id=?");
    $state->execute(array($_POST['stake_id']));
    $result = $state->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row) {

        $rat=$row['rate'];
        $taka=($row['rate']*100);
        $id=$_POST['stake_id'];
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

       if($validity==1){
        echo json_encode(array( 

            "fucker"=>"Active",
            "first"=>
            "<li class='matchTitle'>
            <img style='border-radius: 50%;' class='img-circle' src='" .$photo. "' width='25px;'>
            <span>".$row['desh1'].' VS '.$row['desh2']." || ".$row['tournament']." || ".$row['date']." , ".$row['time']. "</span>
            <span class='badge rounded-0 badge-".$badge."'>".$type."</span>
            </li>
            <li>
            <span>" .$row['stake_name']. "</span>
            </li>

            <li>
            <span>
            <span>". $row['bet_name']."</span>
            <span class='modalBetRate badge badge2 text-right'>". $row['rate']."</span>
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
    else{
        echo json_encode(array( 

            "fucker"=>"Inactive
            "));
    }
}

}

?>