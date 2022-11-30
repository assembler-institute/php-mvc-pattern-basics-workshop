<?php

require_once 'helpers/dbConnection.php';

function get()
{
    $query = conn()->prepare("SELECT s.id_song, s.name, s.duration, s.publish_date,s.gender, a.name as name_album
    FROM songs s LEFT JOIN albums a ON s.id_album = a.id_album
    ORDER BY s.id_song ASC;");

    try {
        $query->execute();
        $songs = $query->fetchAll();
        return $songs;
    } catch (PDOException $e) {
        return [];
    }
}

function getById($id)
{
    $query = conn()->prepare("SELECT id_song, name, duration, publish_date, gender, id_album
    FROM songs
    WHERE id_song = $id;");

    try {
        $query->execute();
        $song = $query->fetch();
        return $song;
    } catch (PDOException $e) {
        return [];
    }
}


function getAllAlbumsSongs(){
    $query = conn()->prepare("SELECT id_album, name 
    FROM albums
    ORDER BY id_album ASC;");

    try {
        $query->execute();
        $albums = $query->fetchAll();
        return $albums;
    } catch (PDOException $e) {
        return [];
    }
}

function getAllSingersSong(){
    $query = conn()->prepare("SELECT id_singer, name 
    FROM singers
    ORDER BY id_singer ASC;");

    try {
        $query->execute();
        $albums = $query->fetchAll();
        return $albums;
    } catch (PDOException $e) {
        return [];
    }
}

function create($song){
/*     print_r(empty($song['id_album']));
    die();  */
    $dbh = conn();
    $query = $dbh->prepare("INSERT INTO songs (name,duration,publish_date, gender, id_album)
    VALUES
    (?, ?, ?, ?, ?);");

    $query->bindParam(1, $song["name"]);
    $query->bindParam(2, $song["duration"]);
    $query->bindParam(3, $song["publish_date"]);
    $query->bindParam(4, $song["gender"]);
    $id_album = (empty($song["id_album"])) ? null : $song["id_album"];
    $query->bindParam(5, $id_album);

    try {
        
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        
        echo $result;
        die();
        return [true];
    } catch (PDOException $e) {
        return [false, $e];
    }
}


function update($song)
{
    
    $query = conn()->prepare("UPDATE songs
    SET name = ?, duration = ?, publish_date = ?, gender = ?, id_album = ? 
    WHERE id_song = ?;");

    $query->bindParam(1, $song["name"]);
    $query->bindParam(2, $song["duration"]);
    $query->bindParam(3, $song["publish_date"]);
    $query->bindParam(4, $song["gender"]);
    $id_album = (empty($song["id_album"])) ? null : $song["id_album"];
    $query->bindParam(5, $id_album);
    $query->bindParam(6, $song["id_song"]);
    
    try {
        $query->execute();
        return [true];
    } catch (PDOException $e) {
        return [false, $e];
    }
}

function delete($id)
{
    $query = conn()->prepare("DELETE FROM songs WHERE id_song = ?");
    $query->bindParam(1, $id);

    try {
        $query->execute();
        return [true];
    } catch (PDOException $e) {
        return [false, $e];
    }
}
