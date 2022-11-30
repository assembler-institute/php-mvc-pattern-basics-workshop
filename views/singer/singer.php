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

<?php
if ($action == "getSinger" && (!isset($singer) || !$singer || sizeof($singer) == 0)) {
    echo "<p>The singer does not exists!</p>";
} else if (isset($error)) {
    echo "<p>$error</p>";
}
?>
<nav>
    <div class="nav-wrapper blue">
      <ul id="nav-mobile" class="left hide-on-med-and-down">
        <li class="active"><a href="index.php?controller=singer&action=getAllSingers">Singers</a></li>
        <li ><a href="index.php?controller=album&action=getAllAlbums">Albums</a></li>
        <li><a href="index.php?controller=song&action=getAllSongs">Songs</a></li>
      </ul>
    </div>
  </nav>
    <div class="container max-w-4xl h-screen">
    <div class="flex space-x-5 pb-10 pt-10 items-center">
    <div><span class="material-icons" style="font-size:50px;">face</span></div>
            <div class="text-5xl"><?php echo isset($singer) ? "Edit": "Create"?> Singer</div>
        </div>
            <div class="row">
            <form class="col s12" action="index.php?controller=singer&action=<?php echo isset($singer['id_singer']) ? "updateSinger" : "createSinger" ?>" method="POST">
            <input type="hidden" name="id_singer" value="<?php echo isset($singer['id_singer']) ? $singer['id_singer'] : null ?>">
            <div class="row">
                <div class="input-field col s6">
                <input name="name"id="name" type="text" class="validate" required value="<?php echo isset($singer['name']) ? $singer['name'] : null ?>">
                <label for="name">Name</label>
                </div>
                <div class="input-field col s6">
                <input id="surname" type="text" name="surname" class="validate" required value="<?php echo isset($singer['surname']) ? $singer['surname'] : null ?>">
                <label for="surname">Surname</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                <input  id="discography" name="discography" type="text" class="validate" required value="<?php echo isset($singer['discography']) ? $singer['discography'] : null ?>" >
                <label for="discography">Discography</label>
                </div>
                <div class="input-field col s6">
                <input id="birth_date" name="birth_date" type="date" class="validate" required value="<?php echo isset($singer['birth_date']) ? $singer['birth_date'] : date('Y-m-d'); ?>" >
                <label for="birth_date">Birth Date</label>
                </div>
            </div>
            <div class="row">
            <div class="input-field col s">
                <input id="country" name="country" type="text" class="validate" required value="<?php echo isset($singer['country']) ? $singer['country'] : null ?>">
                <label for="country">Country</label>
                </div>
            </div>
            <button class="btn" type="submit">SEND</button>
            <a class='btn' href='' onclick="window.history.go(-1);return false;">Back</a></td>
            </form>
        </div>
    </div>
</body>
</html>
