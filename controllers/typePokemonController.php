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

function getAllTypeByStrong() {
    if(isset($_REQUEST["nameTypeStrong"])) {
        $type = getTypeOneByName($_REQUEST["nameTypeStrong"]);
        $typesStrong = getTypesByStrong($type["id"]);
        echo json_encode($typesStrong);
    } else {
        return [];
    }
}

function getAllTypeByWear() {
    if(isset($_REQUEST["nameTypeWear"])) {
        $type = getTypeOneByName($_REQUEST["nameTypeWear"]);
        $typesWear = getTypesByWeak($type["id"]);
        echo json_encode($typesWear);
    } else {
        return [];
    }
}

/* This function includes the error view with a message */
function error($errorMsg) {
    require_once VIEWS . "/error/error.php";
}