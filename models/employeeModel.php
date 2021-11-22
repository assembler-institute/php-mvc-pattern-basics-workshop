<?php
require_once("helper/dbConnection.php");


function get()
{
    $query = conn()->prepare("SELECT e.employeeId, e.firstName, e.lastName, e.age
    FROM employees e;");

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
    $query = conn()->prepare("SELECT e.employeeId, e.firstName, e.lastName, e.age
    FROM employees e
    WHERE e.employeeId = $id;");

    try {
        $query->execute();
        $employee = $query->fetch();
        return $employee;
    } catch (PDOException $e) {
        return [];
    }
}
