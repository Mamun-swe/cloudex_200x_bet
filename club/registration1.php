<?php
ob_start();
session_start();
include("config.php");
    
$valid=1;

$statement92 = $pdo->prepare("SELECT *
						FROM tbl_member WHERE user_name=?");
$statement92->execute(array($_POST['username']));
$total_terms = $statement92->rowCount();

if($total_terms == 0){
    $error1 = "";
}
else{
    $error1 = "This user name is already taken!";  
    $valid=0;
}

if($_POST['password'] != $_POST['confirm_password']){
    $error2 = "The passwords in both fields are not matching!";
    $valid=0;
}
else{
    $error2 = "";  
}

if(empty($_POST['club'])){
    $error3 = "You must select a club!";
    $valid=0;
}
else{
    $error3 = "";  
}


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
if($valid == 1){
    $statement = $pdo->prepare("INSERT INTO tbl_member (full_name,user_name, credit, email, phone, password, club_id, sponsor_id, joining_date, status) VALUES (?,?,?,?,?,?,?,?,?,?)");
    $statement->execute(array($_POST['full_name'],$_POST['username'],$credit,$_POST['email'],$_POST['number'],$password,$_POST['club'],$id,$date,$a));

$statements = $pdo->prepare("SELECT * FROM tbl_member WHERE user_id = (SELECT MAX(user_id) FROM tbl_member)");
	$statements->execute();
    $results = $statements->fetchAll(PDO::FETCH_ASSOC);
    foreach($results as $rows) {
        $_SESSION['user'] = $row;
    }
    header("location: index.php");
}
else{
    echo json_encode(array( 
        "error1"=>$error1,
        "error1"=>$error2,
        "error1"=>$error3 
    ));
}


?>
 