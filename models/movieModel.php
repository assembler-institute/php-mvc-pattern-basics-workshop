<?php
require_once("./config/dbConst.php");

function get()
{
    try {
        $dbConst = mysqli_connect(DB_HOST, USER_NAME, DB_PASSWORD, DB_NAME);
        $query = "SELECT * FROM movies";
        $response = mysqli_query($dbConst, $query);
        return mysqli_fetch_all($response);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

function getById($id)
{
    try {
        $dbConst = mysqli_connect(DB_HOST, USER_NAME, DB_PASSWORD, DB_NAME);
        $query = "SELECT * FROM movies WHERE movie_id = $id";
        $response = mysqli_query($dbConst, $query);
        return mysqli_fetch_all($response);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
