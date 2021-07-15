<?php

require_once MODELS . "movieModel.php";

//OBTAIN THE ACCION PASSED IN THE URL AND EXECUTE IT AS A FUNCTION
if (function_exists($action)) {
    call_user_func($action, $_REQUEST);
} else {
    error("Invalid user action");
}
//Keep in mind that the function to be executed has to be one of the ones declared in this controller
// TODO Implement the logic


/* ~~~ CONTROLLER FUNCTIONS ~~~ */
getAllMovies();
/**
 * This function calls the corresponding model function and includes the corresponding view
 */
function getAllMovies()
{
    $movies = getMovies();
    require_once VIEWS . "/movie/movieDashboard.php";
}

/**
 * This function calls the corresponding model function and includes the corresponding view
 */
function getMovie($request)
{
    //
}

/**
 * This function includes the error view with a message
 */
function error($errorMsg)
{
    require_once VIEWS . "/error/error.php";
}
