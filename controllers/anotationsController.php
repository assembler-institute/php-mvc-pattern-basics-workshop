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
        $userId = $_GET["id"];
        $anotations = getById($userId);

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
function formCreateAnotations()
{
    isset($_GET["anotationId"]) ? $anotionId = $_GET["anotationId"] : null;
    isset($_GET["id"]) ? $userId = $_GET["id"] : null;
    $subjects = getSubjects();
    require_once VIEWS . "/anotations/formcreateanotations.php";
}
function createAnotations()
{
    if (sizeof($_POST) > 0) {
        $anotation = create($_POST);

        if ($anotation[0]) {
            header("Location: index.php?controller=anotations&action=getAnotationsById&id=" . $anotation['anotations_user_id'] . "&name=" . $anotation['name']);
        } else {
            echo $anotation[1];
        }
    } else {
        require_once VIEWS . "/users/formcreateuser.php";
    }
}
