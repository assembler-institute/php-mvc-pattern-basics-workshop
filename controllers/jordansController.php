<?php

require_once MODELS . "jordansModel.php";

$action = "";

if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
}

if (function_exists($action)) {
    call_user_func($action, $_REQUEST);
} else {
    error("Invalid user action");
}

function getAllJordans()
{
    $jordans = get();
    if (isset($jordans)) {
        require_once VIEWS . "jordans/jordansDashboard.php";
    } else {
        error("There is a database error, try again.");
    }
}

function getJordan($request)
{
    $action = $request["action"];
    $jordan = null;
    if (isset($request["id"])) {
        $jordan = getById($request["id"]);
    }
    require_once VIEWS . "jordans/jordan.php";
}

function createJordan($request)
{
    $action = $request["action"];
    if (sizeof($_POST) > 0) {
        $jordan = create($_POST);

        if ($jordan[0]) {
            header("Location: index.php?controller=jordans&action=getAllJordans");
        } else {
            echo $jordan[1];
        }
    } else {
        require_once VIEWS . "/jordans/jordan.php";
    }
}

function updateJordans($request)
{
    $action = $request["action"];
    if (sizeof($_POST) > 0) {
        $jordan = update($_POST);

        if ($jordan[0]) {
            header("Location: index.php?controller=jordans&action=getAllJordans");
        } else {
            $jordan = $_POST;
            $error = "The data entered is incorrect";
            require_once VIEWS . "/jordans/jordan.php";
        }
    } else {
        require_once VIEWS . "/jordans/jordan.php";
    }
}

function deleteJordan($request)
{
    $action = $request["action"];
    $jordan = null;
    if (isset($request["id"])) {
        $jordan = delete($request["id"]);
        header("Location: index.php?controller=jordans&action=getAllJordans");
    }
}

/**
 * This function includes the error view with a message
 */
function error($errorMsg)
{
    require_once VIEWS . "/error/error.php";
}
