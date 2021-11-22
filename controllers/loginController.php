<?php

require_once MODELS . "loginModel.php";

$action = "";

if (isset($_GET["action"])) {
    $action = $_GET["action"];
}

if(function_exists($action))
{
    call_user_func($action, $_GET);
} else
{
    error("The function does not exist");
}



