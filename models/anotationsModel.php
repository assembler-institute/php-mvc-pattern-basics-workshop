<?php
require_once "helper/dbConnection.php";



function getById($id)
{
    $query = conn()->prepare("SELECT s.subjects_name, a.title, a.grades, date FROM anotations a INNER JOIN subjects s ON a.subjects_id=s.id WHERE anotations_user_id = $id ORDER BY grades DESC LIMIT 10;");
    try {
        $query->execute();
        $anotations = $query->fetchAll();
        return $anotations;
    } catch (PDOException $e) {
        return [];
    }
}

function getRanking()
{
    $query = conn()->prepare("SELECT u.id,u.name, s.subjects_name , a.title, a.grades 
    FROM users u INNER JOIN subjects s INNER JOIN anotations a
    ON  u.id = a.anotations_user_id WHERE  a.subjects_id = s.id;");
    try {
        $query->execute();
        $anotations = $query->fetchAll();
        return $anotations;
    } catch (PDOException $e) {
        return [];
    }
}
