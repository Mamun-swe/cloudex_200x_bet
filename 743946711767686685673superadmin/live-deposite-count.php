<?php
  ob_start();
  session_start();
  include("inc/config.php");
  include("inc/functions.php");
  include("inc/CSRF_Protect.php");
  $csrf = new CSRF_Protect();
  ?>

<?php
    // Check if the user is logged in or not
    if(!isset($_SESSION['admin']) AND empty($_SESSION['admin'])) {
        header('location: login.php');
        exit;
    }
    $date = $_POST['date'];
    $statement = $pdo->prepare("SELECT sum(amount) FROM tbl_deposit WHERE date = '$date' AND status = 1");
    $statement->execute();
    $today_deposite = $statement->fetchColumn();
    if($today_deposite > 0){
      $response=array(
        "amount" => $today_deposite
      );
    }else{
      $response=array(
        "amount" => 0
      );
    }

    echo json_encode($response);
    
?>