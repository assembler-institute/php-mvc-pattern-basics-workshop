<?php

require_once MODELS . "employeeModel.php";

$action = "";

if(isset($_GET["action"]))
{
    $action = $_GET["action"];
}

if(function_exists($action))
{
    echo "The function does exist";
    call_user_func($action);
} else
{
    // echo "no existe function";
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
function getEmployee($request)
{
    $action = $request["action"];
    $employee = null;
    if (isset($request["id"])) {
        $employee = getById($request["id"]);
    }
    require_once VIEWS . "/employee/employee.php";
}

/**
 * This function includes the error view with a message
 */
function error($errorMsg)
{
    require_once VIEWS . "/error/error.php";
}
