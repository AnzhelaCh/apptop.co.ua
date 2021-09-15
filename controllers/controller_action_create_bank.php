<?php
require('models/model_create_bank.php');

$bankName = filter_var(trim($_POST['bankName']),FILTER_SANITIZE_STRING);
$interestRate = filter_var(trim($_POST['interestRate']),FILTER_SANITIZE_STRING);
$maxLoan = filter_var(trim($_POST['maxLoan']),FILTER_SANITIZE_STRING);
$minLoan = filter_var(trim($_POST['minLoan']),FILTER_SANITIZE_STRING);
$loanTerm = filter_var(trim($_POST['loanTerm']),FILTER_SANITIZE_STRING);
$userId = $_COOKIE['userId'];

$send = insert_data_array('banks',['user_id'=>$userId,
    'bankName'=>$bankName,
    'interestRate'=>$interestRate,
    'maxLoan'=>$maxLoan,
    'minLoan'=>$minLoan,
    'loanTerm'=>$loanTerm
]);

$result = get_data($userId);

setcookie('userBanks', json_encode($result), time() - 3600, "/");

setcookie('userBanks', json_encode($result), time()+6000*24);

if(!empty($_COOKIE['userBanks'])){
    $data = json_decode($_COOKIE['userBanks'], true);
}else{

    $data = $result;

}

setcookie ( "success", "Data saved", time() + 2, "/");

header('Location:authorization');
?>