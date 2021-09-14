<?php
$bankName = filter_var(trim($_POST['bankName']),FILTER_SANITIZE_STRING);
$interestRate = filter_var(trim($_POST['interestRate']),FILTER_SANITIZE_STRING);
$maxLoan = filter_var(trim($_POST['maxLoan']),FILTER_SANITIZE_STRING);
$minLoan = filter_var(trim($_POST['minLoan']),FILTER_SANITIZE_STRING);
$loanTerm = filter_var(trim($_POST['loanTerm']),FILTER_SANITIZE_STRING);
$userId = $_COOKIE['userId'];

$mysql = new mysqli('localhost','root','','register');


$send = $mysql->query("INSERT INTO `banks` (`user_id`,`bankName`,`interestRate`,`maxLoan`,`minLoan`,`loanTerm`)
VALUES ('$userId', '$bankName', '$interestRate', '$maxLoan', '$minLoan', '$loanTerm')");


if($send == true){
    setcookie ( "success", "Data saved", time() + 2, "/");
    header('Location: /');
    $mysql->close();

}else{
    setcookie ( "success", "Data are not saved!Try again!", time() + 2, "/");
}


?>