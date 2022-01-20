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
        <h2 class="p-5 display-4 text-center"><strong>INFORMACIÓN SOBRE POKEMON</strong></h2>
        <section class="container">
            <a class="list-group-item list-group-item-action" href="?controller=pokemon&action=getAllPokemons">Pokemon Controller</a>
            <a class="list-group-item list-group-item-action" href="?controller=typePokemon&action=getAllTypes">Tipos de pokemon Controller</a>
        </section>
    </main>
</body>