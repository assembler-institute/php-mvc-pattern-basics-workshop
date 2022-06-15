<?php
require_once("helper/dbConnection.php");

//Function to get Hobbies to show them on travelDashboard.php
function getHobbies(){
    $query=dbConnection()->prepare("SELECT e.id, e.name, e.last_name, h.name as 'hobbieName', h.type FROM employees e LEFT JOIN hobbies h ON e.id=h.id ORDER BY e.id ASC;");
    try{
        $query->execute();
        $hobbiesEmployees = $query->fetchAll();
        return $hobbiesEmployees;
    }catch(PDOException $e){
        return [];
    }
}

//Function to get Hobbies to show them on travel.php
function getHobbiesEmployee($id){
   
    $index = $id["id"];
    $query=dbConnection()->prepare("SELECT e.id, e.name, e.last_name, h.name as 'hobbieName', h.type FROM employees e LEFT JOIN hobbies h ON e.id=h.id WHERE e.id = ?;");
    $query->bindParam(1, $index);
    try{
        $query->execute();
        $hobbiesEmployee = $query->fetchAll();
        return $hobbiesEmployee;
    }catch(PDOException $e){
        return [];
    }
}

//Function to create or updates hobbies
function setHobbieEmployee($hobbieEmployee){
    $index= $hobbieEmployee[0];
    $index1=$hobbieEmployee[3];
    $index2=$hobbieEmployee[4];

    $nHobbies = getNumEmployeesHobbies();
    $flag = false;//Create a new hobbie

    for($i = 0; $i < count($nHobbies); $i++){
        if(in_array($index,$nHobbies[$i])){
            $flag = true;//Update
            $i = count($nHobbies);
        }
    }

    if(!$flag){
        $query=dbConnection()->prepare("INSERT INTO hobbies (id, name, type) VALUES (?, ?, ?);");
        $query->bindParam(1, $index);
        $query->bindParam(2, $index1);
        $query->bindParam(3, $index2);
        try{
            $query->execute();
            $hobbiesEmployee = $query->fetchAll();
            return $hobbiesEmployee;
        }catch(PDOException $e){
            return [];
        }
    }else{
        $query=dbConnection()->prepare("UPDATE hobbies SET name=?, type=? WHERE id=?;");
        $query->bindParam(3, $index);
        $query->bindParam(1, $index1);
        $query->bindParam(2, $index2);
        try{
            $query->execute();
            $hobbiesEmployee = $query->fetchAll();
            return $hobbiesEmployee;
        }catch(PDOException $e){
            return [];
        }
    }
}

function getNumEmployeesHobbies(){
    $query=dbConnection()->prepare("SELECT id FROM hobbies;");
    try{
        $query->execute();
        $num = $query->fetchAll();
        return $num;
    }catch(PDOException $e){
        return [];
    }
}