<?php

require_once "models/helper/dbConnection.php";

function getPokemons() {
    $query = conn()->prepare("SELECT * FROM pokemon");

    try {
        $query->execute();
        $pokemons = $query->fetchAll();
        return $pokemons;
    } catch (PDOException $e) {
        return [];
    }
}

function getPokeByOneType($id) {
    $query = conn()->prepare("SELECT pokemon.* FROM pokemon INNER JOIN pokemon_types ON pokemon.id = pokemon_types.poke_id WHERE pokemon_types.type_id = ?");

    try {
        $query->execute([$id]);
        $pokemons = $query->fetchAll();
        return $pokemons;
    } catch (PDOException $e) {
        return [];
    }
}

function getPokeByID($id) {
    $query = conn()->prepare("SELECT * FROM pokemon WHERE id = ?");

    try {
        $query->execute([$id]);
        $pokemons = $query->fetch();
        return $pokemons;
    } catch (PDOException $e) {
        return [];
    }
}