<?php

require_once MODELS . "pokemonModel.php";
require_once MODELS . "typePokemonModel.php";

$action = "";

if(isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
}

if(function_exists($action)) {
    call_user_func($action, $_REQUEST);
} else {
    error("No encuentra la funcion");
}

function getAllPokemons() {
    $pokemons = getPokemons();
    $types = getTypes();
    if(isset($pokemons) && isset($types)) {
        require_once VIEWS . "pokemon/pokemonDashboard.php";
    } else {
        error("Error database");
    }
}

function getPokemonsByType() {
    if(isset($_REQUEST["nameType"])) {
        if($_REQUEST["nameType"] === "all") {
            $pokemons = getPokemons();
        } else {
            $type = getTypeOneByName($_REQUEST["nameType"]);
            $pokemons = getPokeByOneType($type["id"]);
        }
        echo json_encode($pokemons);
    } else {
        return [];
    }
}

function getPokemon() {
    if(isset($_REQUEST["id"])) {
        $pokemon = getPokeByID($_REQUEST["id"]);
        require_once VIEWS . "pokemon/pokemon.php";
    } else {
        return [];
    }
}

function error($errorMsg) {
    require_once VIEWS . "/error/error.php";
}