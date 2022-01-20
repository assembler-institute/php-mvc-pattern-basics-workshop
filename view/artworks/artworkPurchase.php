<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once(BASE_PATH . "/assets/" . "templates/head.php"); ?>
    <title><?= $work["artwork_name"] ?> | Wiki's Gallery</title>

<body>
    <?php require_once(BASE_PATH . "/assets/"  . "templates/header.html"); ?>
    <main class="d-flex justify-content-center gap-5">
        <img class="productImg rounded" src="<?= ASSETS . "img/" . $work["artwork_photo"] ?>">
        <article class="d-flex flex-column justify-content-center information">
            <h4>Name: <?= $work["artwork_name"] ?></h4>
            <hr>
            <h5>History: <?= $work["artwork_name"] ?></h5>
            <hr>
            <h5 id="price"> <?= $work["price"] ?></h5>
            <?php
            if ($work["is_bought"] == 1) {
                echo '<button type="button" class="btn btn-warning disabled  btn-lg">SOLD!</button>';
            } else {
                echo '<button type="button" class="btn btn-success  btn-lg">Buy it now!</button>';
            }
            ?>
        </article>
    </main>
    <script>
        window.onload = function() {
            const price = document.getElementById("price");
            formatPrice(price);
        }
    </script>

    <body>


</html>