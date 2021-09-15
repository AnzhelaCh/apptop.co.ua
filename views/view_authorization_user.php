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
            <form action="action_insert_user" method="post" id="validationForm" enctype='multipart/form-data'>
                <input type="text" class="form-control" name="login" id="login" minlength="5" maxlength="100" placeholder="Enter login" required>
                <input type="text" class="form-control mt-2" name="name" minlength="5" maxlength="100" id="name" placeholder="Enter your name" required>
                <input type="password" class="form-control mt-2" name="password" minlength="6" maxlength="100" id="password" placeholder="Enter password" required>
                <button class="btn btn-success mt-2" type="submit" id="register">Register</button>
            </form>
        </div>
        <div class="authorization col-6">
            <h1>Authorization form</h1>
            <form action="action_check_user" method="post" enctype='multipart/form-data'>
                <input type="text" class="form-control" name="login" id="login" placeholder="Enter login" required>
                <input type="password" class="form-control mt-2" name="password" id="password" placeholder="Enter password" required>
                <button class="btn btn-success mt-2" type="submit">Authorization</button>
            </form>
        </div>
    </div>
    <?php
    else:
        require ("views/view_nav.php");
    ?>
    <?php
    endif;
    ?>

