<?php
require('models/model_viewBankList.php');
$userId = $_COOKIE['userId'];
$resultInfo = get_data($userId);

if(empty($resultInfo)){
    echo "Don't have info!Please, create.<br><a href='createBank'>Go to create Bank</a>";
   exit();
}

$data = $resultInfo;



require('views/view_viewBankList.php');
?>