<?php
function insert_data($table,$array){
    $query=build_insert_query($table,$array);
    execute_query($query);

}


?>