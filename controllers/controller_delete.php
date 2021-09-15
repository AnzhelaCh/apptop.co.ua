<?php
require('models/model_delete.php');
$id =$_GET['id'];

delete_data('banks',['id'=>$id]);

header('Location:viewBankList');
?>