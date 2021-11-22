<?php
require_once "helper/dbConnection.php";


function get()
{
    $query = conn()->prepare("SELECT id, name, last_name, email, password, avatar FROM users");
    try {
        $query->execute();
        $users = $query->fetchAll();
        return $users;
    } catch (PDOException $e) {
        return [];
    }
}

function getById($id)
{
}
