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

        $sql = "SELECT id, `name`, hero_type, `power`, original FROM heroes";
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

        $sql = "SELECT id, `name`, hero_type, `power`, home, mother, father, original FROM heroes WHERE id ='" . $id . "'";
        $result = mysqli_query($conn, $sql);
        $data = $result->fetch_assoc();
        $conn->close();

        return ($data);
    } catch (Exception $e) {
        echo "Something went wrong!";
        echo $e;
    }
}

function post($heroData)
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

        $sql = "INSERT INTO heroes ( `name`, hero_type, `power`, home, mother, father, original)
            VALUES ('" . $heroData['heroName'] . "', '" . $heroData['heroType'] . "', '"
            . $heroData['heroPower'] . "', '" . $heroData['heroHome'] . "', '" . $heroData['heroMother'] . "', '"
            . $heroData['heroFather'] . "', 0)";
        $result = mysqli_query($conn, $sql);
        $conn->close();

        return ($result);
    } catch (Exception $e) {
        echo "Something went wrong!";
        echo $e;
    }
}

function remove($id)
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

        $sql = "DELETE FROM heroes WHERE id = $id";
        $result = mysqli_query($conn, $sql);
        $conn->close();

        return ($result);
    } catch (Exception $e) {
        echo "Something went wrong!";
        echo $e;
    }
}
