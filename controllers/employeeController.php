<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ./");
    exit;
}

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
 * These functions calls the corresponding model functions and includes the corresponding views
 */
function getAllEmployees()
{
    $employees = get();

    if(isset($employees)) {
        require_once VIEWS . "/employee/employeeDashboard.php";
    } else {
        error("There is problem with database");
    }
}

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
        header("Location: ?controller=employee&action=getAllEmployees");
    }
}

function createEmployee()
{
    $action = $_GET["action"];
    $employee = create($_POST);
    if (isset($employee)) {
         header("Location: ?controller=employee&action=getAllEmployees");
    }
    require_once VIEWS . "/employee/employee.php";
}

function updateEmployee() {
    $action = $_GET["action"];
    $employee = update($_POST);
    if (isset($employee)) {
        header("Location: ?controller=employee&action=getAllEmployees");
    }
}


/**
 * This function includes the error view with a message
 */
function error($errorMsg)
{
    require_once VIEWS . "/error/error.php";
}
