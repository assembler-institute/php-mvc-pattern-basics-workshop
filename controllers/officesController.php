<?php

require_once MODELS . "officesModel.php";

$action = "";

if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
}

if (function_exists($action)) {
    call_user_func($action, $_REQUEST);
} else {
    error("Invalid user action");
}

function getAllOffices()
{

    $offices = get();
    if (isset($offices)) {
        require_once VIEWS . "/offices/officesDashboard.php";
    } else {
        error("There is a database error, try again.");
    }
}

function getOffice($request)
{
    $action = $request["action"];
    $office = null;
    if (isset($request["officeId"])) {
        $office = getById($request["officeId"]);
    }
    require_once VIEWS . "/offices/offices.php";
}

function createOffice($request)
{
    $action = $request["action"];
    if (sizeof($_POST) > 0) {
        $office = create($_POST);

        if ($office[0]) {
            header("Location: index.php?controller=offices&action=getAllOffices");
        } else {
            echo $office[1];
        }
    } else {
        require_once VIEWS . "/offices/offices.php";
    }
}

function updateOffice($request)
{
    $action = $request["action"];
    if (sizeof($_POST) > 0) {
        $office = update($_POST);

        if ($office[0]) {
            header("Location: index.php?controller=offices&action=getAllOffices");
        } else {
            $office = $_POST;
            $error = "The data entered is incorrect.";
            require_once VIEWS . "/offices/offices.php";
        }
    } else {
        require_once VIEWS . "/offices/offices.php";
    }
}

function deleteOffice($request)
{
    $action = $request["action"];
    $officee = null;
    if (isset($request["officeId"])) {
        $officee = delete($request["officeId"]);
        header("Location: index.php?controller=offices&action=getAllOffices");
    }
}


function error($errorMsg)
{
    require_once VIEWS . "/error/error.php";
}
