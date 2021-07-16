<?php

require_once("./controllers/errors.php");

class App 
{
    function __construct()
    {
        echo "<p>Nueva app</p>";

        $url = isset($_GET["url"]) ? $_GET["url"] : null;
        $url = rtrim($url, "/");
        $url = explode("/", $url);

        // when you come inside without controller defined

        if (empty($url[0])) {
            $fileController = "controllers/main.php";
            require_once($fileController);
            $controller = new Main();
            $controller->loadModel("main");
            $controller->render();
            return false;
        }

        $fileController = "controllers/" . $url[0] . ".php";


        if (file_exists($fileController)) {
            require_once $fileController;
            // running the controller
            $controller = new $url[0];
            $controller->loadModel($url[0]);
            // if there are some method that they want to load
            if (isset($url[1])) {
                $controller->{$url[1]}();
            } else {
                // one controller had one view
                $controller->render();
            }
        } else {
            $controller = new Errors();
        }
    }
}
