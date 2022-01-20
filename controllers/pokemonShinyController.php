
<?php
require_once MODELS . "pokemonModel.php";
$action = "";

if(isset($_REQUEST["action"])){
    $action = $_REQUEST ["action"];
}

if(function_exists($action)){
    call_user_func($action,$_REQUEST);
}

function getAllPokemons()
{
    $todo = get();
    $pokemons = $todo[0];
    $types = $todo[1];
    if(isset($pokemons)){

            require_once(VIEWS."pokemon/PokedexShiny.php");

    }
}

function getPokemon($request)
{
    $pokemonSelectedTodo = getById($request["id"]);
    $pokemonSelectedTodo1 = $pokemonSelectedTodo[0];
    $pokemonSelectedTodo2 = $pokemonSelectedTodo[1];
    $todo = get();
    $pokemons = $todo[0];
    $types = $todo[1];
    if(isset($pokemonSelectedTodo)){
        require_once(VIEWS."pokemon/pokemonShiny.php");
    } else{
        error();
    }
}