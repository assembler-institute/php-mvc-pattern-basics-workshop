
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="<?= BASE_URL.'/assets/js/utils.js'?>"></script>

    <title>Document</title>
</head>
<body>
<div class="row row-cols-1 row-cols-md-5 g-4">
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
              <h5 class='card-title'><a href='?controller=employee&action=getbrawl&id=$baseId'>$nombre</a></h5>
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