<?php
require_once("helper/dbConnection.php");
function get()
{
    try {
        $query = conn()->prepare(
            "SELECT * FROM artists"
        );
        $query->execute();
        $artists = $query->fetchAll();
        return $artists;
    } catch (PDOException $e) {
        return [];
    }
}

function getInformationArtist($id)
{

    try {
        $query = conn()->prepare(
            "SELECT 
            artists.first_name,
            artists.last_name,
            artists.artist_photo,
            artists.birthday,
            aInfo.information,
            w.artwork_photo
            FROM artists_info aInfo
            INNER JOIN artworks w
            INNER JOIN artists
            ON aInfo.id_artist=w.id_artist AND artists.id=aInfo.id_artist
            WHERE artists.id=$id;"
        );
        $query->execute();
        $info = $query->fetchAll();
        return $info;
    } catch (PDOException $e) {
        error($e);
    }
}
