<?php

require_once MODELS . "employeeModel.php";

//OBTAIN THE ACCION PASSED IN THE URL AND EXECUTE IT AS A FUNCTION

//Keep in mind that the function to be executed has to be one of the ones declared in this controller
// TODO Implement the logic

$action="";
//Check if action exists in URL
if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}

//Check if $action in url is an existing function in this script and call her, if not we show an erro message
if(function_exists($action)){
    call_user_func($action, $_REQUEST);
}else{
    error("Invalid user action");
}


/* ~~~ CONTROLLER FUNCTIONS ~~~ */

/**
 * This function calls the corresponding model function and includes the corresponding view
 */
function getAllEmployees()
{
    //get() returns the content of database depending the query to execute inside her.
    $employees = get();
    
    //If existis employees ini db we show all of them, if not, we show an error message
    if(isset($employees)){
        $msg="";
        require_once VIEWS . "/employee/employeeDashboard.php";
    }else{
        error("There is a Data Base error, try again.");
    }
}

/**
 * This function calls the corresponding model function and includes the corresponding view
 */
function getEmployee($request)
{
    //Get the employee by the id request
    $employee = getById($_GET["id"]);
    //If exists the specified employee we show the employee data, if not we show an error
    if(isset($employee)){
        require_once VIEWS . "employee/employee.php";
    }else{
        error("This employee doesnt exists");
    }
}

function setEmployee($request){
    //Get the new data employee
    $newData = array();
    array_push($newData, $request["id"]);
    array_push($newData, $_POST["name"]);
    array_push($newData, $request["email"]);
    array_push($newData, $request["gender_id"]);
    array_push($newData, $request["city"]);
    array_push($newData, $request["age"]);
    array_push($newData, $request["phone_number"]);
    
    //Invoque the function to set the employee data
    $employee = setById($newData);
    $msg ="data setted";
    getAllEmployees();
}

/**
 * This function includes the error view with a message
 */
function error($errorMsg)
{
    require_once VIEWS . "/error/error.php";
}
