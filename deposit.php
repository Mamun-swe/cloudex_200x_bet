<?php 
    include('config.php');

    if(isset($_POST)){
        $method = $_POST['sellist1'];
        $reciver_num = $_POST['to'];
        $amount = $_POST['amount'];
        $sender_numb = $_POST['from'];
        $transection_num = $_POST['transection_number'];

        $statement = "SELECT * FROM tbl_deposite_limit ORDER BY id DESC LIMIT 1";
        $stmt =  $pdo->query($statement);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $min = $row['minimum_amount'];
        $max = $row['maximum_amount'];

        if($amount < $min){
            echo json_encode('Deposit amount can not be less than'.' '. $min);
        }elseif($amount > $max){
            echo json_encode('Deposit amount can not be more than'. ' '. $max);
        } else{
            echo json_encode('OKKK');
        }


        
        
        
    }

    // echo json_encode($_POST);






// $status=1;
// include('config.php');
// session_start();
// date_default_timezone_set('Asia/Dhaka');
// $date=date("yy-m-d");

// //check for duplicate
// $statement16 = $pdo->prepare("SELECT * FROM tbl_deposit WHERE transection_number=?");
// $statement16->execute(array($_POST['transection_number']));
// $result16 = $statement16->fetchAll(PDO::FETCH_ASSOC);
// $unique = $statement16->rowCount();
// if(($_POST['amount']<300) and ($unique > 0)){
//     $status=0;
//     echo json_encode(array("statues"=>"<div role='alert' class='alert alert-danger'>
//                                             <strong>Deposit with this transaction number is already posted.</strong><br>
//                                            <strong>Deposit amount can not be less than 300tk.</strong>
//                                         </div>"));
// }

// else if($unique > 0){
//     $status=0;
//     echo json_encode(array("statues"=>"<div role='alert' class='alert alert-danger'>
//                                             <strong>Deposit with this transaction number is already posted.</strong>
//                                         </div>"));
// }

// else if($_POST['amount']<300){
//     $status=0;
//     echo json_encode(array("statues"=>"<div role='alert' class='alert alert-danger'>
//                                             <strong>Deposit amount can not be less than 300tk.</strong>
//                                         </div>"));
// }


// if($status==1){
//     //deposit
//     $a="0";
//     $statement166 = $pdo->prepare("SELECT *
//                                 FROM tbl_payment WHERE number=?");
//     $statement166->execute(array($_POST['sellist1']));
//     $result166 = $statement166->fetchAll(PDO::FETCH_ASSOC);
//     foreach ($result166 as $row166) {
//         $ms=$row166['method'];
//     }
//     $statement = $pdo->prepare("INSERT INTO tbl_deposit (request_by,deposit_to, deposit_by, method, amount, transection_number, date, status) VALUES (?,?,?,?,?,?,?,?)");
//     $statement->execute(array($_SESSION['user']['user_id'],$_POST['to'],$_POST['from'],$ms,$_POST['amount'],$_POST['transection_number'],$date,$a));
    
//     echo json_encode(array("statues"=>"<div role='alert' class='alert alert-success'>
//                                             <strong>Your deposit has been successfully requested!.</strong>
//                                         </div>"));
// }
?>