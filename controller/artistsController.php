<?php

if (isset($_GET["action"])) {
    $action = function_exists($_GET["action"]);
    echo "action working";
} else {
    $errorMsg = "action required";
    echo $errorMsg;
}
