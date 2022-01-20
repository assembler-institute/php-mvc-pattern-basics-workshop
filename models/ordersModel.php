<?php

require_once("helper/dbConnection.php");

function get($id)
{
    $query = conn()->prepare("SELECT `productos`.`NOMBREARTÍCULO`, `pedidos`.`CÓDIGOCLIENTE`,`clientes`.`EMPRESA`
    FROM `productos` 
        INNER JOIN `pedidos` ON `pedidos`.`CÓDIGOARTÍCULO` = `productos`.`CÓDIGOARTÍCULO`
        INNER JOIN `clientes` ON `pedidos`.`CÓDIGOCLIENTE` = `clientes`.`CÓDIGOCLIENTE`
    WHERE `pedidos`.`CÓDIGOCLIENTE` = '$id';");

    try {
        $query->execute();
        $order = $query->fetchAll();
        return $order;
    } catch (PDOException $e) {
        return [];
    }
}