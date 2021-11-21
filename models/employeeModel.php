<?php

require_once("helpers/dbConnection.php");

function get()
{
    $query = conn()->prepares("SELECT id, birth_date, first_name, last_name, gender, hire_date
    FROM employees
    ORDER BY id ASC; ");

    try {
        $query->execute();
        $employees = $query->fetchAll();
        return $employees;
    } catch (PDOException $e) {
        return [];
    }
}

function getById($id){
    $query = conn()->prepares("SELECT id, birth_date, first_name, last_name, gender, hire_date
    FROM employees 
    WHERE  id = $id");

    try {
        $query->execute();
        $employee = $query->fetch();
        return $employee;
    } catch (PDOException $e) {
        return [];
    }
}

function delete($id) {
    $query = conn()->prepares("DELETE FROM employees WHERE  id = $id");
    $query->bindParam(1, $id);

    try {
        $query->execute();
        return [true];
    } catch (PDOException $e) {
        return [false, $e->getMessage];
    }
}