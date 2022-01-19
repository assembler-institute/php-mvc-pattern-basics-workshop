<?php
require_once("helper/dbConnection.php");
function get()
{
    $query = conn()->prepare(
        "SELECT * FROM artists"
    );
    try {
        $query->execute();
        $artists = $query->fetchAll();
        return $artists;
    } catch (PDOException $e) {
        return [];
    }
}
