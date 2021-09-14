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
<div class="container">
    <?php
    if(!empty($_COOKIE["success"])):
    ?>
    <div class="success" id="success">
        <svg id="close" width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect width="35" height="35" fill="white"/>
            <path d="M21.6113 12.5373L12.5368 21.6118" stroke="#7A7C7E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M12.5371 12.5373L21.6116 21.6118" stroke="#7A7C7E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>

        <?php echo $_COOKIE["success"] ?>
    </div>
    <?php endif;?>
    <?php
    if(empty($_COOKIE['user'])):
    ?>
    <div class="row">
        <div class="registrationWrapper col-6">
            <h1>Registration form</h1>
            <form action="validationForm/check.php" method="post" id="validationForm">
                <input type="text" class="form-control" name="login" id="login" minlength="5" maxlength="100" placeholder="Enter login" required>
                <input type="text" class="form-control mt-2" name="name" minlength="5" maxlength="100" id="name" placeholder="Enter your name" required>
                <input type="password" class="form-control mt-2" name="password" minlength="6" maxlength="100" id="password" placeholder="Enter password" required>
                <button class="btn btn-success mt-2" type="submit" id="register">Register</button>
            </form>
        </div>
        <div class="authorization col-6">
            <h1>Authorization form</h1>
            <form action="validationForm/auth.php" method="post">
                <input type="text" class="form-control" name="login" id="login" placeholder="Enter login" required>
                <input type="password" class="form-control mt-2" name="password" id="password" placeholder="Enter password" required>
                <button class="btn btn-success mt-2" type="submit">Authorization</button>
            </form>
        </div>
    </div>
    <?php
    else:
    ?>
    <div class="wrapper">
        <div class="sticky">
            <p>Welcome, <?php echo $_COOKIE['user'] ?> . <a href="./validationForm/exit.php">Log out</a> </p>
            <details>
                <summary class="btn btn-primary" id="create_bank">Create bank</summary>
                <?php
               require('./pages/create_bank_form.php');
                ?>
            </details>
            <a href="/pages/calculator.php" class="btn btn-info mt-3">Calculator</a>
            <?php

                require('./pages/banks_list.php');

            if(!empty($data)){
                ?>

                <ul class="listWrapper list-group">
                    <?php
                    foreach ($data as $value) {
                        ?>
                        <li><?php echo "
                        <h4 class='list-group-item active mt-4 d-flex justify-content-between'>{$value[2]} 
                        <div>
                         <a href='pages/editPage.php?id=$value[0]' class='link-warning'>Edit</a>
                        <a href='validationForm/delete.php?id=$value[0]' class='link-danger'>Delete</a>
                       </div>
                  
                        </h4> 
                        <p class='list-group-item mt-3'>Rate: {$value[3]}</p>
                        <p class='list-group-item mt-3'>Max Loan: {$value[4]}</p>
                        <p class='list-group-item mt-3'>Min Loan: {$value[5]}</p>
                        <p class='list-group-item mt-3'>Loan Term: {$value[6]}</p>
                           "; ?></li>

                        <?php

                    }
                    ?>
                </ul>
                <?php
            }


            ?>
        </div>

    </div>
    <?php
    endif;
    ?>
</div>

<script src="js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>