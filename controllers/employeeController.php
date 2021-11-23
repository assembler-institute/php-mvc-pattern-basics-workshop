<?php

require_once MODELS . "employeeModel.php";

//OBTAIN THE ACCION PASSED IN THE URL AND EXECUTE IT AS A FUNCTION

$action = "";

if (isset($_GET["action"])) {
    $action = $_GET["action"];
}

if (function_exists($action)) {
    call_user_func($action, $_GET);
} else {
    error("Invalid user action");
}


//Keep in mind that the function to be executed has to be one of the ones declared in this controller
// TODO Implement the logic


/* ~~~ CONTROLLER FUNCTIONS ~~~ */

/**
 * This function calls the corresponding model function and includes the corresponding view
 */
function getAllEmployees()
{
  $employees = get();
  if (isset($employees)) {
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
  $employee_id = $request['id'];
  $employee = getById($employee_id);
  $employee = count($employee) > 0 ? $employee[0] : $employee;
  $hobbies = getHobbiesByEmployeeId($employee_id);
  $form = renderFormEmployee($employee, $hobbies);
  
  if (isset($employee)) {
    require_once VIEWS . "/employee/employeeView.php";
  } else {
      error("There is a database error, try again.");
  }
}

/**
 * This function includes the error view with a message
 */
function error($errorMsg)
{
    require_once VIEWS . "/error/error.php";
}

function proccesForm() {
  # Type Edit or Add new employee
  $action = $_POST['actionForm'];
  unset($_POST['actionForm']);
  $res = $action === 'create' ? addEmployee($_POST) : editEmployee($_POST);
  header("Location: /?controller=employee&action=getAllEmployees&$action=$res");
}