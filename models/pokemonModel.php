<?php
    require_once(MODELS."helper/dbConection.php");
function get(){
    $query1=conn()->prepare("SELECT pokemon.id , pokemon.name ,pokemon.tipo1,pokemon.tipo2
    FROM pokemon
    GROUP BY pokemon.id");
    $query2=conn()->prepare("SELECT id , img
    FROM types");
    try{
        $query1->execute();
        $query2->execute();
        $pokemon=$query1->fetchAll();
        $types=$query2->fetchAll();
        return Array($pokemon,$types);
    }catch(PDOException $e){
        return [];
    }
}

function getById($id){
    $query=conn()->prepare("SELECT pokemon.id , pokemon.name , pokemon.tipo1,pokemon.tipo2 FROM pokemon INNER JOIN types 
    WHERE pokemon.id = $id AND pokemon.tipo1 = types.id");
    $query2=conn()->prepare("SELECT types.id , types.img
    FROM types");
    try{
        $query->execute();
        $query2->execute();
        $pokemonId=$query->fetchAll();
        $typesId=$query2->fetchAll();
        return Array($pokemonId,$typesId);
    }catch(PDOException $e){
        return [];
    }
}