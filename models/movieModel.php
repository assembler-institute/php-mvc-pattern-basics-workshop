<?php
require_once("./config/dbConst.php");

function getMovies()
{
    try {
        $dbConst = mysqli_connect(DB_HOST, USER_NAME, DB_PASSWORD, DB_NAME);
        $query = "SELECT * FROM movies;";
        $response = mysqli_query($dbConst, $query);
        return mysqli_fetch_all($response);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

function getMovieById($id)
{
    try {
        $dbConst = mysqli_connect(DB_HOST, USER_NAME, DB_PASSWORD, DB_NAME);
        $query = "SELECT * FROM movies WHERE movie_id = $id;";
        $response = mysqli_query($dbConst, $query);
        return mysqli_fetch_all($response);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

function newMovie($request)
{
    try {
        $dbConst = mysqli_connect(DB_HOST, USER_NAME, DB_PASSWORD, DB_NAME);
        $newMovie = mysqli_query($dbConst, "SELECT * FROM movies WHERE movie_name = '$request[movie_name]', released_year = '$request[released_year]', runtime = '$request[runtime]'");
        if (mysqli_num_rows($newMovie) > 0) {
            return "Movie already exists";
        } else {
            mysqli_query(
                $dbConst,
                "INSERT INTO movies (movie_name, released_year, runtime)
                VALUES ('$request[movie_name]', '$request[released_year]', '$request[runtime]');
                "
            );
            return "New movie created successfully!";
        }
    } catch (Exception $e) {
        $e->getMessage();
    }
}

function update($request)
{
    try {
        $dbConst = mysqli_connect(DB_HOST, USER_NAME, DB_PASSWORD, DB_NAME);
        mysqli_query($dbConst, "UPDATE movies SET movie_name = '$request[movie_name]', released_year = '$request[released_year]', runtime = '$request[runtime]' 
        WHERE movie_id = '$request[movie_id]'");
        return "Updated successfully!";
    } catch (Exception $e) {
        return $e->getMessage();
    }
}

function deleteMovieById($id)
{
    try {
        $dbConst = mysqli_connect(DB_HOST, USER_NAME, DB_PASSWORD, DB_NAME);
        $checkMovie = mysqli_query($dbConst, "SELECT * FROM movies WHERE movie_id = $id");
        if (mysqli_num_rows($checkMovie) == 0) {
            return "Movie does not exist";
        } else {
            mysqli_query($dbConst, "DELETE FROM movies where movie_id = $id");
            return "Deleted successfully";
        }
    } catch (Exception $e) {
        $e->getMessage();
    }
}
