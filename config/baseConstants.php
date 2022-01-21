<?php
//return absolute route to this folder *config
$documentRoot=getcwd();
//base path -> reference value
define("BASE_PATH", $documentRoot);

//base url -> for link css
$uri=$_SERVER["REQUEST_URI"];

if(isset($uri) && $uri !=null){
    // /php-mvc-pattern-basics-workshop/config/baseConstants.php
    //delete '/' from path
    $uri = substr($uri,1);
   //separate for '/' and create array
    $uri= explode('/',$uri);
    //http://localhost:3000/php-mvc-pattern-basics-workshop
    $uri= "http://$_SERVER[HTTP_HOST]" . "/".$uri[0];
    
}else{
    $uri=null;
}

define("BASE_URL",$uri);





