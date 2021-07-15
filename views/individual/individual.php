<?php

if (isset($data)) {
    if (count($data) > 0 && count($data) < 8) {
        echo "
        <div class='container'>
        <h3 class='mb-4'>" . $data['greek_name'] . "</h3>
        <p><strong>Roman name: </strong>" . $data['roman_name'] . "</p>
        <p><strong>Power: </strong>" . $data['power'] . "</p>
        <p><strong>Symbol: </strong>" . $data['symbol'] . "</p>
        <p><span><strong>Mother: </strong>" . $data['mother'] . "</span><span class='ms-3'><strong>Father: </strong>" . $data['father'] . "</span></p>
        <a href='?controller=gods' class='btn btn-light mt-4'>&#10094; <b>Back</b></a>
        </div>
        ";
    } elseif (count($data) > 0 && count($data) == 8) {
        echo "
        <div class='container'>
        <h3 class='mb-4'>" . $data['name'] . "</h3>
        <p><strong>Hero type: </strong>" . $data['hero_type'] . "</p>
        <p><strong>Power: </strong>" . $data['power'] . "</p>
        <p><strong>Home: </strong>" . $data['home'] . "</p>
        <p><span><strong>Mother: </strong>" . $data['mother'] . "</span><span class='ms-3'><strong>Father: </strong>" . $data['father'] . "</span></p>
        <a href='?controller=heroes' class='btn btn-light mt-4'>&#10094; <b>Back</b></a>
        </div>
        ";
    } else {
        require_once VIEWS . '/error/error.php';
    }
} else {
    require_once VIEWS . '/error/error.php';
}
