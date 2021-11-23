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

function deleteById($id)
{
    $query = conn()->prepare("DELETE FROM users WHERE id = $id");
    try {
        $query->execute();
    } catch (PDOException $e) {
        error($e->getMessage());
    }
}

function create($user)
{ {
        $query = conn()->prepare("INSERT INTO users (name, last_name, email, password, avatar)
    VALUES
    (?, ?, ?, ?, ?);");

        $query->bindParam(1, $user["name"]);
        $query->bindParam(2, $user["last_name"]);
        $query->bindParam(3, $user["email"]);
        $query->bindParam(4, $user["password"]);
        $query->bindParam(5, $user["avatar"]);


        try {
            $query->execute();
            return [true];
        } catch (PDOException $e) {
            return [false, $e];
        }
    }
}
