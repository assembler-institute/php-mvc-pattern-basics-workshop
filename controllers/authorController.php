<?php

require_once MODELS . "authorModel.php";

//OBTAIN THE ACCION PASSED IN THE URL AND EXECUTE IT AS A FUNCTION

//Keep in mind that the function to be executed has to be one of the ones declared in this controller

$action = '';

if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
}

if (function_exists($action)) {
    call_user_func($action, $_REQUEST);
} else {
    error("What do you want from us? Ask only for the things we can do!");
}

/* ~~~ CONTROLLER FUNCTIONS ~~~ */

/**
 * This function calls the corresponding model function and includes the corresponding view
 */
function getAllAuthors()
{
    $authors = getAll();

    if (isset($authors)) {
        require_once VIEWS . "/author/authorDashboard.php";
    } else {
        error("It looks like we can't reach our data. Please, give us a few minutes!");
    }
}

/**
 * This function calls the corresponding model function and includes the corresponding view
 */
function getAuthor($request)
{
    //? Can we omit these two lines?

    $action = $request["action"];
    $author = null;

    if (isset($request["id"])) {
        $author = getAuthById($request["id"]);
    }

    require_once VIEWS . "author/author.php";
}

function createAuthor($request)
{
    $action = $request["action"];

    if (sizeof($_POST) > 0) {
        $author = addAuthor($_POST);

        if ($author[0]) {
            getAllAuthors();
        } else {
            echo $author[1];
        }
    } else {
        require_once VIEWS . "/author/author.php";
    }
}

function updateAuthor($request)
{
    $action = $request["action"];

    if (sizeof($_POST) > 0) {
        $author = updateAuth($_POST);

        if ($author[0]) {
            header("Location: index.php?controller=author&action=getAllAuthors");
        } else {
            $author = $_POST;
            $error = "Wrong data";
            require_once VIEWS . "/author/author.php";
        }
    } else {
        require_once VIEWS . "/author/author.php";
    }
}

function deleteAuthor($request)
{
    $action = $request["action"];
    $author = null;

    if (isset($request["id"])) {
        deleteAuth($request["id"]);
        getAllAuthors();
    }
}

/**
 * This function includes the error view with a message
 */
function error($errorMsg)
{
    require_once VIEWS . "/error/error.php";
}
