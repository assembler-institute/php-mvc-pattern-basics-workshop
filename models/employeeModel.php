<?php
//require the previous database connection file in order to execute the database queries
require_once("helper/dbConnection.php");
//get function, that are execute in the employeeController.php
function get(){
    $query=conn()->prepare("SELECT emp_no, first_name,last_name,gender
    FROM employees;");
    
    try{
        $query->execute();
        $employees=$query->fetchAll();
        return $employees;
    }catch(PDOException $e){
        return [];
    }
}

function delete(){
    
    $query=conn()->prepare("DELETE FROM employees
    WHERE emp_no='$_GET[id]';");

    try{
        $query->execute();
        $employees=$query->fetchAll();
        return $employees;
    }catch(PDOException $e){
        return [];
    }
}

function update(){
    $query=conn()->prepare("UPDATE employees set first_name='amadit', last_name='titor', gender='M'
    WHERE emp_no='$_GET[id]';");
    try{
        $query->execute();
        $employees=$query->fetchAll();
        return $employees;
    }catch(PDOException $e){
        return [];
    }
}
function getById($id){
    $query=conn()->prepare("SELECT emp_no, first_name,last_name,gender
    FROM employees
    WHERE emp_no='$_GET[id]';");
    try{
        $query->execute();
        $employees=$query->fetchAll();
        return $employees;
    }catch(PDOException $e){
        return [];
    }
}