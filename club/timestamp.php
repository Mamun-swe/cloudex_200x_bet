<?php
    if(isset($_POST['show_time'])){
        date_default_timezone_set('Asia/Dhaka');
	    $current_time = date('h:i:sa');
	    echo $current_time;
    }
?>
