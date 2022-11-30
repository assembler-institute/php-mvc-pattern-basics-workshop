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
        <li><a href="index.php?controller=album&action=getAllAlbums">Albums</a></li>
        <li><a href="index.php?controller=song&action=getAllSongs">Songs</a></li>
      </ul>
    </div>
  </nav>
    <div class="container max-w-4xl h-screen">
        <div class="flex space-x-5 pb-10 pt-10 items-center">
            <div><span class="material-icons" style="font-size:50px;">music_note</span></div>
            <div class="text-5xl"><?php echo (isset($songs[0])) ? $songs[0]['name_singer']." Song's": 'There are no songs!';?> </div>
            <div><a class="btn-floating btn-small waves-effect waves-light blue" href='?controller=song&action=createSong'><i class="material-icons">add</i></a></div>
        </div>

        <table class="striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Duration</th>
                <th>Publish Date</th>
                <th>Gender</th>
                <th>Album</th>
            </tr>
            </thead>

            <tbody>
                <?php foreach ($songs as $index => $song) {
    echo "<tr>";
    echo "<td>" . $song["id_song"] . "</td>";
    echo "<td>" . $song["name"] . "</td>";
    echo "<td>" . $song["duration"] . "</td>";
    echo "<td>" . $song["publish_date"] . "</td>";
    echo "<td>" . $song["gender"] . "</td>";
    echo "<td>" . $song["name_album"] . "</td>";
    echo "</tr>";
}?>
            </tbody>
        </table>
    </div>
</body>
</html>
