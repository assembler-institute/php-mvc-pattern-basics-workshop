<?php
require_once MODELS . "artistsModel.php";

$action = "";

if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
}
if (function_exists($action)) {
    call_user_func($action);
} else {
    error("There was an error executing trying to search the action, please, try again");
}
//CONTROLLER FUNCTIONS
function getAllArtists()
{
    //calling function in model
    $artists = get();
    if (isset($artists)) {
        require_once VIEWS . "artists/artists.php";
    }
}

function getInfo()
{
    if (isset($_REQUEST["id"])) {
        $id = $_REQUEST["id"];
        $info = getInformationArtist($id);
        if (isset($info) && $info !== []) {
            $info = $info[0];
            require_once VIEWS . "artists/artistInfo.php";
        } else {
            error("This user don't have information");
        }
    } else {
        error("invalid ID");
    }
}

function error($errorMsg)
{
    return require_once(VIEWS . "error/error.php");
}
