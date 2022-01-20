<!-- This is the main generic view of your application, it's not required to use it -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=BASE_URL?>/php-mvc-pattern-basics-workshop/assets/css/style.css">
</head>

<body>
    <main>
        <?php require_once(BASE_PATH . "/assets/template/navbar.html"); ?>
        <h2 class="p-5 display-4 text-center">Tipos de los pokemons</h2>
        <section class="cards cards-type text-center" id="cards-type">
            <?php foreach ($types as $key => $value) { ?>
                <article class="card border-0">
                <img class="card-img-top card-img-top-type" src="<?=$types[$key]["avatar"]?>" alt="Card image cap">
                <div class="card-body">
                    <h6 class="card-title"><?= $types[$key]["name"]?></h6>
                </div>
            </article>
            <?php } ?>
        </section>
    </main>
</body>