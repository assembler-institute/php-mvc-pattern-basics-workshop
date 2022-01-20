<?php
require_once MODELS . "classModel.php";
// require_once CONTROLLERS . "brawlController.php";
// echo "pepe";
$seeBrawl = "";

if (isset($_REQUEST["seeBrawl"])) {
    $seeBrawl = $_REQUEST["seeBrawl"];
}

if (function_exists($seeBrawl)) {
    call_user_func($seeBrawl, $_REQUEST);
} else {
    // error("Invalid user action");
    $errorMsg= "Invalid user actiosn";
    require_once VIEWS . "/error/error.php";
}

function checkRarity(){
    // DBCREATED();
    $BRAWLS = show();
    if (isset($BRAWLS)) {
        require_once VIEWS . "/class/classBrawl.php";
    } else {
        $errorMsg= "There is a database error, try again";
        require_once VIEWS . "/error/error.php";
    }
}

function checkClass(){
    $BRAWLS=showClass();
    if(isset($BRAWLS)){
        require_once VIEWS . "/class/clasrBrawl.php";
    }else{
        $errorMsg= "There is a database error, try again";
        require_once VIEWS . "/error/error.php";
    }
}
// function error($errorMsg)
// {
// }
