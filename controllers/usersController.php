<?php

require_once MODELS . "usersModel.php";

//OBTAIN THE ACCION PASSED IN THE URL AND EXECUTE IT AS A FUNCTION

//Keep in mind that the function to be executed has to be one of the ones declared in this controller
// TODO Implement the logic
$action = "";

if (isset($_GET["action"])) {
    $action = $_GET["action"];
}

if (function_exists($action)) {
    call_user_func($action);
} else {
    error("Action no autorized");
}

/* ~~~ CONTROLLER FUNCTIONS ~~~ */

/**
 * This function calls the corresponding model function and includes the corresponding view
 */
function getAllUsers()
{
    $users = get();
    if (isset($users)) {
        require_once VIEWS . "/users/usersDashboard.php";
    } else {
        error("Database error connection");
    }
}

/**
 * This function calls the corresponding model function and includes the corresponding view
 */
function getEmployee($request)
{
    //
}

/**
 * This function includes the error view with a message
 */
function error($errorMsg)
{
    require_once VIEWS . "/error/error.php";
}
