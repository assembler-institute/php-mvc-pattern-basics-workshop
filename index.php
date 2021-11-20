<?php

require_once("./config/constants.php");
require_once("./config/db.php");

if (isset($_GET["controller"])) {
	$controllerName = $_GET["controller"];
	$controllerPath = getControllerPath($controllerName);

	if (file_exists($controllerPath)) {
		require_once($controllerPath);
	} else {
		echo "Controller not found";
	}
} else {
	require_once VIEWS . "main/main.php";
	echo "OK";
}

function getControllerPath(string $controllerName)
{
	return CONTROLLERS . $controllerName . "Controller.php";
}
