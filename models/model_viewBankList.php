<?php
function get_data($userId){
    $query="SELECT * FROM `banks` WHERE `user_id` = '$userId'";
    return execute_select_query($query);

};
?>