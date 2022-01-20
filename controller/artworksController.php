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

function getArtworkById()
{
    if (isset($_REQUEST["id"])) {
        $id = $_REQUEST["id"];
        $work =  getOneArtwork($id);
        if (isset($work) && $work !== null) {
            //show correct array
            $work = $work[0];
            require_once(VIEWS . "artworks/artworkPurchase.php");
        }
    } else {
        error("invalid id");
    }
}

function error($errorMsg)
{
    require(VIEWS . "error/error.php");
}

function purchaseArtwork()
{
    if (isset($_REQUEST["id"])) {
        $id = $_REQUEST["id"];
        $purchase =  purchased($id);
        print_r($purchase);
        if ($purchase) {
            $purchaseMsg = "Your purchase has been completed!";
            require_once(VIEWS . "artworks/artworkPurchase.php");
        }
    } else {
        error("invalid id");
    }
}
