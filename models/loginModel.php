<?php

require_once("helpers/dbConnection.php");

function validate($username, $password) {
    $query = conn()->prepare("SELECT *
    FROM users
    WHERE username = ? AND password = ?; ");

    $encryptPassword = sha1($password);

    $query->bindParam(1, $username);
    $query->bindParam(2, $encryptPassword);

    try {
        $query->execute();
        $user = $query->fetch();
        if ($user) {
            return [true];
        }
    } catch (PDOException $e) {
        return [false, $e];
    }
}