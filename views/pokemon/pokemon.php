<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
    <link href="assets/css/style.css" rel="stylesheet">
    <script src="assets/js/utils.js" defer></script>
</head>
<body>
<nav id="botonesPokedex">
    <div id="cerrarPokedex" class="btnPokedex"></div>
    <div id="modoShiny" class="btnPokedex"></div>
    <div id="buscadorPokemon" class="btnPokedex"></div>
  </nav>
  <div class="buscardor">
    <form action="./index.php?controller=pokemon&action=getAllPokemons" method="POST">
      <input class="pokebusca" name="buscar" type="text">
      <button>Buscar</button>
    </form>
  </div>
  <div id="tablaTodos" class="overflow-auto">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">NºPokedex</th>
          <th scope="col">appearance</th>
          <th scope="col">Name</th>
          <th scope="col">Types</th>
        </tr>
      </thead>
      <tbody>
      <?php 
      foreach($pokemons as $pokemon){
      ?>
        <tr id="<?=$pokemon["id"]?>" class="pickAPokemon">
          <th scope="row"><?= $pokemon["id"]?></th>
          <td><img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/<?= $pokemon["id"]?>.png" alt="">  </td>
          <td><?= $pokemon["name"];?></td>
          <td><?php foreach($types as $type){
                if($pokemon["tipo1"]==$pokemon["tipo2"]){
                  if($pokemon["tipo1"]==$type["id"]){
                      echo "<img src=".$type["img"].">";
                    }
                }else{
                  if($pokemon["tipo1"]==$type["id"]){
                      echo "<img src=".$type["img"].">";
                      echo "</br>";
                  }
                  if($pokemon["tipo2"]==$type["id"]){
                      echo "<img src=".$type["img"].">";
                  }
                }
                }
        ?></td>
        </tr>
        <?php
    } ?>

    </tbody>
    </table>
</div>
<?php  ?>
<div id="pokemon" class="pokemonData">
        <h3><?= $pokemonSelectedTodo1[0]["name"];?></h3>
        <img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/<?= $pokemonSelectedTodo1[0][0]?>.png" alt="" onmouseover="hover(this)" onmouseout="unhover(this)">
        
        <p><?php
        foreach($pokemonSelectedTodo2 as $type){
                if($pokemonSelectedTodo1[0]["tipo1"]==$pokemonSelectedTodo1[0]["tipo2"]){
                if($pokemonSelectedTodo1[0]["tipo1"]==$type["id"]){
                    echo "<img src=".$type["img"].">";
                    }
                }else{
                if($pokemonSelectedTodo1[0]["tipo1"]==$type["id"]){
                    echo "<img src=".$type["img"].">";
                }
                if($pokemonSelectedTodo1[0]["tipo2"]==$type["id"]){
                    echo "<img src=".$type["img"].">";
                }
                }
            }
        ?></p>

<div id="pokemonIdData"><?= $pokemonSelectedTodo1[0][0]?></div>
        <button class="pokebtn" id="cInfo" data-id="<?= $pokemonSelectedTodo1[0][0]?>">Combat Information</button>
        <button class="pokebtn" id="mInfo" data-name="<?= $pokemonSelectedTodo1[0]["name"];?>">More Info</button>
  </div>
</body>


</html>
