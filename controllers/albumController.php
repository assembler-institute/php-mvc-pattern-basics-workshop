<?php

require_once MODELS.'albumModel.php';

$action = "";

if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
}

if (function_exists($action)) {
    call_user_func($action, $_REQUEST);
} else {
    error("Invalid user action");
}

function getAllAlbums(){
    $albums = get();

    if(isset($albums)){
        require_once VIEWS.'album/albumDashboard.php';
    }else{
        error('There is a database error,try again');
    }
}

function getAlbum($request)
{
    $action = $request["action"];
    $album = null;
    if (isset($request["id"])) {
        $album = getById($request["id"]);
    }
    $singers = getAllSingersAlbum();
    require_once VIEWS . "/album/album.php";
}

function createAlbum($request)
{
    $action = $request["action"];
    if (sizeof($_POST) > 0) {
        $album = create($_POST);

        if ($album[0]) {
            header("Location: index.php?controller=album&action=getAllAlbums");
        } else {
            echo $album[1];
        }
    } else {
        $singers = getAllSingersAlbum();
        require_once VIEWS . "/album/album.php";
    }
}

function updateAlbum($request){
    $action = $request["action"];
    if (sizeof($_POST) > 0) {
        $album = update($_POST);
       /*  print_r($album);
        die(); */
        if ($album[0]) {
            //echo "hola";
            header("Location: index.php?controller=album&action=getAllAlbums");
        } else {
            $album = $_POST;
            $error = "The data entered is incorrect.";
            require_once VIEWS . "/album/album.php";
        }
    } else {
        require_once VIEWS . "/album/album.php";
    }
}


function deleteAlbum($request){
    $action = $request["action"];
    $album = null;
    if (isset($request["id"])) {
        $album = delete($request["id"]);
        header("Location: index.php?controller=album&action=getAllAlbums");
    }
}

function error($errorMsg)
{
    require_once VIEWS . "/error/error.php";
}