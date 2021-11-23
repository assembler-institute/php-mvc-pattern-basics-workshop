<?php

require_once MODELS . "signupModel.php";

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

/**
 * This function calls the corresponding model function and includes the corresponding view
 */
function viewSignup() {
    require_once VIEWS . "signup/signupDashboard.php";
}

function createUser()
{
    $action = $_GET["action"];
    $user = create($_POST);

    if (isset($user)) {
         header("Location: ?controller=login&action=viewLogin");
    }
}


/**
 * This function includes the error view with a message
 */
function error($errorMsg)
{
    require_once VIEWS . "/error/error.php";
}

