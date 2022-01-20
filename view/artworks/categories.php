<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once(BASE_PATH . "/assets/" . "templates/head.php"); ?>
    <title>Categories | Wiki's Gallery</title>
    <style>
        .card:hover {
            background-color: lightgray;
            opacity: 0.9;
            transition: 1s;
            cursor: pointer;
        }

        .card {
            width: 40%;
        }
    </style>
</head>

<body>
    <?php require_once(BASE_PATH . "/assets/"  . "templates/header.html"); ?>
    <h1 class="text-center">Categories</h1>
    <main class="row justify-content-center">
        <!-- TODO fetch all categories -->
        <?php foreach ($categories as $key => $category) : ?>

            <div onclick="window.location='?controller=artworks&action=getArtworksByCat&catId=<?= $category['id_cat'] ?>'" class="card mb-3 ms-2">
                <img src="<?= "assets/img/" . $category["cat_img"] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h3 class="card-title"><?= $category["cat_name"] ?></h3>
                </div>
            </div>


        <?php endforeach; ?>
    </main>
</body>