
<?php
$urlf=BASE_URL."/?controller=brawl&action=getbrawl&id=";
foreach ($BRAWLS as $brawlc) {
    if($brawlc["clase"] == "Damage Dealer" ){
        $damage =$brawlc['clase'];
    }
    if($brawlc["clase"] == "Heavyweight" ){
        $heavyweight =$brawlc["clase"];
        
    }
    if($brawlc["clase"] == "Fighter" ){
        $fighter = $brawlc["clase"];
        
    }
    if($brawlc["clase"] == "Assassin" ){
        $assasin = $brawlc["clase"];
        
    }
    if($brawlc["clase"] == "Sharpshooter" ){
        $sharpshooter = $brawlc["clase"];
        
    }
    if($brawlc["clase"] == "Action Assassin" ){
        $action = $brawlc["clase"];
        
    }
    if($brawlc["clase"] == "Support" ){
        $support = $brawlc["clase"]; 
    }
    if($brawlc["clase"] == "Thrower" ){
        $thrower = $brawlc["clase"]; 
    }
    if($brawlc["clase"] == "Batter" ){
        $batter = $brawlc["clase"]; 
    }
    if($brawlc["clase"] == "Stealthy Assassin" ){
        $stealthy = $brawlc["clase"]; 
    }
    if($brawlc["clase"] == "Toxic Assassin" ){
        $toxic = $brawlc["clase"]; 
    }
    if($brawlc["clase"] == "Dashing Assassin" ){
        $dashing = $brawlc["clase"]; 
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
        <li class="nav-item active">
          <a class="nav-link" href="<?= BASE_URL.'?controller=class&seeBrawl=checkRarity'?>">Class/Rarity</a>
        </li>
      </ul>
</nav>
    <div class="dlt">
    <ul class="nav justify-content-center">
  <li class="nav-item">
    <a class="nav-link" style="color:white" href="<?=BASE_URL.'?controller=class&seeBrawl=checkRarity' ?>">By Rarity</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" style="color:white" href="<?=BASE_URL.'?controller=class&seeBrawl=checkClass' ?>">By Class</a>
  </li>
</ul>
<div class="container">

</div>

<div class="container-fluid post-type5">
<div class="container pb-3 pt-3">
<h1 class="display-3 text-white">All Brawlers</h1>
<p class="text-hp h5">List of all brawlers in Brawl Stars. Check their class and their rarity</p>
</div>
</div>
<div class="container-fluid post-type1">
<div class="container pt-4 pb-3"">
    <h2 class='title-brl rarity1 title-small' style='margin-top: -5px; '><?= $damage?></h2>
<?php
foreach ($BRAWLS as $brawlc) {
    # code...
    if($brawlc["clase"] == "Damage Dealer" ){
        $rareza= $brawlc["rareza"];
        $nombre= $brawlc["nombre"];
        $clase= $brawlc["clase"];
        $idmain=$brawlc["idmain"];
        $imagen=$brawlc["imagen"];
        $color=$brawlc["color"];
        echo "
<a href='$urlf$idmain' title='$nombre is a $rareza brawler'><img class='opacity brl-small-ico brl-ico1 mb-1' src='$imagen' alt='$nombre is a $rareza brawler'style='box-shadow: 10px 5px 5px $color;' title='$nombre is a $rareza brawler'></a>
";
    }
}
?>
</div>
</div>
<div class="container-fluid post-type1">
<div class="container pt-4 pb-3"">
    <h2 class='title-brl rarity1 title-small' style='margin-top: -5px; '><?= $heavyweight?></h2>
<?php
foreach ($BRAWLS as $brawlc) {
    # code...
    if($brawlc["clase"] == "Heavyweight" ){
        $rareza= $brawlc["rareza"];
        $nombre= $brawlc["nombre"];
        $clase= $brawlc["clase"];
        $idmain=$brawlc["idmain"];
        $imagen=$brawlc["imagen"];
        $color=$brawlc["color"];
        echo "
<a href='$urlf$idmain' title='$nombre is a $rareza brawler'><img class='opacity brl-small-ico brl-ico1 mb-1' src='$imagen' alt='$nombre is a $rareza brawler' style='box-shadow: 10px 5px 5px $color; title='$nombre is a $rareza brawler'></a>
";
    }
}
?>
</div>
</div>
<div class="container-fluid post-type1">
<div class="container pt-4 pb-3"">
    <h2 class='title-brl rarity1 title-small' style='margin-top: -5px; '><?= $fighter?></h2>
<?php
foreach ($BRAWLS as $brawlc) {
    # code...
    if($brawlc["clase"] == "Fighter" ){
        $rareza= $brawlc["rareza"];
        $nombre= $brawlc["nombre"];
        $clase= $brawlc["clase"];
        $idmain=$brawlc["idmain"];
        $imagen=$brawlc["imagen"];
        $color=$brawlc["color"];
        echo "
<a href='$urlf$idmain' title='$nombre is a $rareza brawler'><img class='opacity brl-small-ico brl-ico1 mb-1' src='$imagen' alt='$nombre is a $rareza brawler' style='box-shadow: 10px 5px 5px $color; title='$nombre is a $rareza brawler'></a>
";
    }
}
?>
</div>
</div>
<div class="container-fluid post-type1">
<div class="container pt-4 pb-3"">
    <h2 class='title-brl rarity1 title-small' style='margin-top: -5px; '><?= $assasin?></h2>
<?php
foreach ($BRAWLS as $brawlc) {
    # code...
    if($brawlc["clase"] == "Assassin" ){
        $rareza= $brawlc["rareza"];
        $nombre= $brawlc["nombre"];
        $clase= $brawlc["clase"];
        $idmain=$brawlc["idmain"];
        $imagen=$brawlc["imagen"];
        $color=$brawlc["color"];
        echo "
<a href='$urlf$idmain' title='$nombre is a $rareza brawler'><img class='opacity brl-small-ico brl-ico1 mb-1' src='$imagen' alt='$nombre is a $rareza brawler' style='box-shadow: 10px 5px 5px $color; title='$nombre is a $rareza brawler'></a>
";
    }
}
?>
</div>
</div>
<div class="container-fluid post-type1">
<div class="container pt-4 pb-3"">
    <h2 class='title-brl rarity1 title-small' style='margin-top: -5px; '><?= $action?></h2>
<?php
foreach ($BRAWLS as $brawlc) {
    # code...
    if($brawlc["clase"] == "Action Assassin" ){
        $rareza= $brawlc["rareza"];
        $nombre= $brawlc["nombre"];
        $clase= $brawlc["clase"];
        $idmain=$brawlc["idmain"];
        $imagen=$brawlc["imagen"];
        $color=$brawlc["color"];
        echo "
<a href='$urlf$idmain' title='$nombre is a $rareza brawler'><img class='opacity brl-small-ico brl-ico1 mb-1' src='$imagen' alt='$nombre is a $rareza brawler' style='box-shadow: 10px 5px 5px $color; title='$nombre is a $rareza brawler'></a>
";
    }
}
?>
</div>
</div>
<div class="container-fluid post-type1">
<div class="container pt-4 pb-3"">
    <h2 class='title-brl rarity1 title-small' style='margin-top: -5px; '><?= $support?></h2>
<?php
foreach ($BRAWLS as $brawlc) {
    # code...
    if($brawlc["clase"] == "Support" ){
        $rareza= $brawlc["rareza"];
        $nombre= $brawlc["nombre"];
        $clase= $brawlc["clase"];
        $idmain=$brawlc["idmain"];
        $imagen=$brawlc["imagen"];
        $color=$brawlc["color"];
        echo "
<a href='$urlf$idmain' title='$nombre is a $rareza brawler'><img class='opacity brl-small-ico brl-ico1 mb-1' src='$imagen' alt='$nombre is a $rareza brawler' style='box-shadow: 10px 5px 5px $color; title='$nombre is a $rareza brawler'></a>
";
    }
}
?>
</div>
</div>
<div class="container-fluid post-type1">
<div class="container pt-4 pb-3"">
    <h2 class='title-brl rarity1 title-small' style='margin-top: -5px; '><?= $thrower?></h2>
<?php
foreach ($BRAWLS as $brawlc) {
    # code...
    if($brawlc["clase"] == "Thrower" ){
        $rareza= $brawlc["rareza"];
        $nombre= $brawlc["nombre"];
        $clase= $brawlc["clase"];
        $idmain=$brawlc["idmain"];
        $imagen=$brawlc["imagen"];
        $color=$brawlc["color"];
        echo "
<a href='$urlf$idmain' title='$nombre is a $rareza brawler'><img class='opacity brl-small-ico brl-ico1 mb-1' src='$imagen' alt='$nombre is a $rareza brawler' style='box-shadow: 10px 5px 5px $color; title='$nombre is a $rareza brawler'></a>
";
    }
}
?>
</div>
</div>
<div class="container-fluid post-type1">
<div class="container pt-4 pb-3"">
    <h2 class='title-brl rarity1 title-small' style='margin-top: -5px; '><?= $batter?></h2>
<?php
foreach ($BRAWLS as $brawlc) {
    # code...
    if($brawlc["clase"] == "Batter" ){
        $rareza= $brawlc["rareza"];
        $nombre= $brawlc["nombre"];
        $clase= $brawlc["clase"];
        $idmain=$brawlc["idmain"];
        $imagen=$brawlc["imagen"];
        $color=$brawlc["color"];
        echo "
<a href='$urlf$idmain' title='$nombre is a $rareza brawler'><img class='opacity brl-small-ico brl-ico1 mb-1' src='$imagen' alt='$nombre is a $rareza brawler' style='box-shadow: 10px 5px 5px $color; title='$nombre is a $rareza brawler'></a>
";
    }
}
?>
</div>
</div>
<div class="container-fluid post-type1">
<div class="container pt-4 pb-3"">
    <h2 class='title-brl rarity1 title-small' style='margin-top: -5px; '><?= $stealthy?></h2>
<?php
foreach ($BRAWLS as $brawlc) {
    # code...
    if($brawlc["clase"] == "Stealthy Assassin" ){
        $rareza= $brawlc["rareza"];
        $nombre= $brawlc["nombre"];
        $clase= $brawlc["clase"];
        $idmain=$brawlc["idmain"];
        $imagen=$brawlc["imagen"];
        $color=$brawlc["color"];
        echo "
<a href='$urlf$idmain' title='$nombre is a $rareza brawler'><img class='opacity brl-small-ico brl-ico1 mb-1' src='$imagen' alt='$nombre is a $rareza brawler' style='box-shadow: 10px 5px 5px $color; title='$nombre is a $rareza brawler'></a>
";
    }
}
?>
</div>
</div>
<div class="container-fluid post-type1">
<div class="container pt-4 pb-3"">
    <h2 class='title-brl rarity1 title-small' style='margin-top: -5px; '><?= $toxic?></h2>
<?php
foreach ($BRAWLS as $brawlc) {
    # code...
    if($brawlc["clase"] == "Toxic Assassin" ){
        $rareza= $brawlc["rareza"];
        $nombre= $brawlc["nombre"];
        $clase= $brawlc["clase"];
        $idmain=$brawlc["idmain"];
        $imagen=$brawlc["imagen"];
        $color=$brawlc["color"];
        echo "
<a href='$urlf$idmain' title='$nombre is a $rareza brawler'><img class='opacity brl-small-ico brl-ico1 mb-1' src='$imagen' alt='$nombre is a $rareza brawler' style='box-shadow: 10px 5px 5px $color; title='$nombre is a $rareza brawler'></a>
";
    }
}
?>
</div>
</div>
<div class="container-fluid post-type1">
<div class="container pt-4 pb-3"">
    <h2 class='title-brl rarity1 title-small' style='margin-top: -5px; '><?= $dashing?></h2>
<?php
foreach ($BRAWLS as $brawlc) {
    # code...
    if($brawlc["clase"] == "Dashing Assassin" ){
        $rareza= $brawlc["rareza"];
        $nombre= $brawlc["nombre"];
        $clase= $brawlc["clase"];
        $idmain=$brawlc["idmain"];
        $imagen=$brawlc["imagen"];
        $color=$brawlc["color"];
        echo "
<a href='$urlf$idmain' title='$nombre is a $rareza brawler'><img class='opacity brl-small-ico brl-ico1 mb-1' src='$imagen' alt='$nombre is a $rareza brawler' style='box-shadow: 10px 5px 5px $color; title='$nombre is a $rareza brawler'></a>
";
    }
}
?>
</div>
</div>

</body>
</html>