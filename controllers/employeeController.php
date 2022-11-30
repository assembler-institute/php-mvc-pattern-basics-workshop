<?php
require_once MODELS . "employeeModel.php";
require_once("./config/helper.php");

//Comprobar si llega el action 

//OBTAIN THE ACCION PASSED IN THE URL AND EXECUTE IT AS A FUNCTION
//_FINISH THIS --------


$action = ($_GET["action"]);

//echo $action;
//EINAR CODE

if (function_exists($action)) {
    call_user_func($action, $_REQUEST);
    debug_to_console("OK - The action-request from the button is conducted to the controller");
} else {
    error("Invalid user action");
    debug_to_console("NOT OK - The action-request from the button is NOT conducted to the controller");
}
//EINAR CODE



//_KIMMY CODE
// if (isset($_REQUEST["action"])) {
//     function_exists($_REQUEST["action"])
//         ? call_user_func($_REQUEST["action"], $_REQUEST)
//         : $errorMessage = "action does not exist";
// } else {
//     $errorMessage = "action error";
// }
//_KIMMY CODE

//Keep in mind that the function to be executed has to be one of the ones declared in this controller
// TODO Implement the logic


/* ~~~ CONTROLLER FUNCTIONS ~~~ */
//getAllEmployees();
/**
 * This function calls the corresponding model function and includes the corresponding view
 */
function getAllEmployees()
{
    try {
        $employees = get();
        require_once VIEWS . "/employee/employeeDashboard.php";
        debug_to_console("OK - You are calling correctly to the getAllEmployees function of the Controller");
    } catch (exception $e) {
        error($e->getMessage());
        debug_to_console("NOT OK - You are not calling correctly to the getAllEmployees function of the Controller");
    }
}

/**
 * This function calls the corresponding model function and includes the corresponding view
 */
function getEmployee($request)
{
    //
    if ($_REQUEST['id'] !== null && $_REQUEST['id'] !== "") {
        error('ERROR - El id de la query no puede estar vacio.');
    }

    try {
        $employee = getEmployeeById($_REQUEST['id']);
        debug_to_console("OK - You are calling correctly to the getEmployeeById function of the Controller");
        require_once VIEWS . "/employee/employee.php";
    } catch (exception $e) {
        error($e->getMessage());
        debug_to_console("NOT OK - You are not calling correctly to the getEmployeeById function of the Controller");
    }
}

/**
 * This function includes the error view with a message
 */
function error($errorMsg)
{
    require_once VIEWS . "/error/error.php";
    debug_to_console("Error view es correctly required from error function of the controller");
}
