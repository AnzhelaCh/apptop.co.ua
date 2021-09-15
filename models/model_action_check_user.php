<?php
function get_user_data($login,$password){

    $query="SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password' ";

    return execute_select_query($query);
}

function get_data($userId){
    $query="SELECT * FROM `banks` WHERE `user_id` = '$userId'";
    return execute_select_query($query);

};
?>