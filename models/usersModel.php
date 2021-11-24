<?php
require_once "helper/dbConnection.php";


function get()
{
    $query = conn()->prepare("SELECT id, name, last_name, email, age, avatar FROM users");
    try {
        $query->execute();
        $users = $query->fetchAll();
        return $users;
    } catch (PDOException $e) {
        return [];
    }
}

function getbyId($id)
{
    $query = conn()->prepare("SELECT id, name, last_name, email, age, avatar FROM users WHERE id=$id");
    try {
        $query->execute();
        $user = $query->fetchAll();
        return $user;
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
        $query = conn()->prepare("INSERT INTO users (name, last_name, email, age, avatar)
    VALUES
    (?, ?, ?, ?, ?);");

        $query->bindParam(1, $user["name"]);
        $query->bindParam(2, $user["last_name"]);
        $query->bindParam(3, $user["email"]);
        $query->bindParam(4, $user["age"]);
        $query->bindParam(5, $user["avatar"]);

        try {
            $query->execute();
            return [true];
        } catch (PDOException $e) {
            return [false, $e];
        }
    }
}

function update($user)
{
    $query = conn()->prepare("UPDATE users
    SET id = ?, name = ?, last_name = ?, email = ?, age = ?, avatar = ?
    WHERE id =" . $user["id"] . ";");

    $query->bindParam(1, $user["id"]);
    $query->bindParam(2, $user["name"]);
    $query->bindParam(3, $user["last_name"]);
    $query->bindParam(4, $user["email"]);
    $query->bindParam(5, $user["age"]);
    $query->bindParam(6, $user["avatar"]);

    try {
        $query->execute();
        return [true];
    } catch (PDOException $e) {
        return [false, $e];
    }
}
