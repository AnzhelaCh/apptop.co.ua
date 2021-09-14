<?php
$login = filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']),FILTER_SANITIZE_STRING);


$password = md5($password);
$mysql = new mysqli('localhost','root','','register');

$result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password' ");


$user = $result->fetch_assoc();


if(empty($user) ){
    echo "User is not found!";
    exit();
}

setcookie ( "user", $user['name'], time() + 6000, "/");
setcookie ( "userId", $user['id'], time() + 6000, "/");

$mysql->close();

header('Location: /');

?>


