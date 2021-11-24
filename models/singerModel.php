<?php

require_once 'helpers/dbConnection.php';

function get()
{
    $query = conn()->prepare("SELECT id_singer, name, surname, discography, birth_date, country
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

function getById($id)
{
    $query = conn()->prepare("SELECT id_singer, name, surname, discography, birth_date, country
    FROM singers
    WHERE id_singer = $id;");

    try {
        $query->execute();
        $singer = $query->fetch();
        return $singer;
    } catch (PDOException $e) {
        return [];
    }
}

function getSongs($id){
    $query = conn()->prepare("SELECT son.id_song,son.name,son.duration,son.publish_date,son.gender,sin.name as name_singer ,alb.name as name_album
    FROM songs son 
    LEFT JOIN singer_song sing_song
    ON son.id_song = sing_song.id_song
    LEFT JOIN albums alb 
    ON  son.id_album = alb.id_album
    LEFT JOIN singers sin
    ON sin.id_singer = sing_song.id_singer
    WHERE sing_song.id_singer = $id;");

    try {
        $query->execute();
        $songs = $query->fetchAll();
        return $songs;
    } catch (PDOException $e) {
        return [];
    }
}

function create($singer)
{

    $query = conn()->prepare("INSERT INTO singers (name, surname, discography, birth_date, country, created_at) VALUES (?, ?, ?, ?, ?, ?);");

    $query->bindParam(1, $singer["name"]);
    $query->bindParam(2, $singer["surname"]);
    $query->bindParam(3, $singer["discography"]);
    $query->bindParam(4, $singer["birth_date"]);
    $query->bindParam(5, $singer["country"]);
    $date = new DateTime();
    $date = $date->format('Y-m-d H:i:s');
    $query->bindParam(6, $date);

    try {
        $query->execute();
        return [true];
    } catch (PDOException $e) {
        return [false, $e];
    }
}

function update($singer)
{
    $query = conn()->prepare("UPDATE singers
    SET name = ?, surname = ?, discography = ?, birth_date = ?, country = ?, updated_at = ?
    WHERE id_singer = ?;");

    $query->bindParam(1, $singer["name"]);
    $query->bindParam(2, $singer["surname"]);
    $query->bindParam(3, $singer["discography"]);
    $query->bindParam(4, $singer["birth_date"]);
    $query->bindParam(5, $singer["country"]);
    $date = new DateTime();
    $date = $date->format('Y-m-d H:i:s');
    $query->bindParam(6, $date);
    $query->bindParam(7, $singer["id_singer"]);
   

    try {
        $query->execute();
        return [true];
    } catch (PDOException $e) {
        return [false, $e];
    }
}

function delete($id)
{
    $query = conn()->prepare("DELETE FROM singers WHERE id_singer = ?");
    $query->bindParam(1, $id);

    try {
        $query->execute();
        return [true];
    } catch (PDOException $e) {
        return [false, $e];
    }
}
