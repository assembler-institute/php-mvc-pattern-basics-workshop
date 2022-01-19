<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once(ASSETS . "templates/head.html"); ?>
    <title>Artists | Wiki's Gallery</title>
</head>

<body>
    <?php require_once(ASSETS . "templates/header.html"); ?>
    <main>
        <?php
        foreach ($artists as $key => $artist) {

            print_r($artist);
            echo "<br>";
        }
        ?>
    </main>
</body>

</html>