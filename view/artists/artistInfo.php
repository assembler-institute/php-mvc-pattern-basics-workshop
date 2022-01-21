<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once(BASE_PATH . "/assets/" . "templates/head.php"); ?>
    <title>Artists | Wiki's Gallery</title>
</head>

<body>
    <?php
    require_once(BASE_PATH . "/assets/" . "templates/header.html"); ?>

    <h1 class="text-center"><?= $info["first_name"] . " " . $info["last_name"] ?></h1>
    <main class="d-flex justify-content-center gap-5">
        <img class="productImg rounded" src="<?= ASSETS . "img/" . $info["artist_photo"] ?>">
        <article class="d-flex flex-column justify-content-center information">
            <h4>First name: <?= $info["first_name"] ?></h4>
            <h4>Last name: <?= $info["last_name"] ?></h4>
            <hr>
            <h5>History: <?= $info["information"] ?></h5>
        </article>
    </main>
    <!-- TODO INSERT CARROUSELL -->
    <!-- TODO INSERT CONTAINER  -->

    </main>
</body>