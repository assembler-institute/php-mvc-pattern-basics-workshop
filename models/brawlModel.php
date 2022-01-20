<?php
require_once("helper/dbConnection.php");

function get(){
    // return true;
    // print_r()
    $queryk = conn()->prepare(" SELECT a.name as nombre, a.image as imagen, a.id as idBase,a.description as descripcion, e.name as clase, i.name as rareza FROM BRAWL a INNER JOIN class e ON a.idclase= e.id INNER JOIN rarity i ON a.idrarity= i.id;");
    try {
        $queryk->execute();
        $employees = $queryk->fetchAll();
        return $employees;
    } catch (PDOException $e) {
        return [];
    }
}

function getById($id){
}

function DBCREATED(){
    $checking = conn()->prepare("SELECT * FROM BRAWL");
    $checking-> execute();
    $pr= $checking ->fetchAll();
    // print_r($pr);
    if($pr == null){
        $file = RESOURCES."brawls.json";
        $Allusers = file_get_contents($file);
            $usersAll = json_decode($Allusers);
            $data= $usersAll -> list ;
            foreach ($data as $list) {
                $listid= $list -> id;
                $listname= $list -> name;
                $listdescription= $list -> description;
                $Url= $list -> imageUrl2;
                    $classid= $list -> class -> id;
                    $rarityid= $list -> rarity -> id;
                    $query = conn()->prepare("INSERT INTO BRAWL VALUES( 
                        $listid , '$listname', '$listdescription','$Url', $classid, $rarityid)
                    ");
                    $query->execute();
        }
    }
}
function getBrawler($parm){
    $queryk = conn()->prepare(" SELECT a.name as nombre, a.image as imagen, a.id as idBase,a.description as descripcion, e.name as clase, i.name as rareza FROM BRAWL a INNER JOIN class e ON a.idclase= e.id INNER JOIN rarity i ON a.idrarity= i.id WHERE a.id= $parm;");
    try {
        $queryk->execute();
        $brawluni = $queryk->fetchAll();
        return $brawluni;
    } catch (PDOException $e) {
        return [];
    }
}