<?php
require_once(MODELS . "artworksModel.php");

$action = "";

if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
    $functionExists = function_exists($action);
}
if ($functionExists) {
    call_user_func($action);
} else {
    error("We didn't found the action, please, try again");
}

function getArtworksByCat()
{
    if (isset($_REQUEST["catId"])) {
        $id = $_REQUEST["catId"];
        $artworks = getArtworks($id);
        if (isset($artworks) && $artworks !== null) {
            require_once(VIEWS . "artworks/artworks.php");
        }
    } else {
        error("null Id");
    }
}

function getAllCategories()
{
    $categories = getCategory();
    if (isset($categories)) {
        require_once(VIEWS . "artworks/categories.php");
    }
}

function error($errorMsg)
{
    require(VIEWS . "error/error.php");
}
