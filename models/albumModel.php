<?php

require_once 'helpers/dbConnection.php';

function get()
{
    $query = conn()->prepare("SELECT a.id_album, a.name, a.publish_date, a.price, s.name as name_singer
    FROM albums a,singers s WHERE s.id_singer = a.id_singer
    ORDER BY id_album ASC;");

    try {
        $query->execute();
        $albums = $query->fetchAll();
        return $albums;
    } catch (PDOException $e) {
        return [];
    }
}

function getById($id)
{
    $query = conn()->prepare("SELECT id_album,name, publish_date, price, id_singer
    FROM albums
    WHERE id_album = $id;");

    try {
        $query->execute();
        $album = $query->fetch();
        return $album;
    } catch (PDOException $e) {
        return [];
    }
}

function getAllSingersAlbum(){
    $query = conn()->prepare("SELECT id_singer, name 
    FROM singers
    ORDER BY id_singer ASC;");

    try {
        $query->execute();
        $singers = $query->fetchAll();
        return $singers;
    } catch (PDOException $e) {
        return [];
    }
}

function create($album){
    $query = conn()->prepare("INSERT INTO albums (name, publish_date, price, id_singer)
    VALUES
    (?, ?, ?, ?);");

    $query->bindParam(1, $album["name"]);
    $query->bindParam(2, $album["publish_date"]);
    $query->bindParam(3, $album["price"]);
    $query->bindParam(4, $album["id_singer"]);

    try {
        $query->execute();
        return [true];
    } catch (PDOException $e) {
        return [false, $e];
    }
}

function update($album)
{
    
    $query = conn()->prepare("UPDATE albums
    SET name = ?, publish_date = ?, price = ?, id_singer = ? 
    WHERE id_album = ?;");

    $query->bindParam(1, $album["name"]);
    $query->bindParam(2, $album["publish_date"]);
    $query->bindParam(3, $album["price"]);
    $query->bindParam(4, $album["id_singer"]);
    $query->bindParam(5, $album["id_album"]);
    
    try {
        $query->execute();
        return [true];
    } catch (PDOException $e) {
        return [false, $e];
    }
}

function delete($id)
{
    $query = conn()->prepare("DELETE FROM albums WHERE id_album = ?");
    $query->bindParam(1, $id);

    try {
        $query->execute();
        return [true];
    } catch (PDOException $e) {
        return [false, $e];
    }
}
