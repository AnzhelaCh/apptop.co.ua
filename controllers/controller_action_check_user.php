<?php
require('models/model_action_check_user.php');
$login = filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']),FILTER_SANITIZE_STRING);

$password = md5($password);

$result = get_user_data($login,$password);

$userId = $result[0]['id'];



$data = get_data($userId);


if(empty($result) ){
    echo "User is not found!";
    exit();
}

if(empty($data)){
    header('Location:createBank');
}else{
    setcookie('userBanks', json_encode($data), time()+6000*24);
}



if(!empty($_COOKIE['userBanks'])){
    $data = json_decode($_COOKIE['userBanks'], true);
}else{

    $data = $result;

}

setcookie ( "user", $result[0]['name'], time() + 6000 * 24, "/");
setcookie ( "userId", $result[0]['id'], time() + 6000 * 24, "/");


header('Location:authorization');


?>


