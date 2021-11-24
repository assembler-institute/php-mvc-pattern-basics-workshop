<?php
require_once("helper/dbConnection.php");


function get()
{
    $query = conn()->prepare("SELECT employeeId, firstName, lastName, age
    FROM employees;");

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
    $query = conn()->prepare("SELECT employeeId, firstName, lastName, age
    FROM employees 
    WHERE employeeId = $id;");

    try {
        $query->execute();
        $employee = $query->fetch();
        return $employee;
    } catch (PDOException $e) {
        return [];
    }
}

function create($employee)
{
    $query = conn()->prepare("INSERT INTO employees (firstName, lastName, age)
    VALUES
    (?, ?, ?);");

    $query->bindParam(1, $employee["first-name"]);
    $query->bindParam(2, $employee["last-name"]);
    $query->bindParam(3, $employee["age"]);


    try {
        $query->execute();
        return [true];
    } catch (PDOException $e) {
        return [false, $e];
    }
}


function update($employee)
{
    $query = conn()->prepare("UPDATE employees SET firstName = ?, lastName = ?, age = ?
    WHERE employeeId = ?;");

    $query->bindParam(1, $employee["first-name"]);
    $query->bindParam(2, $employee["last-name"]);
    $query->bindParam(3, $employee["age"]);
    $query->bindParam(4, $employee["employeeId"]);

    try {
        $query->execute();
        return [true];
    } catch (PDOException $e) {
        return [false, $e];
    }
}

function delete($id)
{
    $query = conn()->prepare("DELETE FROM employees WHERE employeeId = ?");
    $query->bindParam(1, $id);

    try {
        $query->execute();
        return [true];
    } catch (PDOException $e) {
        return [false, $e];
    }
}
