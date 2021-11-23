<?php

require_once MODELS . "postsModel.php";

if (isset($_GET["action"])) {
    $action = $_GET["action"];
}

if (function_exists($action)) {
    call_user_func($action);
} else {
    error("Action no autorized");
}

function getPostsById()
{
    $posts = [];
    if (isset($_GET["id"])) {
        $posts = getById($_GET["id"]);
    }
    require_once VIEWS . "/posts/posts.php";
}


function error($errorMsg)
{
    require_once VIEWS . "/error/error.php";
}
