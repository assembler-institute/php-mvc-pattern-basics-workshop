<?php

require_once("helper/dbConnection.php");

function get(){
    $query = dbConnection()->prepare("SELECT e.id, e.name, e.email, g.name as 'gender', e.city, e.age, e.phone_number FROM employees e INNER JOIN genders g ON e.gender_id = g.id ORDER BY e.id ASC;");

    try{
        $query->execute();
        $employees = $query->fetchAll();
        return $employees;
    }catch(PDOException $e){
        return [];
    }
}

function getById($id){
    $query = dbConnection()->prepare("SELECT e.id, e.name, e.email, g.name as 'gender', e.city, e.age, e.phone_number FROM employees e INNER JOIN genders g ON e.gender_id = g.id WHERE e.id=$id;");

    try{
        $query->execute();
        $employee = $query->fetchAll();
        return $employee;
    }catch(PDOException $e){
        return [];
    }
}

function setById($data){
    $query = dbConnection()->prepare("UPDATE employees SET name= ?,email= ?,gender_id=?, city= ?, age= ?, phone_number= ? WHERE id= ?;");
    $query->bindParam(1,$data[1]);
    $query->bindParam(2,$data[2]);
    $query->bindParam(3,$data[3]);
    $query->bindParam(4,$data[4]);
    $query->bindParam(5,$data[5]);
    $query->bindParam(6,$data[6]);
    $query->bindParam(7,$data[0]);
    try{
        $query->execute();
        return [true];
    }catch(PDOException $e){
        return [];
    }
}