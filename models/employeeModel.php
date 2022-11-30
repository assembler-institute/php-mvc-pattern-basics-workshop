<?php
require_once("./config/dbConst.php");
require_once("./config/helper.php");


function get()
{
    try {
        $dbConst = mysqli_connect(DB_HOST, USER_NAME, DB_PASSWORD, DB_NAME);
        $query = "SELECT * FROM employees";
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

function createEmployee($employee)
{
    try {
        $dbConst = mysqli_connect(DB_HOST, USER_NAME, DB_PASSWORD, DB_NAME);
        $newEmployee = mysqli_query($dbConst, "SELECT * FROM employees WHERE first_name = '$employee[first_name]' AND last_name = '$employee[last_name]' AND gender = '$employee[gender]' AND age = '$employee[age]'");
        if (mysqli_num_rows($newEmployee) > 0) {
            return "Employee already exists";
        } else {
            mysqli_query(
                $dbConst,
                "INSERT INTO employees (first_name, last_name, gender, age) 
                VALUES ('$employee[first_name]', '$employee[last_name]', '$employee[gender]', '$employee[age]')
                "
            );
            return "New employee created successfully!";
        }
    } catch (Exception $e) {
        $e->getMessage();
    }
}

function updateEmployee($employee)
{
    try {
        $dbConst = mysqli_connect(DB_HOST, USER_NAME, DB_PASSWORD, DB_NAME);
        $checkEmployee = mysqli_query($dbConst, "SELECT * FROM employees WHERE id = '$employee[id]'");
        if (mysqli_num_rows($checkEmployee) == 0) {
            return "Employee does not exist!";
        } else {
            mysqli_query($dbConst, "UPDATE employees SET first_name = '$employee[first_name]', last_name = '$employee[last_name]', gender = '$employee[gender]', age = '$employee[age]'");
            return "Updated successfully!";
        }
    } catch (Exception $e) {
        return $e->getMessage();
    }
}

function deleteEmployee($id)
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
