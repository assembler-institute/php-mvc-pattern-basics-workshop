<?php

require_once MODELS . "/employeeModel.php";
require_once MODELS . "/departmentModel.php";

if (!isset($_REQUEST["action"])) 						return error("No action has been specified");
if (!function_exists($_REQUEST["action"])) 	return error("Action not found");

call_user_func($_REQUEST["action"], $_REQUEST);

/* ~~~ CONTROLLER FUNCTIONS ~~~ */

function getAllEmployees()
{
	$response = getEmployees();

	if ($response["errorCode"]) return error("DB operation failed.");

	require_once VIEWS . "/employee/employeeDashboard.php";
}

function getEmployeeForm($request)
{
	if (isset($request["id"])) {
		$responseEmp = getEmployee($request["id"]);

		if ($responseEmp["errorCode"]) return error("DB operation failed.");
	} else {
		$responseEmp = [
			"data" => null,
			"errorCode" => null,
		];
	}

	$responseDepts = getDepartments();

	if ($responseDepts["errorCode"]) return error("DB operation failed.");

	require_once VIEWS . "/employee/employee.php";
}

function deleteEmployeeByID($request)
{
	if (!isset($request["id"])) return error("ID not specified");

	$response = deleteEmployee($request["id"]);

	if ($response["errorCode"]) return error("DB operation failed.");

	header("Location: ?controller=employee&action=getAllEmployees");
}

function updateEmployeeByID($request)
{
	if (!isset($request["emp_no"])) return error("ID not specified");

	$response = updateEmployee($request);

	if ($response["errorCode"]) return error("DB operation failed. $response[errorCode]");

	header("Location: ?controller=employee&action=getAllEmployees");
}

function createNewEmployee($request)
{
	$response = createEmployee($request);

	if ($response["errorCode"]) return error("DB operation failed. $response[errorCode]");

	header("Location: ?controller=employee&action=getAllEmployees");
}

function error($errorMsg)
{
	require_once VIEWS . "/error/error.php";
}
