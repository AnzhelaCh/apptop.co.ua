<?php
require('models/model_action_insert_user.php');
$login = filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']),FILTER_SANITIZE_STRING);
$name = filter_var(trim($_POST['name']),FILTER_SANITIZE_STRING);

$password = md5($password);

$send = insert_data('users',['login'=>$login,
    'password'=>$password,
    'name'=>$name
]);


setcookie ( "success", "You are registered! Please, log in.", time() + 2, "/");


header('Location:authorization');
exit;
?>