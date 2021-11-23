<?php

require_once("helpers/dbConnection.php");


function getAll()
{
    $query = conn()->prepare("SELECT id, first_name, last_name, country
    FROM authors;");

    try {
        $query->execute();
        $authors = $query->fetchAll();
        return $authors;
    } catch (PDOException $e) {
        return [];
    }
}

function getAuthById($id)
{
    $query = conn()->prepare("SELECT id, first_name, last_name, country, language, death_date, death_age
    FROM authors
    WHERE id = $id;");

    try {
        $query->execute();
        $author = $query->fetch();
        return $author;
    } catch (PDOException $e) {
        return [];
    }
}

function addAuthor($author)
{
    // $query = conn()->prepare("INSERT INTO authors (first_name, last_name, country, language, death_date, death_age) values ($author['first_name'], $author['last_name'], $author['country'], $author['language'], $author['death_date'], $author['death_age'])");

    $query = conn()->prepare("INSERT INTO authors (first_name, last_name, country, language, death_date, death_age) values (
        ?, ?, ?, ?, ?, ?);");

    $query->bindParam(1, $author['first_name']);
    $query->bindParam(2, $author['last_name']);
    $query->bindParam(3, $author['country']);
    $query->bindParam(4, $author['language']);
    $query->bindParam(5, $author['death_date']);
    $query->bindParam(6, $author['death_age']);

    try {
        $query->execute();
        return [true];
    } catch (PDOException $e) {
        return [false, $e];
    }
}

function updateAuth($author)
{
    $query = conn()->prepare("UPDATE authors
    SET first_name = ?, last_name = ?, country = ?, language = ?, death_date = ?, death_age = ?
    WHERE id = ?;");

    $query->bindParam(1, $author['first_name']);
    $query->bindParam(2, $author['last_name']);
    $query->bindParam(3, $author['country']);
    $query->bindParam(4, $author['language']);
    $query->bindParam(5, $author['death_date']);
    $query->bindParam(6, $author['death_age']);
    $query->bindParam(7, $author['id']);

    try {
        $query->execute();
        return [true];
    } catch (PDOException $e) {
        return [false, $e];
    }
}

function deleteAuth($id)
{
    $query = conn()->prepare("DELETE FROM authors
    WHERE id = $id;");

    try {
        $query->execute();
        return [true];
    } catch (PDOException $e) {
        return [false, $e];
    }
}
