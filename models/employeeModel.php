<?php

require_once("helpers/dbConnection.php");

function get()
{
    $query = conn()->prepare("SELECT id, birth_date, first_name, last_name, gender, hire_date
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
    $query = conn()->prepare("SELECT id, birth_date, first_name, last_name, gender, hire_date
    FROM employees 
    WHERE  id = $id;");

    try {
        $query->execute();
        $employee = $query->fetch();
        return $employee;
    } catch (PDOException $e) {
        return [];
    }
}

function delete($id) {
    $query = conn()->prepare("DELETE FROM employees WHERE  id = ?;");
    $query->bindParam(1, $id);

    try {
        $query->execute();
        return [true];
    } catch (PDOException $e) {
        return [false, $e];
    }
}

function create($_post) {
    $query = conn()->prepare("INSERT INTO employees (birth_date, first_name, last_name, gender, hire_date) VALUES (?, ?, ?, ?, ?);");
    $query->bindParam(1, $_post["birthDate"]);
    $query->bindParam(2, $_post["firstName"]);
    $query->bindParam(3, $_post["lastName"]);
    $query->bindParam(4, $_post["gender"]);
    $query->bindParam(5, $_post["hireDate"]);

    try {
        $query->execute();
        return [true];
    } catch (PDOException $e) {
        return [false, $e];
    }
}

function update($_post) {
    $query = conn()->prepare("UPDATE employees SET birth_date = ?, first_name = ?, last_name = ?, gender = ?, hire_date = ? WHERE id = ?;");
    $query->bindParam(1, $_post["birthDate"]);
    $query->bindParam(2, $_post["firstName"]);
    $query->bindParam(3, $_post["lastName"]);
    $query->bindParam(4, $_post["gender"]);
    $query->bindParam(5, $_post["hireDate"]);
    $query->bindParam(6, $_post["id"]);

    try {
        $query->execute();
        return [true];
    } catch (PDOException $e) {
        return [false, $e];
    }
}