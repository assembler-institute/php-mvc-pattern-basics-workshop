<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Album Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js" defer></script>
</head>
<body>
<nav>
    <div class="nav-wrapper blue">
      <ul id="nav-mobile" class="left hide-on-med-and-down">
        <li><a href="index.php?controller=singer&action=getAllSingers">Singers</a></li>
        <li class="active"><a href="index.php?controller=album&action=getAllAlbums">Albums</a></li>
        <li><a href="index.php?controller=song&action=getAllSongs">Songs</a></li>
      </ul>
    </div>
  </nav>
    <div class="container max-w-4xl h-screen">


        <div class="flex space-x-5 pb-10 pt-10 items-center">
            <div><span class="material-icons" style="font-size:50px;">album</span></div>
            <div class="text-5xl">Album Dashboard</div>
            <div><a class="btn-floating btn-small waves-effect waves-light clue" href='?controller=album&action=createAlbum'><i class="material-icons">add</i></a></div>
        </div>


        <table class="striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Publish Date</th>
                <th>Price</th>
                <th>Singer</th>
                <th>Actions</th>
            </tr>
            </thead>

            <tbody>
                <?php foreach ($albums as $index => $album) {
    echo "<tr>";
    echo "<td>" . $album["id_album"] . "</td>";
    echo "<td>" . $album["name"] . "</td>";
    echo "<td>" . $album["publish_date"] . "</td>";
    echo "<td>" . $album["price"] . "</td>";
    echo "<td>" . $album["name_singer"] . "</td>";
    echo "<td colspan='2'>
                    <a class='waves-effect waves-light btn' href='?controller=album&action=getAlbum&id=" . $album["id_album"] . "'><i class='material-icons'>edit</i></a>
                    <a class='waves-effect waves-light btn red' href='?controller=album&action=deleteAlbum&id=" . $album["id_album"] . "'><i class='material-icons'>delete</i></a></td>";
    echo "</tr>";
}?>
            </tbody>
        </table>
    </div>
</body>
</html>
