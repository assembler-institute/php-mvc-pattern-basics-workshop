<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once(BASE_PATH . "/assets/" . "templates/head.php"); ?>
    <title>Artists | Wiki's Gallery</title>
</head>

<body>
    <?php require_once(BASE_PATH . "/assets/" . "templates/header.html"); ?>

    <h1 class="text-center">Best artists of all times</h1>
    <main class="d-flex flex-column align-items-center">
        <div class="w-75 d-flex gap-5 justify-content-center flex-row flex-wrap">
            <?php foreach ($artists as $key => $artist) : ?>
                <div class="card widthCard ">
                    <img src="<?= "assets/img/" . $artist["artist_photo"] ?>" class="artistPhoto card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $artist["first_name"] . " " . $artist["last_name"] ?> </h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>
                        <a href="?controller=artists&action=getInfo&id=<?= $artist["id"] ?>" class="btn btn-primary">More information</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>
</body>

</html>