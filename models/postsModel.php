<?php
require_once "helper/dbConnection.php";



function getById($id)
{
    $query = conn()->prepare("SELECT id, post_user_id, category_id, title, description, date, time FROM posts WHERE post_user_id = $id");
    try {
        $query->execute();
        $posts = $query->fetchAll();
        return $posts;
    } catch (PDOException $e) {
        return [];
    }
}
