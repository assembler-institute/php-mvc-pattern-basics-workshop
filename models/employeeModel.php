<?php

require_once("helper/dbConnection.php");

function get(){
    $query = conn()->prepare("SELECT e.id, e.name, e.size, e.color, e.price
    FROM shoes e
    ORDER BY e.id ASC;");

    try {
        $query->execute();
        $shoes = $query->fetchAll();
        return $shoes;
    } catch (PDOException $e) {
        return [];
    }
}

function getById($id){
    $query = conn()->prepare("SELECT id, e.name, size, color, price
    FROM shoes e
    WHERE id = $id;");

    try {
        $query->execute();
        $shoe = $query->fetch();
        return $shoe;
    } catch (PDOException $e) {
        return [];
    }
}

function create($shoe)
{
    $query = conn()->prepare("INSERT INTO shoes (name, size, color, price)
    VALUES
    (?, ?, ?, ?);");

    $query->bindParam(1, $shoe["name"]);
    $query->bindParam(2, $shoe["size"]);
    $query->bindParam(3, $shoe["color"]);
    $query->bindParam(4, $shoe["price"]);

    try {
        $query->execute();
        return [true];
    } catch (PDOException $e) {
        return [false, $e];
    }
}

function update($shoe)
{
    $query = conn()->prepare("UPDATE shoes
    SET name = ?, size = ?, color = ?, price = ?
    WHERE id = ?;");

    $query->bindParam(1, $shoe["name"]);
    $query->bindParam(2, $shoe["size"]);
    $query->bindParam(3, $shoe["color"]);
    $query->bindParam(4, $shoe["price"]);
    $query->bindParam(5, $shoe["id"]);

    try {
        $query->execute();
        return [true];
    } catch (PDOException $e) {
        return [false, $e];
    }
}

function delete($id)
{
    $query = conn()->prepare("DELETE FROM shoes WHERE id = ?");
    $query->bindParam(1, $id);

    try {
        $query->execute();
        return [true];
    } catch (PDOException $e) {
        return [false, $e];
    }
}
