<?php
require_once("helper/dbConnection.php");

function getCategory()
{
    $query = conn()->prepare(
        "SELECT * FROM category"
    );
    try {
        $query->execute();
        $categories = $query->fetchAll();
        return $categories;
    } catch (PDOException $e) {
        error($e);
    }
}

function getArtworks($id)
{
    $query = conn()->prepare(
        "SELECT 
        category.cat_name,
        artworks.id,
        artworks.artwork_name,
        artists.first_name,
        artists.last_name,
        artworks.artwork_photo
        FROM artworks
        INNER JOIN artists
        INNER JOIN category
        ON artists.id =  artworks.id_artist AND category.id_cat = $id
        WHERE artworks.id_cat = $id;
        "
    );
    try {
        $query->execute();
        $artworks = $query->fetchAll();
        return $artworks;
    } catch (PDOException $e) {
        error("There was an error with the query");
    }
}
function getOneArtwork($id)
{
    $query = conn()->prepare(
        "SELECT * FROM artworks WHERE id=$id"
    );
    try {
        $query->execute();
        $work = $query->fetchAll();
        return $work;
    } catch (PDOException $e) {
        error($e);
    }
}
function purchased($id)
{
    $query = conn()->prepare(
        "UPDATE artworks SET is_bought=1 WHERE id=$id;"
    );
    try {
        $query->execute();
        $purchased = $query->fetchAll();
        return $purchased;
    } catch (PDOException $e) {
        return error("Fail with database");
    }
}
