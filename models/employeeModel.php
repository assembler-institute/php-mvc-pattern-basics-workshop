<?php
require_once("helper/dbConnection.php");


function get()
{
    $query = conn()->prepare("SELECT e.id, e.name, e.email, g.name as 'gender', e.city, e.age, e.phone_number
    FROM employees e
    INNER JOIN genders g ON e.gender_id = g.id
    ORDER BY e.id ASC;");

    try {
        $query->execute();
        $employees = $query->fetchAll();
        return $employees;
    } catch (PDOException $e) {
        return [];
    }
}


function getById($id){

  $query = conn()->prepare(
  "SELECT 
  e.name, e.email, g.name as 'gender',
  e.city, e.age, e.phone_number
  FROM employees e 
  INNER JOIN genders g ON e.gender_id = g.id
  WHERE e.id = $id
  ;");

  try {
      $query->execute();
      $employees = $query->fetchAll();
      return $employees;
  } catch (PDOException $e) {
      return [];
  }
}

function getHobbiesByEmployeeId($id) {
  $query = conn()->prepare(
    "SELECT h.name as 'hobbie'
    FROM hobbies h
    INNER JOIN employee_hobbies eh ON h.id = eh.hobbie_id
    WHERE employee_id = $id
    ;");
  
    try {
        $query->execute();
        $employees = $query->fetchAll();
        return $employees;
    } catch (PDOException $e) {
        return [];
    }
}