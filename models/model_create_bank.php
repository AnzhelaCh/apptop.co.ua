<?php

function insert_data_array($table,$array){
    $query=build_insert_query($table,$array);
    execute_query($query);

}

function get_data($userId){
    $query="SELECT * FROM `banks` WHERE `user_id` = '$userId'";
    return execute_select_query($query);

};

?>