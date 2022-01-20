<?php

require_once MODELS . "ordersModel.php";

$action = "";

if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
}


if (function_exists($action)) {
    call_user_func($action, $_REQUEST);
} else {
    error("Invalid user action");
}

function getOrdersById($id){

    $order = get($id["id"]);
if(sizeof($order)>0){
    require_once VIEWS."orders/order.php";
}else {
    $errorMsg = "This client has no orders jet";
    require_once VIEWS."error/error.php";
}
}
