<?php

function error()
{
    require_once VIEWS . '/error/error.php';
}

function getAllGods()
{
    require_once MODELS . "godsModel.php";
    $data = getAll();
    include_once VIEWS . '/gods/godsAll.php';
}

function getGodId($godId)
{
    require_once MODELS . "godsModel.php";
    $data = getId($godId);
    include_once VIEWS . '/individual/individual.php';
}

if (isset($_GET['controller']) && !isset($_GET['action'])) {
    getAllGods();
} elseif (isset($_GET['controller']) && isset($_GET['action'])) {
    if ($_GET['action'] == 'getId' && isset($_GET['id'])) {
        getGodId($_GET['id']);
    } else {
        error();
    }
} else {
    error();
}
