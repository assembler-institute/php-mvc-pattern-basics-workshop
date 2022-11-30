<?php

require_once MODELS . "employeeModel.php";

$action = "";

if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
}

if (function_exists($action)) {
    call_user_func($action, $_REQUEST);
} else {
    error("Invalid user action");
}

/**
 * This function calls the corresponding model function and includes the corresponding view
 */
function getAllEmployees()
{
    $shoes = get();
    if (isset($shoes)) {
        require_once VIEWS . "/employee/employeeDashboard.php";
    } else {
        error("There is a database error, try again.");
    }
}

/**
 * This function calls the corresponding model function and includes the corresponding view
 */
function getEmployee($request)
{
    $action = $request["action"];
    $shoe = null;
    if (isset($request["id"])) {
        $shoe = getById($request["id"]);
    }
    require_once VIEWS . "/employee/employee.php";
}

function createEmployee($request)
{
    $action = $request["action"];
    if (sizeof($_POST) > 0) {
        $shoe = create($_POST);

        if ($shoe[0]) {
            header("Location: index.php?controller=employee&action=getAllEmployees");
        } else {
            echo $shoe[1];
        }
    } else {
        require_once VIEWS . "/employee/employee.php";
    }
}

function updateEmployee($request)
{
    $action = $request["action"];
    if (sizeof($_POST) > 0) {
        $shoe = update($_POST);

        if ($shoe[0]) {
            header("Location: index.php?controller=employee&action=getAllEmployees");
        } else {
            $shoe = $_POST;
            $error = "The data entered is incorrect";
            require_once VIEWS . "/employee/employee.php";
        }
    } else {
        require_once VIEWS . "/employee/employee.php";
    }
}

function deleteEmployee($request)
{
    $action = $request["action"];
    $shoe = null;
    if (isset($request["id"])) {
        $shoe = delete($request["id"]);
        header("Location: index.php?controller=employee&action=getAllEmployees");
    }
}

/**
 * This function includes the error view with a message
 */
function error($errorMsg)
{
    require_once VIEWS . "/error/error.php";
}
