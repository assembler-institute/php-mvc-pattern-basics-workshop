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
  <?php
    foreach ($BRAWLS as $brawlers) {
        $imagen =$brawlers["imagen"];
        $nombre =$brawlers["nombre"];
        $descripcion =$brawlers["descripcion"];
        $rareza =$brawlers["rareza"];
        $clase =$brawlers["clase"];
        $baseId=$brawlers["idBase"];
    }
  ?>
<div class="container-fluid post-type1">
<div class="container mb-3 pt-3">
<div class="row">
<div class="container">
<img class="brl-big-ico" src="<?= $imagen?>" title="<?= $nombre?>" alt="">
<h1 class="mr-2 mt-1 mb-1 h2 shadow-normal"><?= $nombre?></h1>
<h3 class="h6"><span class="text-hp3">Class: <?= $clase?></span></h3>
<h2 class="rarity1 h6 shadow-normal">Rarity: <?= $rareza?></h2>
</div>
</div>
</div>
<div class="container pb-5">
<div class="brawler-desc pt-1 pl-2 pr-1 pb-0 mb-2 dark-border">
<div class="text-center text-md-left">
<span class="desc-title shadow-normal">About <?= $nombre?></span>
</div>
<p class="mb-0 pl-2 pr-2 pb-2 shadow-normal"><?= $descripcion?></p>
</div>

<div class="pt-0 container">
<div class="row">
<div class="col-12 col-md-6">
<div class="card card-body post-type4 dark-border p-0 mb-2">
<video id="Bull-Main-Attack" width="640" height="640" class="dark-border-btm img-fluid" poster="https://cdn.brawlify.com/videos/preview/<?= $nombre?>-Main-Attack.jpg" preload="metadata" controls="" controlslist="nodownload">
<source src="https://cdn.brawlify.com/videos/<?= $nombre?>-Main-Attack.mp4" type="video/mp4">

<p class="text-hp">Your browser does not support HTML5 videos.</p>
</video>
<div class="p-1 super-desc text-center" style="border: none; background-image: url('https://i.redd.it/iapqmzd3zu721.jpg')">
<span class="super-title">ATTACK</span>
</div>
</div>
</div>
<div class="col-12 col-md-6">
<div class="card card-body post-type4 dark-border p-0 mb-2">
<video id="Bull-Super" width="640" height="640" class="dark-border-btm img-fluid" poster="https://cdn.brawlify.com/videos/preview/<?= $nombre?>-Super.jpg" preload="metadata" controls="" controlslist="nodownload">
<source src="https://cdn.brawlify.com/videos/<?= $nombre?>-Super.mp4" type="video/mp4">
 <p class="text-hp" >Your browser does not support HTML5 videos.</p>
</video>
<div class="p-1 super-desc text-center" style="border: none; background-image: url('https://i.redd.it/iapqmzd3zu721.jpg')">
<span class="super-title">SUPER</span>
</div>
</div>
</div>
</div>
</div>
</body>
</html>