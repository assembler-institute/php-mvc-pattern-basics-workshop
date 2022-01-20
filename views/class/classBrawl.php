
<?php
$urlf=BASE_URL."/?controller=brawl&action=getbrawl&id=";
foreach ($BRAWLS as $brawlc) {
    if($brawlc["rareza"] == "Trophy Road" ){
        $trophy =$brawlc['rareza'];
        $colorT= $brawlc["color"];
    }
    if($brawlc["rareza"] == "Rare" ){
        $rare =$brawlc["rareza"];
        $colorr= $brawlc["color"];
    }
    if($brawlc["rareza"] == "Super Rare" ){
        $superRare = $brawlc["rareza"];
        $colors= $brawlc["color"];
    }
    if($brawlc["rareza"] == "Epic" ){
        $epic = $brawlc["rareza"];
        $colore= $brawlc["color"];
    }
    if($brawlc["rareza"] == "Mythic" ){
        $mythic = $brawlc["rareza"];
        $colorm= $brawlc["color"];
    }
    if($brawlc["rareza"] == "Legendary" ){
        $legendary = $brawlc["rareza"];
        $colorl= $brawlc["color"];
    }
    if($brawlc["rareza"] == "Chromatic" ){
        $chromatic = $brawlc["rareza"];
        $colorc= $brawlc["color"];
    }
}
?>
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
<link rel="stylesheet" href="<?= BASE_URL.'/assets/css/style.css'?>">
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
  <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="<?= BASE_URL?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= BASE_URL.'?controller=brawl&action=getbrawls'?>">Brawls</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="<?= BASE_URL.'?controller=class&seeBrawl=checkRarity'?>">Class/Rarity</a>
        </li>
      </ul>
</nav>

<div class="borrar">
<div class="container">
<ul class="nav justify-content-center">
  <li class="nav-item">
    <a class="nav-link" style="color:white" href="<?=BASE_URL.'?controller=class&seeBrawl=checkRarity' ?>">By Rarity</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" style="color:white"href="<?=BASE_URL.'?controller=class&seeBrawl=checkClass' ?>">By Class</a>
  </li>
</ul>
</div>

<div class="container-fluid post-type5">
<div class="container pb-3 pt-3">
<h1 class="display-3 text-white">All Brawlers</h1>
<p class="text-hp h5">List of all brawlers in Brawl Stars. Check their class and their rarity</p>
</div>
</div>
<div class="container-fluid post-type1" style="background-color:<?php if(isset($trophy)){echo $colorT;}?>">
<div class="container pt-4 pb-3"">
    <h2 class='title-brl rarity1 title-small' style='margin-top: -5px; '><?= $trophy?></h2>
<?php
foreach ($BRAWLS as $brawlc) {
    # code...
    if($brawlc["rareza"] == "Trophy Road" ){
        $rareza= $brawlc["rareza"];
        $nombre= $brawlc["nombre"];
        $clase= $brawlc["clase"];
        $idmain=$brawlc["idmain"];
        $imagen=$brawlc["imagen"];
        echo "
<a href='$urlf$idmain' title='$nombre is a $rareza brawler'><img class='opacity brl-small-ico brl-ico1 mb-1' src='$imagen' alt='$nombre is a $rareza brawler' title='$nombre is a $rareza brawler'></a>
";
    }
}
?>
</div>
</div>

<div class="container-fluid post-type1" style="background-color:<?php if(isset($trophy)){echo $colorr;}?>">
<div class="container pt-4 pb-3">
    <h2 class='title-brl rarity1 title-small' style='margin-top: -5px;'><?= $rare?></h2>
<?php
foreach ($BRAWLS as $brawlc) {
    # code...
    if($brawlc["rareza"] == "Rare" ){
        $rareza= $brawlc["rareza"];
        $nombre= $brawlc["nombre"];
        $clase= $brawlc["clase"];
        $color= $brawlc["color"];
        $idmain=$brawlc["idmain"];
        $imagen=$brawlc["imagen"];
        echo "
<a href='$urlf$idmain' title='$nombre is a $rareza brawler'><img class='opacity brl-small-ico brl-ico1 mb-1' src='$imagen' alt='$nombre is a $rareza brawler' title='$nombre is a $rareza brawler'></a>
";
    }
}
?>
</div>
</div>
<div class="container-fluid post-type1" style="background-color:<?php if(isset($trophy)){echo $colors;}?>">
<div class="container pt-4 pb-3">
    <h2 class='title-brl rarity1 title-small' style='margin-top: -5px;'><?= $superRare?></h2>
