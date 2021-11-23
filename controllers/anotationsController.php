<?php

require_once MODELS . "anotationsModel.php";

if (isset($_GET["action"])) {
    $action = $_GET["action"];
}

if (function_exists($action)) {
    call_user_func($action);
} else {
    error("Action no autorized");
}

function getAnotationsById()
{
    $anotations = [];
    if (isset($_GET["id"]) && isset($_GET["name"])) {
        $anotations = getById($_GET["id"]);
        $name = $_GET["name"];
    }
    require_once VIEWS . "/anotations/anotations.php";
}

function getAnotationsRanking()
{
    $anotations = getRanking();
    require_once VIEWS . "/anotations/anotationsRanking.php";
}


function error($errorMsg)
{
    require_once VIEWS . "/error/error.php";
}
