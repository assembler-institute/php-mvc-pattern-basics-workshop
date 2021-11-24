<?php
require_once("helpers/dbConnection.php");

function get()
{
    $query = conn()->prepare("SELECT agent_code, agent_name, working_area, comission, phone_no, country
    FROM agents 
    -- INNER JOIN genders g ON e.gender_id = g.id
    ORDER BY agent_code ASC;");

    try {
        $query->execute();
        $agents = $query->fetchAll();
        return $agents;
    } catch (PDOException $e) {
        return [];
    }
}

function bringAgentInfo($agent_code) {
    $query = conn()->prepare("SELECT agent_code, agent_name, working_area, comission, phone_no, country
     FROM agents
     WHERE agent_code = '$agent_code'"); 

     try {
        $query->execute();
        $agent = $query->fetchAll();
        return $agent;
    } catch (PDOException $e) {
        return [];
    }
}

function deleteFromDb($agent_code) {
   
   echo $agent_code; 
   $query = conn()->prepare("DELETE FROM agents WHERE agent_code = '$agent_code'");
   echo "hola";

      try {
         $query->execute();
       echo "Done";
     
    } catch (PDOException $e) {
        echo "Error";
        return [];
    }
};

function getUpdatedAgent($agent_code) {
   $a= $_POST;
   echo $name =$a["agent_name"];
   echo "<br>";
   echo $work =$a["working_area"];
   echo "<br>";
   echo $com =$a["comission"];
   echo "<br>";
   echo $ph =$a["phone_no"];
   echo "<br>";
   echo $country =$a["country"];
   echo "<br>";

       $query = conn()->prepare("UPDATE agents SET agent_name = '$name', working_area = '$work', comission = $com, phone_no= $ph, country = '$country' WHERE agent_code = '$agent_code'");


      try {
        $query->execute();
    
    
   } catch (PDOException $e) {
       echo "Error";
       return [];
   }
    
}

function addNewAgent() {
    $query = conn()->prepare("INSERT INTO agents VALUES (
    '$_POST[agent_code]',
    '$_POST[agent_name]',
    '$_POST[working_area]',
    $_POST[comission],
    $_POST[phone_no],
    '$_POST[country]'
    )
    ");
    
    try {
    $query->execute();
    echo "Done";
    } catch (PDOException $e) {
    echo "Error";
    return [];
    }
}

?>