<?php

require_once("helper/dbConnection.php");

//function to get all employees on dataBs to show them on dashboard
function get(){
    $query = dbConnection()->prepare("SELECT e.id, e.name, e.email, g.name as 'gender', e.avatar, e.city, e.age, e.phone_number FROM employees e INNER JOIN genders g ON e.gender_id = g.id ORDER BY e.id ASC;");

    try{
        $query->execute();
        $employees = $query->fetchAll();
        return $employees;
    }catch(PDOException $e){
        return [];
    }
}

//Function to get the employee by id and show his data on employee.php
function getById($id){
    $query = dbConnection()->prepare("SELECT e.id, e.name, e.last_name, e.email, g.name as 'gender',e.age,e.phone_number, e.city, e.street_address, e.state, e.postal_code FROM employees e INNER JOIN genders g ON e.gender_id = g.id WHERE e.id=$id;");

    try{
        $query->execute();
        $employee = $query->fetchAll();
        return $employee;
    }catch(PDOException $e){
        return [];
    }
}

//Function to set an employee to update their data
function setById($data){
    $query = dbConnection()->prepare("UPDATE employees SET name= ?,last_name=?,email= ?,gender_id=?, age= ?,phone_number= ?, city= ?,street_address=?,state=?,postal_code=?  WHERE id= ?;");
    
    $query->bindParam(1, $data[1]);
    $query->bindParam(2, $data[2]);
    $query->bindParam(3,$data[3]);
    $query->bindParam(4,$data[4]);
    $query->bindParam(5,$data[5]);
    $query->bindParam(6, $data[6]);
    $query->bindParam(7, $data[7]);
    $query->bindParam(8, $data[8]);
    $query->bindParam(9,$data[9]);
    $query->bindParam(10,$data[10]);
    $query->bindParam(11,$data[0]);

    try{
        $query->execute();
        return [true];
    }catch(PDOException $e){
        return [];
    }
}

//function that gets a list of the employees ids
function getNumEmployees(){
    $query = dbConnection()->prepare("SELECT e.id FROM employees e ORDER BY e.id ASC;");
    try{
        $query->execute();
        $numEmployees = $query->fetchAll();
        return $numEmployees;
    }catch(PDOException $e){
        return [];
    }
}

//Set the employees ID to show them in dashboard in order
function setIdEmployees($n){
    for($i=0; $i<count($n);$i++){
        $query=dbConnection()->prepare("UPDATE employees SET id=? WHERE id=?;");
        $index = $i+1;
        $index1 = $n[$i][0];
        $query->bindParam(1, $index);
        $query->bindParam(2, $index1);
        try{
            $query->execute();
            if($i == (count($n)-1)){
                return[true];
            }
        }catch(PDOException $e){
            return [];
        }
    }
}

//Set the employees ID gender to show them in dashboard in order
function setIdGender($n){
    for($i=0; $i<count($n);$i++){
        $query=dbConnection()->prepare("UPDATE genders SET id=? WHERE id=?;");
        $index = $i+1;
        $index1 = $n[$i][0];
        $query->bindParam(1, $index);
        $query->bindParam(2, $index1);
        try{
            $query->execute();
            if($i == count($n)-1){
                return[true];
            }
        }catch(PDOException $e){
            return [];
        }
    }
}

//function to delete the user who has the variable $id
function delete($id){
    $query = dbConnection()->prepare("DELETE FROM employees WHERE id=?;");
    $query->bindParam(1, $id);
    try{
        $query->execute();
        return [true];
    }catch(PDOException $e){
        return [];
    }
}
//Function to create a new employee with the values the user inserts on the employee.php form
function createNewEmployee($data){
    $urlAvatar="https://m.media-amazon.com/images/M/MV5BMzI5NDIzNTQ1Nl5BMl5BanBnXkFtZTgwMjQ0Mzc1MTE@._V1_UY256_CR4,0,172,256_AL_.jpg";

    $query=dbConnection()->prepare("INSERT INTO employees (name,last_name, email, gender_id,avatar, age,phone_number,city,street_address,state,postal_code) VALUES (?, ?, ?, ?, ?, ?,?,?,?,?,?);");

    $query->bindParam(1, $data[1]);
    $query->bindParam(2, $data[2]);
    $query->bindParam(3,$data[3]);
    $query->bindParam(4,$data[4]);
    $query->bindParam(5,$urlAvatar);
    $query->bindParam(6,$data[5]);
    $query->bindParam(7, $data[6]);
    $query->bindParam(8, $data[7]);
    $query->bindParam(9, $data[8]);
    $query->bindParam(10,$data[9]);
    $query->bindParam(11,$data[10]);

    try{
        $query->execute();
        return [true];
    }catch(PDOException $e){
        return [];
    }
}