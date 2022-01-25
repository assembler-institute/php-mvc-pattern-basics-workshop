<?php

require_once "models/helper/dbConnection.php";

//Return consult all pokemons
function getTypes(){
    $query = conn()->prepare("SELECT * FROM types");

    try {
        $query->execute();
        $pokemons = $query->fetchAll();
        return $pokemons;
    } catch (PDOException $e) {
        return [];
    }
}

//Return consult one type by name
function getTypeOneByName($name){
    $query = conn()->prepare("SELECT * FROM types WHERE name = ?");

    try {
        $query->execute([$name]);
        $pokemons = $query->fetch();
        return $pokemons;
    } catch (PDOException $e) {
        return [];
    }
}

//Return consult one type by strong
function getTypesByStrong($id) {
    $query = conn()->prepare("SELECT DISTINCT types.* FROM types JOIN efect_types ON types.id = efect_types.typeDefense WHERE efect_types.typeAttack = ? AND efect_types.effect = 2;");

    try {
        $query->execute([$id]);
        $pokemons = $query->fetchAll();
        return $pokemons;
    } catch (PDOException $e) {
        return [];
    }
}

//Return consult one type by wear
function getTypesByWeak($id) {
    $query = conn()->prepare("SELECT DISTINCT types.* FROM types JOIN efect_types ON types.id = efect_types.typeAttack WHERE efect_types.typeDefense = ? AND efect_types.effect = 2;");

    try {
        $query->execute([$id]);
        $pokemons = $query->fetchAll();
        return $pokemons;
    } catch (PDOException $e) {
        return [];
    }
}