<?php
$login = filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']),FILTER_SANITIZE_STRING);
$name = filter_var(trim($_POST['name']),FILTER_SANITIZE_STRING);

$password = md5($password);
$mysql = new mysqli('localhost','root','','register');

$send = $mysql->query("INSERT INTO `users` (`login`,`password`,`name`)
VALUES ('$login', '$password', '$name')");

if($send == true){
    setcookie ( "success", "You are registered! Please, log in.", time() + 5, "/");
}else{
    setcookie ( "success", "You are not registered!Try again!", time() + 5, "/");
}

$mysql->close();

header('Location: /');

?>