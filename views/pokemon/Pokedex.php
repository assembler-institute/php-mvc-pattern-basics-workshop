<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
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
    <tr>
      <th scope="row"><?= $pokemon["id"]?></th>
      <td><img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/<?= $pokemon["id"]?>.png" alt="">  </td>
      <td><?= $pokemon["name"];?></td>
      <td><img src="<?=$pokemon["img"]; ?>" alt=""></td>
    </tr>
    <?php
} ?>

  </tbody>
</table>
</body>
</html>