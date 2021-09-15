<?php
session_start();
require('db_script.php');

function load_page(){
    $page=getPage();
    routing($page);
}

function getPage(){
    $result= 'authorization';
    $array=explode('/',$_SERVER['REQUEST_URI']);
    $page=array_pop($array);

    if($page != null) {
        $array=explode('?',$page);
        $result=array_shift($array);
    }
    return $result;
}

function routing($page){
    switch($page) {
        case "authorization":
            $controller="controller_authorization.php";

            break;

            case "action_insert_user":
            $controller="controller_action_insert_user.php";
            break;

            case "action_check_user":
            $controller="controller_action_check_user.php";
            break;

            case "exit":
            $controller="controller_exit.php";
            break;

            case "createBank":
            $controller="controller_createBank.php";
            break;

        case "action_create_bank":
            $controller="controller_action_create_bank.php";
            break;

        case "calculator":
            $controller="controller_calculator.php";
            break;

        case "viewBankList":
            $controller="controller_viewBankList.php";
            break;

        case "editPage":
            $controller="controller_editPage.php";
            break;

        case "action_edit":
            $controller="controller_action_edit.php";
            break;

        case "delete":
            $controller="controller_delete.php";
            break;


    }
    require ("views/template_view.php");
}


?>