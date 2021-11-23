<?php

require_once("helpers/dbConnection.php");

function create($_post) {
    $query = conn()->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?);");

    $encryptPassword = sha1($_post["password"]);

    $query->bindParam(1, $_post["username"]);
    $query->bindParam(2, $_post["email"]);
    $query->bindParam(3, $encryptPassword);

    try {
        $query->execute();
        return [true];
    } catch (PDOException $e) {
        return [false, $e];
    }
}