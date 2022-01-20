<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once(BASE_PATH . "/assets/" . "templates/head.php"); ?>
    <title>Main | Wiki's Gallery</title>
</head>

<body>
    <?php require_once(BASE_PATH . "/assets/" . "templates/header.html"); ?>
    <h1 class="mainTitle">Welcome to Wiki's Gallery</h1>

    <?php
    if (isset($purchaseMsg)) {
        echo '<div class="alert alert-info" role="alert">
            ' . $purchaseMsg . '
          </div>';
    }
    ?>

</body>

</html>