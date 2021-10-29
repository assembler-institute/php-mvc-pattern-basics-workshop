<?php
require_once("./config/dbConst.php");


function get()
{
    try {
        $dbConst = mysqli_connect(DB_HOST, USER_NAME, DB_PASSWORD, DB_NAME);
        $query = "SELECT * FROM employees;";
        $response = mysqli_query($dbConst, $query);
        return mysqli_fetch_all($response);
    } catch (Exception $e) {
        return $e->getMessage();
    }
}
function getEmployeeById($id)
{
    try {
        $dbConst = mysqli_connect(DB_HOST, USER_NAME, DB_PASSWORD, DB_NAME);
        $query = "SELECT * FROM employees WHERE emp_id = $id";
        $response = mysqli_query($dbConst, $query);
        return mysqli_fetch_all($response);
    } catch (Exception $e) {
        return $e->getMessage();
    }
}

function newEmployee($request)
{
    try {
        $dbConst = mysqli_connect(DB_HOST, USER_NAME, DB_PASSWORD, DB_NAME);
        $newEmployee = mysqli_query($dbConst, "SELECT * FROM employees WHERE first_name = '$request[first_name]', last_name = '$request[last_name]' , gender = '$request[gender]', age = '$request[age]'");
        if ($newEmployee) {
            return "Employee already exists";
        } else {
            mysqli_query(
                $dbConst,
                "INSERT INTO employees (first_name, last_name, gender, age) 
                VALUES ('$request[first_name]', '$request[last_name]', '$request[gender]', '$request[age]');
                "
            );
            return "New employee created successfully!";
        }
    } catch (Exception $e) {
        $e->getMessage();
    }
}

function updateEmployeeById($request)
{
    try {
        $dbConst = mysqli_connect(DB_HOST, USER_NAME, DB_PASSWORD, DB_NAME);
        mysqli_query($dbConst, "UPDATE employees SET first_name = '$request[first_name]', last_name = '$request[last_name]', gender = '$request[gender]', age = '$request[age]' 
        WHERE emp_id = '$request[emp_id]'");
        return "Updated successfully!";
    } catch (Exception $e) {
        return $e->getMessage();
    }
}

function deleteEmployeeById($id)
{
    try {
        $dbConst = mysqli_connect(DB_HOST, USER_NAME, DB_PASSWORD, DB_NAME);
        $checkEmployee = mysqli_query($dbConst, "SELECT * FROM employees WHERE emp_id = $id");
        if (mysqli_num_rows($checkEmployee) == 0) {
            return "Employee does not exist";
        } else {
            mysqli_query($dbConst, "DELETE FROM employees where emp_id = $id");
            return "Deleted successfully";
        }
    } catch (Exception $e) {
        $e->getMessage();
    }
}
