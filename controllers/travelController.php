<?php
require_once MODELS . "travelModel.php";

$action="";
if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}

if(function_exists($action)){
    call_user_func($action, $_REQUEST);
}else{
    error("Invalid user action");
}

function getAllEmployeesHobbies(){
    $employeesHobbies = getHobbies();
    
    if(isset($employeesHobbies)){
        $msg="";
        require_once VIEWS . "travel/travelDashboard.php";
    }else{
        error("Invalid page");
    }
}

function getTravel($id){
    $hobbiesEmployee = getHobbiesEmployee($id);
    
    require_once VIEWS . "travel/travel.php";
}

function createHobbie(){
    require_once VIEWS . "travel/travel.php";
}

function saveHobbie($request){
    $hobbieEmployee = array();

    array_push($hobbieEmployee, $request["id"]);
    array_push($hobbieEmployee, $request["name"]);
    array_push($hobbieEmployee, $request["last_name"]);
    array_push($hobbieEmployee, $request["hobby"]);
    array_push($hobbieEmployee, $request["type"]);

    setHobbieEmployee($hobbieEmployee);

    $msg ="data setted";
    getAllEmployeesHobbies();
}
