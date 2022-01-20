<?php

require_once("helper/dbConnection.php");

function get()
{
    $query = conn()->prepare("SELECT NOMBREARTÍCULO, CÓDIGOARTÍCULO
    FROM productos
    ORDER BY CÓDIGOARTÍCULO ASC;");

    try {
        $query->execute();
        $products = $query->fetchAll();
        return $products;
    } catch (PDOException $e) {
        return [];
    }
}



function getById($id)
{
    $query = conn()->prepare("SELECT *
    FROM `productos`
    WHERE `productos`.`CÓDIGOARTÍCULO` = '$id';");

    try {
        $query->execute();
        $product = $query->fetch();
        return $product;
    } catch (PDOException $e) {
        return [];
    }
}

function create($client)
{
    $query = conn()->prepare("INSERT INTO productos (RESPONSABLE, EMPRESA, DIRECCIÓN , POBLACIÓN , TELÉFONO, CÓDIGOCLIENTE)
    VALUES
    (?, ?, ?, ?, ?, ?);");

    $query->bindParam(1, $client["RESPONSABLE"]);
    $query->bindParam(2, $client["EMPRESA"]);
    $query->bindParam(3, $client["DIRECCIÓN"]);
    $query->bindParam(4, $client["POBLACIÓN"]);
    $query->bindParam(5, $client["TELÉFONO"]);
    $query->bindParam(6, $client["CÓDIGOCLIENTE"]);

    try {
        $query->execute();
        return [true];
    } catch (PDOException $e) {
        return [false, $e];
    }
}

function update($client)
{
    $query = conn()->prepare("UPDATE clientes
    SET RESPONSABLE = ?, EMPRESA = ?, DIRECCIÓN = ?, POBLACIÓN = ?, TELÉFONO = ?
    WHERE CÓDIGOCLIENTE = ?;");

    $query->bindParam(1, $client["RESPONSABLE"]);
    $query->bindParam(2, $client["EMPRESA"]);
    $query->bindParam(3, $client["DIRECCIÓN"]);
    $query->bindParam(4, $client["POBLACIÓN"]);
    $query->bindParam(5, $client["TELÉFONO"]);
    $query->bindParam(6, $client["CÓDIGOCLIENTE"]);

    try {
        $query->execute();
        return [true];
    } catch (PDOException $e) {
        return [false, $e];
    }
}

function delete($id)
{
    $query = conn()->prepare("DELETE FROM clientes WHERE CÓDIGOCLIENTE = ?");
    $query->bindParam(1, $id);

    try {
        $query->execute();
        return [true];
    } catch (PDOException $e) {
        return [false, $e];
    }
}