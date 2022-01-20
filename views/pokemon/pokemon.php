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
        <h2 class="text-center my-5">Información Detallada sobre Pokemon</h2>
        <div class="container my-5">
            <div class="row">
                <div class="col-md-4 text-center pokeinfo-img">
                    <img src="<?= $pokemon["avatar"] ?>">
                </div>
                <div class="col-md-8 text-center bg-blue">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-around">
                            <div>
                                <p class="text-white">Name</p>
                                <p>Nº<?= $pokemon["id"] ?> : <?= $pokemon["name"] ?></p>
                            </div>

                            <div>
                                <p class="text-white">Categoria</p>
                                <p><?= $pokemon["categoria"] ?></p>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-around">
                            <div>
                                <p class="text-white">Altura</p>
                                <p><?= $pokemon["altura"] ?>m</p>
                            </div>

                            <div>
                                <p class="text-white">Peso</p>
                                <p><?= $pokemon["peso"] ?>kg</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end py-5">
                <a href="?controller=pokemon&action=getAllPokemons"><button class="btn btn-primary">Volver a la pokedex</button></a>
            </div>
        </div>
    </main>
</body>