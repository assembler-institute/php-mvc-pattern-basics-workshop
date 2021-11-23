<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ./");
    exit;
}

require_once MODELS . "salaryModel.php";

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
function getAllSalaries()
{
    $salaries = get();

    if(isset($salaries)) {
        require_once VIEWS . "/salary/salaryDashboard.php";
    } else {
        error("There is problem with database");
    }
}

function getSalary()
{
    $action = $_GET["action"];
    $salary = null;
    if (isset($_GET["id"])) {
        $salary = getById($_GET["id"]);
    }
    require_once VIEWS . "/salary/salary.php";
}

function deleteSalary()
{
    $action = $_GET["action"];
    $employee = null;
    if (isset($_GET["id"])) {
        $employee = delete($_GET["id"]);
        header("Location: ?controller=salary&action=getAllSalaries");
    }
}

function createSalary()
{
    $action = $_GET["action"];
    $salary = create($_POST);

    if (isset($salary)) {
         header("Location: ?controller=employee&action=getAllEmployees");
    }
    require_once VIEWS . "/salary/salary.php";
}

function updateSalary() {
    $action = $_GET["action"];
    $salary = update($_POST);

    if (isset($salary)) {
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
