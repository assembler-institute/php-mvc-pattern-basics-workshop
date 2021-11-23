<?php
require_once "helper/dbConnection.php";


function getSubjects()
{
    $query = conn()->prepare("SELECT * FROM subjects");
    try {
        $query->execute();
        $subjects = $query->fetchAll();
        return $subjects;
    } catch (PDOException $e) {
        return [];
    }
}

function getById($id)
{
    $query = conn()->prepare("SELECT  s.id ,s.subjects_name, a.id, a.title, a.grades, date FROM anotations a INNER JOIN subjects s ON a.subjects_id=s.id WHERE anotations_user_id =$id;");
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
    ON  u.id = a.anotations_user_id WHERE  a.subjects_id = s.id ORDER BY grades DESC LIMIT 10;");
    try {
        $query->execute();
        $anotations = $query->fetchAll();
        return $anotations;
    } catch (PDOException $e) {
        return [];
    }
}

function create($anotation)
{ {
        $query = conn()->prepare("INSERT INTO anotations (anotations_user_id,subjects_id,title,grades,date)
    VALUES
    (?, ?, ?, ?, ?);");

        $query->bindParam(1, $anotation["anotations_user_id"]);
        $query->bindParam(2, $anotation["subjects_id"]);
        $query->bindParam(3, $anotation["title"]);
        $query->bindParam(4, $anotation["grades"]);
        $query->bindParam(5, $anotation["date"]);

        try {
            $query->execute();
            return [true];
        } catch (PDOException $e) {
            return [false, $e];
        }
    }
}

function deleteById($id)
{
    $query = conn()->prepare("DELETE FROM anotations WHERE id = $id");
    try {
        $query->execute();
    } catch (PDOException $e) {
        error($e->getMessage());
    }
}
