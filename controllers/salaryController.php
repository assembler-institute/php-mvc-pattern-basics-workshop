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
        header("Location: index.php?controller=salary&action=getAllSalaries");
    }
}

function createSalary()
{
    $action = $_GET["action"];
    require_once VIEWS . "/salary/salary.php";
    // if (isset($_POST)) {
    //      $employee = create($_POST);
    //      header("Location: index.php?controller=employee&action=getAllEmployees");
    // }
    $salary = create($_POST);
}

function updateSalary() {
    $action = $_GET["action"];
    var_dump($_POST);
    $salary = update($_POST);

    require_once VIEWS . "/salary/salary.php";
}


/**
 * This function includes the error view with a message
 */
function error($errorMsg)
{
    require_once VIEWS . "/error/error.php";
}
