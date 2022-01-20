<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once(BASE_PATH . "/assets/" . "templates/head.php"); ?>
    <title>Artists | Wiki's Gallery</title>
</head>

<body>
    <?php require_once(BASE_PATH . "/assets/" . "templates/header.html"); ?>

    <h1 class="text-center">Best artists of all times</h1>
    <main class="ms-3 row row-cols-1 row-cols-md-2  row-cols-xl-4 g-3">
        <?php foreach ($artists as $key => $artist) : ?>
            <div class="col">
                <div class=" card" style="width: 18rem;">
                    <img src="<?= "assets/img/" . $artist["artist_photo"] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $artist["first_name"] . " " . $artist["last_name"] ?> '</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>
                        <a href="?controller=artists&action=getInfo&id=<?= $artist["id"] ?>" class="btn btn-primary">More information</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </main>
</body>

</html>