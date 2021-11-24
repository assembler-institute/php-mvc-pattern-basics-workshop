<?php

require_once ("config/constants.php");
require_once ("config/db.php");

if(isset($_GET["controller"])) {
$controller = getControllerPath($_GET["controller"]);
$fileExists = file_exists($controller);

if($fileExists) {
require_once ($controller);
} else {
$errorMsg= "The page you are trying to access doesn't exist!";
require_once VIEWS . "error/error.php";
};
} else {
  require_once VIEWS . "main/main.php";
}

// This returns the controller path dinamically.
function getControllerPath($controller):string {
return CONTROLLERS .$controller."Controller.php";
}

?>