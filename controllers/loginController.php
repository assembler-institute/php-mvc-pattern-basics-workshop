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

/**
 * This function calls the corresponding model function and includes the corresponding view
 */
function validateLogin()
{
    $validate = validate($_POST["username"], $_POST["password"]);

    if(isset($validate)) {
        session_start();
        $_SESSION["username"] = $_POST["username"];
        header("Location: ?controller=main&action=viewMain");
        exit;
    } else {
        error("There is problem with validation");
        require_once VIEWS . "login/loginDashboard.php";
    }
}

function logout() {
    session_start();
    unset($_SESSION['username']);
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            "",
            time() - 42000,
            $params["path"],
            $params["domain"],
            $params["secure"],
            $params["httpOnly"],
        );
    }

    session_destroy();
    header("Location: ?controller=login&action=viewLogin");
}

function viewLogin() {
    require_once VIEWS . "login/loginDashboard.php";
}


/**
 * This function includes the error view with a message
 */
function error($errorMsg)
{
    require_once VIEWS . "/error/error.php";
}

