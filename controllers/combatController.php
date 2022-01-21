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
    $tipo1=[];
    $tipo2=[];
    $tipostot=[];
    
    $todo=getById($id["id"]);
    $Cinfo=infoCombat($todo[0][0]["tipo1"] , $todo[0][0]["tipo2"]);
    if($todo[0][0]["tipo1"] !== $todo[0][0]["tipo2"]){
        foreach($Cinfo as $info){
            if($info["typeAttack"]==$todo[0][0]["tipo1"]){
                array_push($tipo1,$info);
            }else{
                array_push($tipo2,$info);
            }
            
        }
        for ($x = 0; $x < 18; $x+=1) {
            $ti=[];
            $eficazia=$tipo1[$x]["effect"]*$tipo2[$x]["effect"];
            $tipo=$tipo1[$x]["img"];
            array_push($ti,$eficazia);
            array_push($ti,$tipo);
            array_push($tipostot,$ti);
        }
    }else{
        foreach($Cinfo as $info){
            $b=[];
            array_push($b,$info["effect"]);
            array_push($b,$info["img"]);
            array_push($tipostot,$b);
        }
    }
    require_once(VIEWS."pokemon/CombatInfo.php");
}