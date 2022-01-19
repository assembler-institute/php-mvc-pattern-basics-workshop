<?php
require_once("helper/dbConnection.php");

function get()
{
    $query = conn()->prepare(
        "SELECT cat_name FROM category"
    );
    try {
        $query->execute();
        $categories = $query->fetchAll();
        return $categories;
    } catch (PDOException $e) {
        error($e);
    }
}
