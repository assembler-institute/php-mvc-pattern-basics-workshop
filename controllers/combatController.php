<?php
require_once MODELS . "pokemonTypeModel.php";
$action = "";

if(isset($_REQUEST["action"])){
    $action = $_REQUEST ["action"];
}

if(function_exists($action)){
    call_user_func($action,$_REQUEST);
}

function combat($id){
    $todo=getById($id["id"]);
    $Cinfo=infoCombat($todo[0][0]["tipo1"] , $todo[0][0]["tipo2"]);
    require_once(VIEWS."pokemon/CombatInfo.php");
}