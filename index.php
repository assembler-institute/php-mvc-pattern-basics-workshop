<?php

// This is the entry point of your application, all your application must be executed in
// the "index.php", in such a way that you must include the controller passed by the URL
// dynamically so that it ends up including the view.

include_once "config/constants.php";
include_once "config/db.php";
// TODO Implement the logic to include the controller passed by the URL dynamically
// In the event that the controller passed by URL does not exist, you must show the error view.

//Check if controller exist, if not we calling man.php
if(isset($_GET["controller"])){
    //Get the path controller
    $controller = getControllerPath($_GET["controller"]);

    //Check if the file controller exists, if not we show an error message
    $controllerExists = file_exists($controller);
    if($controllerExists){
        require_once $controller;
    }else{
        $error = "You are trying to access to a page that it doesnt exists";
        require_once VIEWS . "error/error.php";
    }
}else{
    require_once VIEWS . "main/main.php";
}

//Return the path of the controller specified in URL
function getControllerPath($controller){
    return CONTROLLERS . $controller . "Controller.php";
}