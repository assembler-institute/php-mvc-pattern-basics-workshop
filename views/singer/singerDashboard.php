<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Singers Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js" defer></script>
</head>
<body>
<nav>
    <div class="nav-wrapper blue">
      <ul id="nav-mobile" class="left hide-on-med-and-down">
        <li class="active"><a href="index.php?controller=singer&action=getAllSingers">Singers</a></li>
        <li><a href="index.php?controller=album&action=getAllAlbums">Albums</a></li>
        <li><a href="index.php?controller=song&action=getAllSongs">Songs</a></li>
      </ul>
    </div>
  </nav>
    <div class="container max-w-4xl h-screen">
        
        <div class="flex space-x-5 pb-10 pt-10 items-center">
            <div><span class="material-icons" style="font-size:50px;">face</span></div>
            <div class="text-5xl">Singer Dashboard</div>
            <div><a class="btn-floating btn-small waves-effect waves-light blue" href='?controller=singer&action=createSinger'><i class="material-icons">add</i></a></div>
        </div>


        <table class="striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Surname</th>
                <th>Discography</th>
                <th>Birth Date</th>
                <th>Country</th>
                <th>Actions</th>
            </tr>
            </thead>

            <tbody>
                <?php foreach ($singers as $index => $singer) {
    echo "<tr>";
    echo "<td>" . $singer["id_singer"] . "</td>";
    echo "<td>" . $singer["name"] . "</td>";
    echo "<td>" . $singer["surname"] . "</td>";
    echo "<td>" . $singer["discography"] . "</td>";
    echo "<td>" . $singer["birth_date"] . "</td>";
    echo "<td>" . $singer["country"] . "</td>";
    echo "<td colspan='3'>
                    <a class='waves-effect waves-light btn' href='?controller=singer&action=getSinger&id=" . $singer["id_singer"] . "'><i class='material-icons'>edit</i></a>
                    <a class='waves-effect waves-light btn red' href='?controller=singer&action=deleteSinger&id=" . $singer["id_singer"] . "'><i class='material-icons'>delete</i></a>
                    <a class='waves-effect waves-light btn orange' href='?controller=singer&action=getSongSinger&id=" . $singer["id_singer"] . "'><i class='material-icons'>music_note</i></a></td>";
    echo "</tr>";
}?>
            </tbody>
        </table>
    </div>
</body>
</html>
