<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once(ASSETS . "templates/head.html"); ?>
    <title>Artists | Wiki's Gallery</title>
</head>

<body>
    <?php require_once(ASSETS . "templates/header.html"); ?>

    <h1 class="text-center"><?= $info["first_name"] . " " . $info["last_name"] ?></h1>
    <main class="ms-3 row row-cols-1 row-cols-md-2  row-cols-xl-4 g-3">
        <img src="assets/img/<?= $info["artist_photo"] ?>" alt="">
        <!-- TODO INSERT CARROUSELL -->
        <!-- TODO INSERT CONTAINER  -->
        <?php

        ?>
    </main>
</body>