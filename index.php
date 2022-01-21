<?php

// This is the entry point of your application, all your application must be executed in
// the "index.php", in such a way that you must include the controller passed by the URL
// dynamically so that it ends up including the view.

include_once "config/constants.php";
include_once "config/db.php";
// TODO Implement the logic to include the controller passed by the URL dynamically
// In the event that the controller passed by URL does not exist, you must show the error view.

//if ?controller= has value
if(isset($_GET["controller"])){
//C:\xampp\htdocs\mvcPatternBasic\php-mvc-pattern-basics-workshop/controllers/employeesController.php
   $controller=getControllerPath($_GET["controller"]);
   $fileExist=file_exists($controller);
   if($fileExist){
        require_once $controller;
   }else{
       $errorMsg="page not exist";
       require_once VIEWS. "error/error.php";
   }
}else{
    require_once VIEWS."main/main.php";
}

function getControllerPath($controller):string{
    return CONTROLLERS.$controller."Controller.php";
}