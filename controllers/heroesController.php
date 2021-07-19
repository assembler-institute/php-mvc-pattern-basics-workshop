<?php

function error()
{
    require_once VIEWS . '/error/error.php';
}

function getAllHeroes()
{
    require_once MODELS . "heroesModel.php";
    $data = getAll();
    include_once VIEWS . '/heroes/heroesAll.php';
}

function getHeroId()
{
    require_once MODELS . "heroesModel.php";
    $data = getId($_GET['id']);
    include_once VIEWS . '/individual/individual.php';
}

function submitHero()
{
    require_once MODELS . "heroesModel.php";
    $posted = post($_REQUEST);
    if ($posted) {
        Header('Location: index.php?controller=heroes');
    } else {
        error();
    }
}

function removeHero()
{
    require_once MODELS . "heroesModel.php";
    $removed = remove($_GET['id']);
    if ($removed) {
        Header('Location: index.php?controller=heroes');
    } else {
        error();
    }
}

if (isset($_GET['controller']) && !isset($_GET['action'])) {
    getAllHeroes();
} elseif (isset($_GET['controller']) && isset($_GET['action'])) {
    if ($_GET['action'] == 'getId' && isset($_GET['id'])) {
        getHeroId($_GET['id']);
    } elseif ($_GET['action'] == 'createHero') {
        include_once VIEWS . '/heroes/createHero.php';
    } elseif ($_GET['action'] == 'submitHero') {
        submitHero();
    } elseif ($_GET['action'] == 'remove') {
        removeHero();
    } else {
        error();
    }
} else {
    error();
}
