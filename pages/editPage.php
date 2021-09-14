<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration form</title>
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



$data = $result;



$id =$_GET['id'];

if(!empty($data)){
    ?>
    <form action="/validationForm/edit.php?id=<?php echo $id ?>" method="post" class="col-6 listWrapper list-group d-flex flex-column">
        <?php

        foreach ($data as $value) {
            if($value[0] == $id){
                ?>
                <input type="text" class="form-control mt-3" name="bankName" id="bankName" placeholder="<?php echo $value[2] ?>">
                <input type="number" class="form-control mt-3" name="interestRate" id="interestRate" placeholder="<?php echo $value[3] ?>">
                <input type="number" class="form-control mt-3" name="maxLoan" id="maxLoanEdit" placeholder="<?php echo $value[4] ?>">
                <input type="number" class="form-control mt-3" name="minLoan" id="minLoanEdit" placeholder="<?php echo $value[5] ?>">
                <label  class="mt-3" for="loanTerm">Choose Loan term:</label>
                <select class="form-control" name="loanTerm" id="loanTermEdit">
                    <option value="12">12</option>
                    <option value="24">24</option>
                    <option value="36">36</option>
                    <option value="60">60</option>
                </select>
                <?php
            }
            ?>

            <?php

        }
        ?>
        <button class="btn btn-success mt-2" type="submit">Save</button>
    </form>
    <?php
}
?>
<script>
    let minLoanEdit = document.getElementById("minLoanEdit");
    let maxLoanEdit = document.getElementById("maxLoanEdit");
    maxLoanEdit.addEventListener("change",()=>{
        let maxLoanInfo = maxLoanEdit.value;
        minLoanEdit.innerHTML = `${maxLoanInfo*20/100}`;
        minLoanEdit.value = `${maxLoanInfo*20/100}`;

        minLoanEdit.setAttribute('value', `${maxLoanInfo*20/100}`);
    });
</script>
</body>
</html>
