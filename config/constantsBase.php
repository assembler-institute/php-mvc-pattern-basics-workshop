<?php

//We define the PATH_BASE , we use it in require situations

$documentRoot = getcwd();

define("BASE_PATH", $documentRoot);

//define BASE_URL , we use it in localhost situation, user petitions
$uri = $_SERVER["REQUEST_URI"];
if(isset($uri) && $uri!==null){
    $uri=substr($uri,1);
    $uri = explode("/",$uri);
    $uri = "http://$_SERVER[HTTP_HOST]" . "/" . $uri[0];
}else{
    $uri = null;
}

define("BASE_URL",$uri);
