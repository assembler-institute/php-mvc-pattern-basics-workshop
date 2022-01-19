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
    echo $id;
    // $todo=getById($id);
    // $pokemon=$todo[0];
    // infoCombat($pokemon["tipo1"],$pokemon["tipo2"]);
    // require_once(VIEWS."pokemon/CombatInfo.php");
}