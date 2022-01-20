
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel="stylesheet" href="<?= BASE_URL.'/assets/css/style.css'?>">
<script src="<?= BASE_URL.'/assets/js/utils.js'?>"></script>

    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
  <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="<?= BASE_URL?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="<?= BASE_URL.'?controller=brawl&action=getbrawls'?>">Brawls</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= BASE_URL.'?controller=class&seeBrawl=checkRarity'?>">Class/Rarity</a>
        </li>
      </ul>
</nav>
<div class="row row-cols-1 row-cols-md-3 g-4 peperomano">
  <?php
    foreach ($BRAWLS as $brawlers) {
        $imagen =$brawlers["imagen"];
        $nombre =$brawlers["nombre"];
        $descripcion =$brawlers["descripcion"];
        $rareza =$brawlers["rareza"];
        $clase =$brawlers["clase"];
        $baseId=$brawlers["idBase"];
        echo "<div class='col'>
          <div class='card h-100'>
            <img src='$imagen' class='card-img-top' alt='...'>
            <div class='card-body'>
              <h5 class='card-title'><a href='?controller=brawl&action=getbrawl&id=$baseId'>$nombre</a></h5>
              <p class='card-text'>$descripcion</p>
            </div>
            <div class='card-footer'>
              <small class='text-muted'>Rarity is: $rareza</small>
              </div>
              <div class='card-footer'>
              <small class='text-muted'>Class is $clase</small>
              </div>
          </div>
        </div> ";
    }
  ?>

</div>
</body>
</html>
//! Select para seleccionar las clases y ordenarlas;
<!-- SELECT e.name, e.color, a.name FROM rarity e INNER JOIN BRAWL a ON e.id=a.idrarity; -->
<!-- SELECT e.name, e.color, a.name FROM rarity e INNER JOIN BRAWL a ON e.id=a.idrarity WHERE e.id = 1; -->

<!-- SELECT e.name, e.color, a.name, i.name FROM rarity e INNER JOIN BRAWL a ON e.id=a.idrarity INNER JOIN class i ON i.id= a.idrarity; -->
<!-- SELECT e.name as rareza, e.color as color, a.name as nombre, a.image as imagen, a.id as idmain, i.name as clase FROM rarity e INNER JOIN BRAWL a ON e.id=a.idrarity INNER JOIN class i ON a.idclase = i.id; -->