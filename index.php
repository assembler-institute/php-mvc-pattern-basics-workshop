<?php

// This is the entry point of your application, all your application must be executed in
// the "index.php", in such a way that you must include the controller passed by the URL
// dynamically so that it ends up including the view.

include_once "assets/modules/header.php";

include_once "config/constants.php";


// TODO Implement the logic to include the controller passed by the URL dynamically
// In the event that the controller passed by URL does not exist, you must show the error view.

if (isset($_GET['controller'])) {
    if ($_GET['controller'] == 'gods') {
        require_once CONTROLLERS . "/godsController.php";
    } elseif ($_GET['controller'] == 'heroes') {
        require_once CONTROLLERS . "/heroesController.php";
    } else {
        require_once VIEWS . '/error/error.php';
    }
} else {
    require_once VIEWS . '/main/main.php';
}

echo "<script src='./assets/js/utils.js'></script>";
