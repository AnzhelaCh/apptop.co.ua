<?php
function execute_query($query){
    $connection=mysqli_connect('localhost','root','','register');

    $result=mysqli_query($connection,$query);

    if ($result==false) {
        echo mysqli_error($connection);
    }

    mysqli_close($connection);

    return $result;
}


function execute_select_query($query){

    $result=execute_query($query);

    if (mysqli_num_rows($result)>0){

        while($row=mysqli_fetch_assoc($result)) {
            $rows[]=$row;
        }
        return $rows;
    }
    else {
        return null;
    }

}



function build_insert_query($table,$parameters){

    $columns_sql ='';
    $values_sql  ='';
    $coma        =',';


    foreach($parameters as $col=>$value) {
        if (!empty($value) || $value!=null) {
            if(is_array($value)) {
                foreach($value as $co=>$val) {
                    $key=$col;
                    $columns_sql.=$key.$coma ;
                    $values_sql.="'".$val."'".$coma ;
                }
            }else {
                $columns_sql.=$col.$coma ;
                $values_sql.="'".$value."'".$coma ;
            }
        }
    }

    $columns_sql=rtrim($columns_sql,$coma);
    $values_sql =rtrim($values_sql,$coma);

    return "INSERT  INTO $table ($columns_sql)
					VALUES ($values_sql)";

}

function build_delete_query($table,$where=''){

    $where_sql='';

    if ($where){
        $and=' and';

        foreach($where as $key=>$value){
            $where_sql.=" $key='$value' $and";
        }

        $where_sql =rtrim($where_sql,$and);

        $where_sql=' WHERE '.$where_sql;
    }


    return "DELETE FROM $table $where_sql";
}



?>