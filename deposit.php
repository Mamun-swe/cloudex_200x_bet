<?php 
    include('config.php');
    session_start();

    if(isset($_POST)){
        $user = $_SESSION['user']['user_id'];
        $reciver_num = $_POST['to'];
        $sender_numb = $_POST['from'];
        $method = $_POST['sellist1'];
        $amount = $_POST['amount'];
        
        
        $transection_num = $_POST['transection_number'];
        $date = date("Y-m-d");
        $status = 0;

        $statement = "SELECT * FROM tbl_deposite_limit ORDER BY id DESC LIMIT 1";
        $stmt =  $pdo->query($statement);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $min = $row['minimum_amount'];
        $max = $row['maximum_amount'];

        if($amount < $min){
            $response = 'Deposit amount can not be less than'.' '. $min;
        }elseif($amount > $max){
            $response = 'Deposit amount can not be more than'. ' '. $max;
        } else{
            $statement = $pdo->prepare("INSERT INTO tbl_deposit (request_by, deposit_to, deposit_by, method, amount, transection_number, date, status) VALUES (?,?,?,?,?,?,?,?)");
                $statement->execute(array(
                    $user,
                    $reciver_num, 
                    $sender_numb, 
                    $method, 
                    $amount,
                    $transection_num, 
                    $date, 
                    $status
                ));
            $response ='Your deposite request is pending ...';
        }
        echo json_encode($response);
    }

?>