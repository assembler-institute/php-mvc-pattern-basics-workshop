<?php

require_once("helpers/dbConnection.php");

function get()
{
    $query = conn()->prepare("SELECT emp_id, salary, from_date, to_date
    FROM salaries
    ORDER BY emp_id ASC; ");

    try {
        $query->execute();
        $salaries = $query->fetchAll();
        return $salaries;
    } catch (PDOException $e) {
        return [];
    }
}

function getById($id){
    $query = conn()->prepare("SELECT emp_id, salary, from_date, to_date
    FROM salaries
    WHERE  emp_id = $id AND to_date = NULL;");

    try {
        $query->execute();
        $salary = $query->fetch();
        return $salary;
    } catch (PDOException $e) {
        return [];
    }
}

function delete($id) {
    $query = conn()->prepare("DELETE FROM salaries WHERE  emp_id = ?;");
    $query->bindParam(1, $id);

    try {
        $query->execute();
        return [true];
    } catch (PDOException $e) {
        return [false, $e];
    }
}

function create($_post) {
    $query = conn()->prepare("INSERT INTO salaries (emp_id, salary, from_date, to_date) VALUES (?, ?, ?, ?);");
    $query->bindParam(1, $_post["empId"]);
    $query->bindParam(2, $_post["salary"]);
    $query->bindParam(3, $_post["fromDate"]);
    $query->bindParam(4, $_post["toDate"]);

    try {
        $query->execute();
        return [true];
    } catch (PDOException $e) {
        return [false, $e];
    }
}

function update($_post) {
    $query = conn()->prepare("UPDATE salaries SET salary = ?, from_date = ?, to_date = ? WHERE emp_id = ? AND from_date = ?;");
    $query->bindParam(1, $_post["salary"]);
    $query->bindParam(2, $_post["fromDate"]);
    $query->bindParam(3, $_post["toDate"]);
    $query->bindParam(4, $_post["empId"]);
    $query->bindParam(4, $_post["fromDate"]);

    try {
        $query->execute();
        return [true];
    } catch (PDOException $e) {
        return [false, $e];
    }
}