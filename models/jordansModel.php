<?php

require_once("helper/dbConnection.php");

function get(){
    $query = conn()->prepare("SELECT e.id, e.name, e.clothes, e.price, e.size, e.shipment
    FROM jordans e
    ORDER BY e.id ASC;");

    try {
        $query->execute();
        $jordans = $query->fetchAll();
        return $jordans;
    } catch (PDOException $e) {
        return [];
    }
}

function getById($id){
    $query = conn()->prepare("SELECT id, e.name, clothes, price, size, shipment
    FROM jordans e
    WHERE id = $id;");

    try {
        $query->execute();
        $jordans = $query->fetch();
        return $jordans;
    } catch (PDOException $e) {
        return [];
    }
}

function create($jordan)
{
    $query = conn()->prepare("INSERT INTO jordans (name, clothes, price, size, shipment)
    VALUES
    (?, ?, ?, ?, ?);");

    $query->bindParam(1, $jordan["name"]);
    $query->bindParam(2, $jordan["clothes"]);
    $query->bindParam(3, $jordan["price"]);
    $query->bindParam(4, $jordan["size"]);
    $query->bindParam(5, $jordan["shipment"]);

    try {
        $query->execute();
        return [true];
    } catch (PDOException $e) {
        return [false, $e];
    }
}

function update($jordan)
{
    $query = conn()->prepare("UPDATE jordans
    SET name = ?, clothes = ?, price = ?, size = ?, shipment = ?
    WHERE id = ?;");

    $query->bindParam(1, $jordan["name"]);
    $query->bindParam(2, $jordan["clothes"]);
    $query->bindParam(3, $jordan["price"]);
    $query->bindParam(4, $jordan["size"]);
    $query->bindParam(5, $jordan["shipment"]);
    $query->bindParam(6, $jordan["id"]);

    try {
        $query->execute();
        return [true];
    } catch (PDOException $e) {
        return [false, $e];
    }
}

function delete($id)
{
    $query = conn()->prepare("DELETE FROM jordans WHERE id = ?");
    $query->bindParam(1, $id);

    try {
        $query->execute();
        return [true];
    } catch (PDOException $e) {
        return [false, $e];
    }
}
