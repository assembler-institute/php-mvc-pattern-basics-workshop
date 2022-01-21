<?php
require_once MODELS . "pokemonModel.php";
$action = "";

if(isset($_REQUEST["action"])){
    $action = $_REQUEST ["action"];
}

if(function_exists($action)){
    call_user_func($action,$_REQUEST);
}

//OBTAIN THE ACCION PASSED IN THE URL AND EXECUTE IT AS A FUNCTION

//Keep in mind that the function to be executed has to be one of the ones declared in this controller
// TODO Implement the logic


/* ~~~ CONTROLLER FUNCTIONS ~~~ */

/**
 * This function calls the corresponding model function and includes the corresponding view
 */
function getAllPokemons()
{
    $todo = get();
    $pokemons = $todo[0];
    $types = $todo[1];
    if(isset($pokemons)){

            require_once(VIEWS."pokemon/pokedex.php");

    }
}

/**
 * 
 * This function calls the corresponding model function and includes the corresponding view
 */
function getPokemon($request)
{
    $pokemonSelectedTodo = getById($request["id"]);
    $pokemonSelectedTodo1 = $pokemonSelectedTodo[0];
    $pokemonSelectedTodo2 = $pokemonSelectedTodo[1];
    $todo = get();
    $pokemons = $todo[0];
    $types = $todo[1];
    if(isset($pokemonSelectedTodo)){
        require_once(VIEWS."pokemon/pokemon.php");
    } else{
        // error();
    }
}

/**
 * This function includes the error view with a message
 */
function error($errorMsg)
{
    require_once VIEWS . "/error/error.php";
}
