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
        <h2 class="p-5 display-4 text-center">Pokedex Nacional</h2>

        <select id="types">
            <option value="all" selected>All Pokemons</option>
            <?php foreach ($types as $key => $value) { ?>
                <option value="<?= $types[$key]["name"] ?>"><?= $types[$key]["name"] ?></option>
            <?php } ?>
        </select>

        <section class="cards card-pokemons"></section>
    </main>

    <script src="<?=BASE_URL?>/php-mvc-pattern-basics-workshop/assets/js/utils.js"></script>
</body>