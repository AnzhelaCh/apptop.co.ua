<?php
$id =$_GET['id'];
//
$bankName = filter_var(trim($_POST['bankName']),FILTER_SANITIZE_STRING);
$interestRate = filter_var(trim($_POST['interestRate']),FILTER_SANITIZE_STRING);
$maxLoanEdit = filter_var(trim($_POST['maxLoan']),FILTER_SANITIZE_STRING);
$minLoanEdit = filter_var(trim($_POST['minLoan']),FILTER_SANITIZE_STRING);
$loanTermEdit = filter_var(trim($_POST['loanTerm']),FILTER_SANITIZE_STRING);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "register";


$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE banks SET bankName='$bankName',interestRate='$interestRate',maxLoan='$maxLoanEdit',minLoan='$minLoanEdit',loanTerm='$loanTermEdit' WHERE id=$id";

if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
header('Location: /');
?>