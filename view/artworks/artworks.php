<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once(BASE_PATH . "/assets/" . "templates/head.php"); ?>
    <title>Wiki's Gallery</title>
</head>

<body>
    <?php require_once(BASE_PATH . "/assets/"  . "templates/header.html"); ?>
    <main class="ms-3 row row-cols-1 row-cols-md-2  row-cols-xl-4 g-3">
        <?php foreach ($artworks as $key => $artwork) :
        ?>
            <div class="col">
                <div class=" card" style="width: 18rem;">
                    <img src="<?= "assets/img/" . $artwork["artwork_photo"] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $artwork["artwork_name"] . " " . $artwork["last_name"] ?></h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>
                        <a href="?controller=artworks&action=getInfo&id=<?= $artwork["id"] ?>" class="btn btn-primary">More information</a>
                        <button type="button" class="btn btn-outline-danger">Purchase</button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

</body>

</html>