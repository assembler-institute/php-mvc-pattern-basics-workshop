<?php

require_once MODELS . "movieModel.php";

//OBTAIN THE ACCION PASSED IN THE URL AND EXECUTE IT AS A FUNCTION
if (isset($_REQUEST["action"])) {
    function_exists($_REQUEST["action"])
        ? call_user_func($_REQUEST["action"], $_REQUEST)
        : error("action does not exist");
} else {
    error("action error");
}
//Keep in mind that the function to be executed has to be one of the ones declared in this controller
// TODO Implement the logic


/* ~~~ CONTROLLER FUNCTIONS ~~~ */
// getAllMovies();
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
    $movie = getMovieById($request["id"]);
    require_once VIEWS . "/movie/movie.php";
}

function createMovie($request)
{
    require_once MODELS . "movieModel.php";
    if ($msg = newMovie($request)) {
        header("Location: index.php?controller=movie&action=getAllMovies&msg=$msg");
    } else {
        error("Parameter Error");
    }
}

function updateMovie($request)
{
    if (isset($request["movie_id"])) {
        require_once MODELS . "movieModel.php";
        if ($msg = update($request)) {
            header("Location: index.php?controller=movie&action=getAllMovies&msg=$msg");
        } else {
            error("Database connection error");
        }
    } else {
        error("Error");
    }
}

function deleteMovie($request)
{
    require_once MODELS . "movieModel.php";
    if (isset($request["id"])) {
        if ($msg = deleteMovieById($request["id"])) {
            deleteMovieById($request["id"]);
            header("Location: index.php?controller=movie&action=getAllMovies&msg=$msg");
        } else {
            error("Database Connection Error");
        }
    } else {
        error("Parameter Error");
    }
}
/**
 * This function includes the error view with a message
 */
function error($errorMsg)
{
    require_once VIEWS . "/error/error.php";
}