<?php
foreach ($BRAWLS as $brawlc) {
    # code...
    if($brawlc["rareza"] == "Super Rare" ){
        $rareza= $brawlc["rareza"];
        $nombre= $brawlc["nombre"];
        $clase= $brawlc["clase"];
        $color= $brawlc["color"];
        $idmain=$brawlc["idmain"];
        $imagen=$brawlc["imagen"];
        echo "
<a href='$urlf$idmain' title='$nombre is a $rareza brawler'><img class='opacity brl-small-ico brl-ico1 mb-1' src='$imagen' alt='$nombre is a $rareza brawler' title='$nombre is a $rareza brawler'></a>
";
    }
}
?>
</div>
</div>
<div class="container-fluid post-type1"  style="background-color:<?php if(isset($trophy)){echo $colore;}?>">
<div class="container pt-4 pb-3">
    <h2 class='title-brl rarity1 title-small' style='margin-top: -5px;'><?=$epic?></h2>
<?php
foreach ($BRAWLS as $brawlc) {
    # code...
    if($brawlc["rareza"] == "Epic" ){
        $rareza= $brawlc["rareza"];
        $nombre= $brawlc["nombre"];
        $clase= $brawlc["clase"];
        $color= $brawlc["color"];
        $idmain=$brawlc["idmain"];
        $imagen=$brawlc["imagen"];
        echo "
<a href='$urlf$idmain' title='$nombre is a $rareza brawler'><img class='opacity brl-small-ico brl-ico1 mb-1' src='$imagen' alt='$nombre is a $rareza brawler' title='$nombre is a $rareza brawler'></a>
";
    }
}
?>
</div>
</div>
<div class="container-fluid post-type1"  style="background-color:<?php if(isset($trophy)){echo $colorm;}?>">
<div class="container pt-4 pb-3" >
    <h2 class='title-brl rarity1 title-small' style='margin-top: -5px;'><?=$mythic?></h2>
<?php
foreach ($BRAWLS as $brawlc) {
    # code...
    if($brawlc["rareza"] == "Mythic" ){
        $rareza= $brawlc["rareza"];
        $nombre= $brawlc["nombre"];
        $clase= $brawlc["clase"];
        $color= $brawlc["color"];
        $idmain=$brawlc["idmain"];
        $imagen=$brawlc["imagen"];
        echo "
<a href='$urlf$idmain' title='$nombre is a $rareza brawler'><img class='opacity brl-small-ico brl-ico1 mb-1' src='$imagen' alt='$nombre is a $rareza brawler' title='$nombre is a $rareza brawler'></a>
";
    }
}
?>
</div>
</div>
<div class="container-fluid post-type1"  style="background-color:<?php if(isset($trophy)){echo $colorl;}?>">
<div class="container pt-4 pb-3" >
    <h2 class='title-brl rarity1 title-small' style='margin-top: -5px;'><?=$legendary?></h2>
<?php
foreach ($BRAWLS as $brawlc) {
    # code...
    if($brawlc["rareza"] == "Legendary" ){
        $rareza= $brawlc["rareza"];
        $nombre= $brawlc["nombre"];
        $clase= $brawlc["clase"];
        $color= $brawlc["color"];
        $idmain=$brawlc["idmain"];
        $imagen=$brawlc["imagen"];
        echo "
<a href='$urlf$idmain' title='$nombre is a $rareza brawler'><img class='opacity brl-small-ico brl-ico1 mb-1' src='$imagen' alt='$nombre is a $rareza brawler' title='$nombre is a $rareza brawler'></a>
";
    }
}
?>
</div>
</div>
<div class="container-fluid post-type1"  style="background-color:<?php if(isset($trophy)){echo $colorc;}?>">
<div class="container pt-4 pb-3" >
    <h2 class='title-brl rarity1 title-small' style='margin-top: -5px;'><?=$chromatic?></h2>
<?php
foreach ($BRAWLS as $brawlc) {
    # code...
    if($brawlc["rareza"] == "Chromatic" ){
        $rareza= $brawlc["rareza"];
        $nombre= $brawlc["nombre"];
        $clase= $brawlc["clase"];
        $color= $brawlc["color"];
        $idmain=$brawlc["idmain"];
        $imagen=$brawlc["imagen"];
        echo "
<a href='$urlf$idmain' title='$nombre is a $rareza brawler'><img class='opacity brl-small-ico brl-ico1 mb-1' src='$imagen' alt='$nombre is a $rareza brawler' title='$nombre is a $rareza brawler'></a>
";
    }
}
?>
</div>
</div>
</div>
</body>
</html>