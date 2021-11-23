<?php

require_once "helpers/dbConnection.php";

function get()
{
    $query = conn()->prepare("SELECT id, title, language, year, mov_id, author_id
    FROM books;");
    try {
        $query->execute();
        $books = $query->fetchAll();
        return $books;
    } catch (PDOException $e) {
        return [];
    }
}

function getById($id)
{
    $query = conn()->prepare("SELECT * FROM books WHERE id = $id;");

    try {
        $query->execute();
        $book = $query->fetch();
        return $book;
    } catch (PDOException $e) {
        return [];
    }
}

function add($book)
{
    $movement = intval($book["mov_id"]);

    $query = conn()->prepare("INSERT INTO books (title, language, year, mov_id) values (?, ?, ?, ?);");

    $query->bindParam(1, $book["title"]);
    $query->bindParam(2, $book["language"]);
    $query->bindParam(3, $book["year"]);
    // $query->bindParam(4, $book["author"]);
    $query->bindParam(4, $movement);

    try {
        $query->execute();
        return [true];
    } catch (PDOException $e) {
        return [false, $e];
    }
}

function update($book)
{
    $query = conn()->prepare("UPDATE books
    SET title = ?, language = ?, year = ?, mov_id = ?
    WHERE id = ?;");

    $query->bindParam(1, $book["title"]);
    $query->bindParam(2, $book["language"]);
    $query->bindParam(3, $book["year"]);
    // $query->bindParam(4, $book["author"]);
    $query->bindParam(4, $book["mov_id"]);
    $query->bindParam(5, $book["id"]);

    try {
        $query->execute();
        return [true];
    } catch (PDOException $e) {
        return [false, $e];
    }
}

function delete($id)
{
    $query = conn()->prepare("DELETE FROM books WHERE id = $id;");

    try {
        $query->execute();
        return [true];
    } catch (PDOException $e) {
        return [false, $e];
    }
}

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
