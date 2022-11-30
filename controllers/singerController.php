<?php

require_once MODELS.'singerModel.php';

$action = "";

if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
}

if (function_exists($action)) {
    call_user_func($action, $_REQUEST);
} else {
    error("Invalid user action");
}

function getAllSingers(){
    $singers = get();

    if(isset($singers)){
        require_once VIEWS.'singer/singerDashboard.php';
    }else{
        error('There is a database error,try again');
    }
}

function getSinger($request)
{
    $action = $request["action"];
    $singer = null;
    if (isset($request["id"])) {
        $singer = getById($request["id"]);
    }
    require_once VIEWS . "/singer/singer.php";
}

function getSongSinger($request){
    $action = $request["action"];
    $songs = null;
    if (isset($request["id"])) {
        $songs = getSongs($request["id"]);
    }
    require_once VIEWS . "/songsSinger/songsSingerDashboard.php";
}

function createSinger($request)
{
    $action = $request["action"];
    if (sizeof($_POST) > 0) {
        $singer = create($_POST);

        if ($singer[0]) {
            header("Location: index.php?controller=employee&action=getAllEmployees");
        } else {
            echo $singer[1];
        }
    } else {
        require_once VIEWS . "/singer/singer.php";
    }
}

function updateSinger($request){
    $action = $request["action"];
    if (sizeof($_POST) > 0) {
        $singer = update($_POST);

        if ($singer[0]) {
            //echo "hola";
            header("Location: index.php?controller=singer&action=getAllSingers");
        } else {
            $singer = $_POST;
            $error = "The data entered is incorrect, check that there is no other employee with that email.";
            require_once VIEWS . "/singer/singer.php";
        }
    } else {
        require_once VIEWS . "/singer/singer.php";
    }
}

function deleteSinger($request){
    $action = $request["action"];
    $singer = null;
    if (isset($request["id"])) {
        $singer = delete($request["id"]);
        header("Location: index.php?controller=employee&action=getAllEmployees");
    }
}

function error($errorMsg)
{
    require_once VIEWS . "/error/error.php";
}