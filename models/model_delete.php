<?php
function delete_data($table, $where = null){
    $query = build_delete_query($table, $where);
    execute_query($query);
}


?>