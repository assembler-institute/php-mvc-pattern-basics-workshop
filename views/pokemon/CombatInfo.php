<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/combat.css">
    <title>Document</title>
</head>
<body>
    <DIV class="pokemon">
    <img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/<?= $id["id"]?>.png" class="imgPoke">
    </DIV>

    <div class="EF">
        <h2>Efective Againts</h2>
        <?php 
        foreach($Cinfo as $info){
            if($info["Efect"]=="EF"){
                ?> 
                 <img src="<?= $info["img"]?>" alt="">
                <?php
            }
        }
        ?>
    </div>

    <div class="NEF">
        <h2>No Efective Againts</h2>
    <?php 
        foreach($Cinfo as $info){
            if($info["Efect"]=="NEF"){
                ?> 
                 <img src="<?= $info["img"]?>" alt="">
                <?php
            }
        }
        ?>
    </div>

    <div class="DB">
        <h2>Weak Againts</h2>
    <?php 
        foreach($Cinfo as $info){
            if($info["Efect"]=="DB"){
                ?> 
                 <img src="<?= $info["img"]?>" alt="">
                <?php
            }
        }
        ?>
    </div>

    <div class="IN">
        <h2>Immune</h2>
    <?php 
        foreach($Cinfo as $info){
            if($info["Efect"]=="IN"){
                ?> 
                 <img src="<?= $info["img"]?>" alt="">
                <?php
            }
        }
        ?>
    </div>
</body>
</html>