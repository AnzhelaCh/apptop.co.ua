<?php
function get_data($userId){
    $query="SELECT * FROM `banks` WHERE `user_id` = '$userId'";
    return execute_select_query($query);

};
function update_data($bankName,$interestRate,$maxLoanEdit,$minLoanEdit,$loanTermEdit,$id){
    $query="UPDATE banks SET bankName='$bankName',interestRate='$interestRate',maxLoan='$maxLoanEdit',minLoan='$minLoanEdit',loanTerm='$loanTermEdit' WHERE id='$id' ";
    execute_query($query);

}

?>