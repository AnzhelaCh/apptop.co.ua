<?php
require('models/model_editBankPage.php');
$userId = $_COOKIE['userId'];
$resultInfo = get_data($userId);

$data = $resultInfo;
require('views/view_editBankPage.php');
?>