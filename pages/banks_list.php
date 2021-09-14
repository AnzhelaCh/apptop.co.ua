<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bank List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="/styles/style.css">
</head>
<body>
<?php
$userId = $_COOKIE['userId'];

$mysql = new mysqli('localhost','root','','register');


$dataList = $mysql->query("SELECT * FROM `banks` WHERE `user_id` = '$userId'");
$result = $dataList->fetch_all();

if(empty($result)){
    echo "Don't have info!Please, create.";
    exit();

}
setcookie('userBanks', json_encode($result), time()+6000);
if(!empty($_COOKIE['userBanks'])){

    $data = json_decode($_COOKIE['userBanks'], true);
}else{

    $data = $result;

}


$mysql->close();

?>


</body>
</html>

