<?php

if(isset($_POST['registration'])){
    
    $statement9 = $pdo->prepare("SELECT *
							FROM tbl_member WHERE user_name=?");
	$statement9->execute(array($_POST['username']));
    $total_name = $statement9->rowCount();
    
    if($total_name>0){
        $_SESSION['register_error']="The Previous typed User Name is already taken! Please enter another user name!";
    }
    else{

    	$a=1;
    	$credit="0.00";
    	$statement2 = $pdo->prepare("SELECT *
    							FROM tbl_member WHERE user_name=?");
    	$statement2->execute(array($_POST['sponsor_name']));
    	$result2 = $statement2->fetchAll(PDO::FETCH_ASSOC);
    	foreach ($result2 as $row2){
    		$id=$row2['user_id'];
    	}
    	$passwor = strip_tags($_POST['password']);
    	$password=md5($passwor);
    	$date=date("Y-m-d");
    
    	$statement = $pdo->prepare("INSERT INTO tbl_member (full_name,user_name, credit, email, phone, password, club_id, sponsor_id, joining_date, status) VALUES (?,?,?,?,?,?,?,?,?,?)");
    	$statement->execute(array($_POST['full_name'],$_POST['username'],$credit,$_POST['email'],$_POST['number'],$password,$_POST['club'],$id,$date,$a));
    	
    	$statements = $pdo->prepare("SELECT * FROM tbl_member WHERE user_id = (SELECT MAX(user_id) FROM tbl_member)");
    	$statements->execute();
        $results = $statements->fetchAll(PDO::FETCH_ASSOC);
        foreach($results as $rows) {
            $_SESSION['user'] = $rows;
        }
        $_SESSION['register_error']="";
        header("location: index.php");
    }
}

?>