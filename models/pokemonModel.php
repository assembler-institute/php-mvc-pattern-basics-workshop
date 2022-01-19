<?php
    require_once(MODELS."helper/dbConection.php");
function get(){
    $query=conn()->prepare("SELECT pokemon.id , pokemon.name , types.img FROM pokemon INNER JOIN types 
    WHERE types.id=pokemon.tipo1
    OR types.id=pokemon.tipo2 
    GROUP BY pokemon.id");
    try{
        $query->execute();
        $pokemon=$query->fetchAll();
        return $pokemon;
    }catch(PDOException $e){
        return [];
    }
}

function getById($id){
    
}