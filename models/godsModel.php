<?php

function getAll()
{
    try {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "greek_mythology";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT id, greek_name, roman_name, `power` FROM gods";
        $result = mysqli_query($conn, $sql);
        $data = [];
        while ($row = $result->fetch_assoc()) {
            array_push($data, $row);
        }
        $conn->close();

        return ($data);
    } catch (Exception $e) {
        echo "Something went wrong!";
        echo $e;
    }
}


function getId($id)
{
    try {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "greek_mythology";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT id, greek_name, roman_name, `power`, symbol, father, mother FROM gods WHERE id ='" . $id . "'";
        $result = mysqli_query($conn, $sql);

        $data = $result->fetch_assoc();
        $conn->close();

        return ($data);
    } catch (Exception $e) {
        echo "Something went wrong!";
        echo $e;
    }
}
