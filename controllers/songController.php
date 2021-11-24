<?php

require_once MODELS.'songModel.php';

$action = "";

if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
}

if (function_exists($action)) {
    call_user_func($action, $_REQUEST);
} else {
    error("Invalid user action");
}

function getAllSongs(){
    $songs = get();

    if(isset($songs)){
        require_once VIEWS.'song/songDashboard.php';
    }else{
        error('There is a database error,try again');
    }
}


function getSong($request)
{
    $action = $request["action"];
    $song = null;
    if (isset($request["id"])) {
        $song = getById($request["id"]);
    }
    $albums = getAllAlbumsSongs();
    require_once VIEWS . "/song/song.php";
}

function createSong($request)
{
    $action = $request["action"];
    if (sizeof($_POST) > 0) {
        $song = create($_POST);

        if ($song[0]) {
            header("Location: index.php?controller=song&action=getAllSongs");
        } else {
            echo $song[1];
        }
    } else {
        $albums = getAllAlbumsSongs();
        $singers = getAllSingersSong();
        //print_r($albums);die();
        require_once VIEWS . "/song/song.php";
    }
}

function updateSong($request){
    $action = $request["action"];
    if (sizeof($_POST) > 0) {
        $song = update($_POST);

        if ($song[0]) {
            //echo "hola";
            header("Location: index.php?controller=song&action=getAllSongs");
        } else {
            $song = $_POST;
            $error = "The data entered is incorrect.";
            require_once VIEWS . "/song/song.php";
        }
    } else {
        require_once VIEWS . "/song/song.php";
    }
}

function deleteSong($request){
    $action = $request["action"];
    $song = null;
    if (isset($request["id"])) {
        $song = delete($request["id"]);
        header("Location: index.php?controller=song&action=getAllSongs");
    }
}

function error($errorMsg)
{
    require_once VIEWS . "/error/error.php";
}