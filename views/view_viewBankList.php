<?php
require ("views/view_nav.php");
if(!empty($data)){
    ?>

    <ul class="listWrapper list-group">
        <?php
        foreach ($data as $value) {

            ?>
            <li><?php echo "
                        <h4 class='list-group-item active mt-4 d-flex justify-content-between'>{$value["bankName"]}
                        <div>
                         <a href='editPage?id={$value["id"]}' class='link-warning'>Edit</a>
                        <a href='delete?id={$value["id"]}' class='link-danger'>Delete</a>
                       </div>

                        </h4>
                        <p class='list-group-item mt-3'>Rate: {$value["interestRate"]}</p>
                        <p class='list-group-item mt-3'>Max Loan: {$value["maxLoan"]}</p>
                        <p class='list-group-item mt-3'>Min Loan: {$value["minLoan"]}</p>
                        <p class='list-group-item mt-3'>Loan Term: {$value["loanTerm"]}</p>
                           "; ?></li>

            <?php

        }
        ?>
    </ul>
    <?php
}


?>