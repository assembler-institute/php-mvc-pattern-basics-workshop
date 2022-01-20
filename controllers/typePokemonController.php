<?php

require_once MODELS . "typePokemonModel.php";

$action = "";

if(isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
}

if(function_exists($action)) {
    call_user_func($action, $_REQUEST);
} else {
    error("No encuentra la funcion");
}

/* This function includes the all model types */
function getAllTypes() {
    $types = getTypes();
    if(isset($types)) {
        require_once VIEWS . "types/types.php";
    } else {
        error("Error database");
    }
}

/* This function includes the error view with a message */
function error($errorMsg) {
    require_once VIEWS . "/error/error.php";
}