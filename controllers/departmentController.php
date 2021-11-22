<?php

require_once MODELS . "/employeeModel.php";
require_once MODELS . "/departmentModel.php";

if (!isset($_REQUEST["action"])) 						return error("No action has been specified");
if (!function_exists($_REQUEST["action"])) 	return error("Action not found");

call_user_func($_REQUEST["action"], $_REQUEST);

/* ~~~ CONTROLLER FUNCTIONS ~~~ */

function getAllDepartments()
{
	$response = getDepartments();

	if ($response["errorCode"]) return error("DB operation failed.");

	require_once VIEWS . "/department/departmentDashboard.php";
}

function getDepartmentForm($request)
{
	if (isset($request["id"])) {
		$responseDept = getDepartment($request["id"]);

		if ($responseDept["errorCode"]) return error("DB operation failed.");
	}

	$responseEmps = getEmployees();

	if ($responseEmps["errorCode"]) return error("DB operation failed.");

	require_once VIEWS . "/department/department.php";
}

function deleteDepartmentByID($request)
{
	if (!isset($request["id"])) return error("ID not specified");

	$response = deleteDepartment($request["id"]);

	if ($response["errorCode"]) return error("DB operation failed.");

	header("Location: ?controller=department&action=getAllDepartments");
}

function updateDepartmentByID($request)
{
	if (!isset($request["dept_no"])) return error("ID not specified");

	$response = updateDepartment($request);

	if ($response["errorCode"]) return error("DB operation failed. $response[errorCode]");

	header("Location: ?controller=department&action=getAllDepartments");
}

function error($errorMsg)
{
	require_once VIEWS . "/error/error.php";
}
