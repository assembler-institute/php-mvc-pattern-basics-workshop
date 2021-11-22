<?php

require_once MODELS . "employeeModel.php";

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
function getAllEmployees()
{
    // echo "We are inside the function getAllEmployees";
    $employees = get();

    if(isset($employees)) {
        require_once VIEWS . "/employee/employeeDashboard.php";
    } else {
        error("There is problem with database");
    }
}

/**
 * This function calls the corresponding model function and includes the corresponding view
 */
function getEmployee()
{
    $action = $_GET["action"];
    $employee = null;
    if (isset($_GET["id"])) {
        $employee = getById($_GET["id"]);
    }
    require_once VIEWS . "/employee/employee.php";
}

function deleteEmployee()
{
    $action = $_GET["action"];
    $employee = null;
    if (isset($_GET["id"])) {
        $employee = delete($_GET["id"]);
        header("Location: index.php?controller=employee&action=getAllEmployees");
    }
}

function createEmployee()
{
    $action = $_GET["action"];
    $employee = create();

    require_once VIEWS . "/employee/employee.php";
}

/**
 * This function includes the error view with a message
 */
function error($errorMsg)
{
    require_once VIEWS . "/error/error.php";
}
