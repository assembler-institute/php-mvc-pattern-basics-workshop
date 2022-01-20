<?php
require_once MODELS . "categoryModel.php";
$action = "";
if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
    $functionExist = function_exists($action);
}
if ($functionExist) {
    call_user_func($action);
} else {
    error("This action doesn't exists");
}

function error($errorMsg)
{
    require_once(VIEWS . "error/error.php");
}
