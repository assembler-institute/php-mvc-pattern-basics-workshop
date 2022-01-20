<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once(BASE_PATH . "/assets/" . "templates/head.php"); ?>
    <title>Artists | Wiki's Gallery</title>
</head>

<body>
    <?php require_once(BASE_PATH . "/assets/" . "templates/header.html"); ?>

    <h1 class="text-center"><?= $info["first_name"] . " " . $info["last_name"] ?></h1>
    <main class="ms-3 row row-cols-1 row-cols-md-2  row-cols-xl-4 g-3">
        <img src="assets/img/<?= $info["artist_photo"] ?>" class="rounded mx-auto d-block" alt="...">
        <!-- TODO INSERT CARROUSELL -->
        <!-- TODO INSERT CONTAINER  -->

    </main>
</body>