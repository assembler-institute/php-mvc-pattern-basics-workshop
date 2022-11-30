<?php
require_once("./config/dbConst.php");
require_once("./config/helper.php");


function get()
{
    try {
        $dbConst = mysqli_connect(DB_HOST, USER_NAME, DB_PASSWORD, DB_NAME);
        $query = "SELECT * FROM employees;";
        $response = mysqli_query($dbConst, $query);
        debug_to_console("OK - You are calling correctly the get() function of the Model");
        return mysqli_fetch_all($response);
    } catch (Exception $e) {
        return $e->getMessage();
        debug_to_console("NOT OK - You are NOT calling correctly to the get() function of the Model");
    }
}
function getEmployeeById($id)
{
    try {
        $dbConst = mysqli_connect(DB_HOST, USER_NAME, DB_PASSWORD, DB_NAME);
        $query = "SELECT * FROM employees WHERE emp_id = $id";
        $response = mysqli_query($dbConst, $query);
        debug_to_console("OK - You are calling correctly the getEmployeeById() function of the Model");
        return mysqli_fetch_all($response);
    } catch (Exception $e) {
        return $e->getMessage();
        debug_to_console("NOT OK - You are NOT calling correctly to the getEmployeeById() function of the Model");
    }
}

function newEmployee($request)
{
    try {
        $dbConst = mysqli_connect(DB_HOST, USER_NAME, DB_PASSWORD, DB_NAME);
        $newEmployee = mysqli_query($dbConst, "SELECT * FROM employees WHERE first_name = '$request[first_name]' AND last_name = '$request[last_name]' AND gender = '$request[gender]' AND age = '$request[age]'");
        if (mysqli_num_rows($newEmployee) > 0) {
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

function newupdateEmployee($request)
{
    try {
        $dbConst = mysqli_connect(DB_HOST, USER_NAME, DB_PASSWORD, DB_NAME);
        $checkEmployee = mysqli_query($dbConst, "SELECT * FROM employees WHERE emp_id = '$request[emp_id]'");
        if (mysqli_num_rows($checkEmployee) == 0) {
            return "Employee does not exist!";
        } else {
            mysqli_query($dbConst, "UPDATE employees SET first_name = '$request[first_name]', last_name = '$request[last_name]', gender = '$request[gender]', age = '$request[age]'");
            return "Updated successfully!";
        }
    } catch (Exception $e) {
        return $e->getMessage();
    }
}

function newdeleteEmployee($id)
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
