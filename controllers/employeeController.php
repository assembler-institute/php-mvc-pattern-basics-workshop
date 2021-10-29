<?php
require_once MODELS . "employeeModel.php";

if (isset($_REQUEST["action"])) {
    function_exists($_REQUEST["action"])
        ? call_user_func($_REQUEST["action"], $_REQUEST)
        : error("action does not exist");
} else {
    error("action error");
}


function getAllEmployees()
{
    try {
        $employees = get();
        require_once VIEWS . "/employee/employeeDashboard.php";
    } catch (exception $e) {
        error($e->getMessage());
    }
}

/**
 * This function calls the corresponding model function and includes the corresponding view
 */
function getEmployee($request)
{
    if (isset($request["id"])) {

        $employee = getEmployeeById($request["id"]);
    } else {
        $employee = null;
    }
    require_once VIEWS . "/employee/employee.php";
}

function createEmployee($request)
{
    require_once MODELS . "employeeModel.php";
    if ($msg = newEmployee($request)) {
        header("Location: index.php?controller=employee&action=getAllEmployees&msg=$msg");
    } else {
        error("Parameter Error");
    }
}

function updateEmployee($request)
{
    if (isset($request["emp_id"])) {
        require_once MODELS . "employeeModel.php";
        if ($msg = updateEmployeeById($request)) {
            header("Location: index.php?controller=employee&action=getAllEmployees&msg=$msg");
        } else {
            error("Database connection error");
        }
    } else {
        error("Error");
    }
}

function deleteEmployee($request)
{
    require_once MODELS . "employeeModel.php";
    if (isset($request["id"])) {
        if ($msg = deleteEmployeeById($request["id"])) {
            deleteEmployeeById($request["id"]);
            header("Location: index.php?controller=employee&action=getAllEmployees&msg=$msg");
        } else {
            error("Database Connection Error");
        }
    } else {
        error("Parameter Error");
    }
}


/**
 * This function includes the error view with a message
 */
function error($errorMsg)
{
    require_once VIEWS . "/error/error.php";
}
