<?php  
$statement2661 = $pdo->prepare("SELECT * FROM tbl_home_color");
$statement2661->execute();
$result2661 = $statement2661->fetchAll(PDO::FETCH_ASSOC);
foreach ($result2661 as $row2661) {
    if($row2661['function_name'] == "Homepage Background"){
        $home_color=$row2661['color_code'];
    }
    if($row2661['function_name'] == "Header Color"){
        $header_color=$row2661['color_code'];
    }
    if($row2661['function_name'] == "Game Title"){
        $game_title_color=$row2661['color_code'];
    }
    if($row2661['function_name'] == "Bet Name"){
        $bet_name_color=$row2661['color_code'];
    }
    if($row2661['function_name'] == "Bet Modal"){
        $bet_button_color=$row2661['color_code'];
    }
    if($row2661['function_name'] == "Status Bar"){
        $status_bar_color=$row2661['color_code'];
    }
    if($row2661['function_name'] == "Footer Color"){
        $footer=$row2661['color_code'];
    }
    if($row2661['function_name'] == "Live Game Bar"){
        $live_color=$row2661['color_code'];
    }
    if($row2661['function_name'] == "Upcoming Game Bar"){
        $upcoming_color=$row2661['color_code'];
    }
}
?>

<style>
	.modal-body, .modal-footer {
		background-color: unset !important;
	}
	
	
	.tabMenu li a:hover, .tabMenu li a.active {
		background-color: #016D5F !important;
		border: 1px solid #215a4c !important; 
		color: #FFF !important;
	}

	.heading-color,.dateshow {
		background: <?php echo $header_color; ?> !important;
	}
	.mh-color{
		background: #005A4C !important;
	}
	body {
	background-color: <?php echo $home_color; ?> !important;
}
.footer-basic-centered {
	background-color: <?php echo $footer; ?> !important;
}
</style>