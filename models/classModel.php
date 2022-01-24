<?php
require_once("helper/dbConnection.php");

function show(){
    // print_r()
    $queryk = conn()->prepare("SELECT e.name as rareza, e.color as color, a.name as nombre, a.image as imagen, a.id as idmain, i.name as clase FROM rarity e INNER JOIN BRAWL a ON e.id=a.idrarity INNER JOIN class i ON a.idclase = i.id;");
    try {
        $queryk->execute();
        $brawlclass = $queryk->fetchAll();
        return $brawlclass;
    } catch (PDOException $e) {
        return [];
    }
}
function showClass(){
    $queryk = conn()->prepare("SELECT a.name as clase, b.name as nombre, b.image as imagen,b.id as idmain, c.name as rareza, c.color as color FROM class a INNER JOIN BRAWL b ON a.id=b.idclase INNER JOIN rarity c ON c.id=b.idrarity order by a.name;");
    try {
        $queryk->execute();
        $brawlclass = $queryk->fetchAll();
        return $brawlclass;
    } catch (PDOException $e) {
        return [];
    }
}