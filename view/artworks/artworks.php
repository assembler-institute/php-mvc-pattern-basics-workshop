<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once(BASE_PATH . "/assets/" . "templates/head.php"); ?>
    <title>Wiki's Gallery</title>
</head>

<body>
    <?php require_once(BASE_PATH . "/assets/"  . "templates/header.html"); ?>
    <h1 class="text-center"><?= $artworks[0]["cat_name"] ?></h1>
    <main class="d-flex flex-column align-items-center">
        <div class="w-75 d-flex gap-5 justify-content-center flex-row flex-wrap">
            <!-- <main class="ms-3 row row-cols-1 row-cols-md-2  row-cols-xl-4 g-3"> -->
            <?php foreach ($artworks as $key => $artwork) : ?>
                <div class="card widthCard">
                    <img src="<?= "assets/img/" . $artwork["artwork_photo"] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $artwork["artwork_name"] ?></h5>
                        <p class="card-text">Auth: <?= $artwork["last_name"] . " " . $artwork["last_name"] ?> </p>
                        <a href="?controller=artworks&action=getInfo&id=<?= $artwork["id"] ?>" class="btn btn-primary disabled">More information</a>
                        <button type="button" onclick="window.location='?controller=artworks&action=getArtworkById&id=<?= $artwork['id'] ?>'" class="btn btn-outline-danger">Purchase</button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>
</body>

</html>