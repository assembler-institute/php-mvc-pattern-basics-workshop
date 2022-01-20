<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/combat.css">
    <script src="assets/js/combat.js" defer></script>
    <title>Document</title>
</head>
<body>
    <DIV class="pokemon">
    <img id="imgPoke" src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/<?= $id["id"]?>.png" class="imgPoke">
</DIV>
<div id="imgPokeDiv"><?= $id["id"]?></div>

    <div class="EF">
        <h2>Efective Againts</h2>
        <?php 
        foreach($tipostot as $info){
            if($info[0]>1){
                ?> 
                 <img src="<?= $info[1]?>" alt="">
                <?php
            }
        }
        ?>
    </div>

    <div class="NEF">
        <h2>No Efective Againts</h2>
    <?php 
        foreach($tipostot as $info){
            if($info[0]<1&&$info[0]>0){
                ?> 
                 <img src="<?= $info[1]?>" alt="">
                <?php
            }
        }
        ?>
    </div>

    

    <div class="IN">
        <h2>Not Efective</h2>
    <?php 
        foreach($tipostot as $info){
            if($info[0]==0){
                ?> 
                 <img src="<?= $info[1]?>" alt="">
                <?php
            }
        }
        ?>
    </div>
</body>
</html>