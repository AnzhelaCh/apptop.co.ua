<?php
require('models/model_editBankPage.php');
$id =$_GET['id'];

$bankName = filter_var(trim($_POST['bankName']),FILTER_SANITIZE_STRING);
$interestRate = filter_var(trim($_POST['interestRate']),FILTER_SANITIZE_STRING);
$maxLoanEdit = filter_var(trim($_POST['maxLoan']),FILTER_SANITIZE_STRING);
$minLoanEdit = filter_var(trim($_POST['minLoan']),FILTER_SANITIZE_STRING);
$loanTermEdit = filter_var(trim($_POST['loanTerm']),FILTER_SANITIZE_STRING);


update_data($bankName,$interestRate,$maxLoanEdit,$minLoanEdit,$loanTermEdit,$id);

header("Location:viewBankList");
exit;
?>