<?php

require_once MODELS . "bookModel.php";

$action = '';

if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
}

if (function_exists($action)) {
    call_user_func($action, $_REQUEST);
} else {
    error("What do you want from us? Ask only for the things we can do!");
}

function getAllBooks()
{
    $books = get();

    if (isset($books)) {
        require_once VIEWS . "/book/bookDashboard.php";
    } else {
        error("It looks like we can't reach our data. Please, give us a few minutes!");
    }
}

function getBook($request)
{
    $action = $request["action"];
    $book = null;

    if (isset($request["id"])) {
        $book = getById($request["id"]);
    }

    require_once VIEWS . "/book/book.php";
}

function newBook($request)
{
    $action = $request["action"];

    if (sizeof($_POST) > 0) {
        $book = add($_POST);

        if ($book[0]) {
            getAllBooks();
        } else {
            echo $book[1];
        }
    } else {
        require_once VIEWS . "/book/book.php";
    }
}

function editBook($request)
{
    $action = $request["action"];

    if (sizeof($_POST) > 0) {
        $book = update($_POST);

        if ($book[0]) {
            header("Location: index.php?controller=book&action=getAllBooks");
        } else {
            $book = $_POST;
            $error = "Wrong data";
            require_once VIEWS . "/author/author.php";
        }
    } else {
        require_once VIEWS . "/book/book.php";
    }
}

function deleteBook($request)
{
    $action = $request["action"];
    $book = null;

    if (isset($request["id"])) {
        delete($request["id"]);
        getAllBooks();
    }
}

function error($errorMsg)
{
    require_once VIEWS . "/error/error.php";
}

function getMovement($book)
{
    switch ($book["mov_id"]) {
        case 1:
            return "Romanticism";
            break;
        case 2:
            return "Symbolism";
            break;
        case 3:
            return "Modernismo";
            break;
        case 4:
            return "Vanguardia";
            break;
        case 5:
            return "Modernism";
            break;
        case 6:
            return "Surrealism";
            break;
        default:
            return null;
            break;
    }
}

function getAuthor($book)
{

    $authors = getAll();

    $currentAuthor = null;

    foreach ($authors as $author) {
        if ($author["id"] === $book["author_id"]) {
            $currentAuthor = $author;
        }
    }

    return $currentAuthor;
}
