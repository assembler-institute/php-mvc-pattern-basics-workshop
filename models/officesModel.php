<?php
require_once("helper/dbConnection.php");

function get()
{
    $query = conn()->prepare("SELECT officeId, city, country, address
    FROM offices;");

    try {
        $query->execute();
        $employees = $query->fetchAll();
        return $employees;
    } catch (PDOException $e) {
        return [];
    }
}

function getById($id)
{
    $query = conn()->prepare("SELECT officeId, city, country, address
    FROM offices 
    WHERE officeId = $id;");

    try {
        $query->execute();
        $office = $query->fetch();
        return $office;
    } catch (PDOException $e) {
        return [];
    }
}

function create($employee)
{
    $query = conn()->prepare("INSERT INTO offices (city, country, address)
    VALUES
    (?, ?, ?);");

    $query->bindParam(1, $employee["city"]);
    $query->bindParam(2, $employee["country"]);
    $query->bindParam(3, $employee["address"]);


    try {
        $query->execute();
        return [true];
    } catch (PDOException $e) {
        return [false, $e];
    }
}

function update($employee)
{
    $query = conn()->prepare("UPDATE offices SET city = ?, country = ?, address = ?
    WHERE officeId = ?;");

    $query->bindParam(1, $employee["city"]);
    $query->bindParam(2, $employee["country"]);
    $query->bindParam(3, $employee["address"]);
    $query->bindParam(4, $employee["officeId"]);

    try {
        $query->execute();
        return [true];
    } catch (PDOException $e) {
        return [false, $e];
    }
}

function delete($id)
{
    $query = conn()->prepare("DELETE FROM offices WHERE officeId = ?");
    $query->bindParam(1, $id);

    try {
        $query->execute();
        return [true];
    } catch (PDOException $e) {
        return [false, $e];
    }
}
