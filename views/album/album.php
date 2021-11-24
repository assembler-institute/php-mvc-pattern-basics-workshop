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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js" defer></script>
</head>
<body>

<?php
if ($action == "getAlbum" && (!isset($album) || !$album || sizeof($album) == 0)) {
    echo "<p>The album does not exists!</p>";
} else if (isset($error)) {
    echo "<p>$error</p>";
}
?>

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
            <div class="text-5xl"><?php echo isset($album) ? "Edit": "Create"?> Album</div>
        </div>
            <div class="row">
            <form class="col s12" action="index.php?controller=album&action=<?php echo isset($album) ? "updateAlbum" : "createAlbum" ?>" method="POST">
            <input type="hidden" name="id_album" value="<?php echo isset($album['id_album']) ? $album['id_album'] : null ?>">
            <div class="row">
                <div class="input-field col s6">
                <input name="name"id="name" type="text" class="validate" required value="<?php echo isset($album['name']) ? $album['name'] : null ?>">
                <label for="name">Name</label>
                </div>
                <div class="input-field col s6">
                <input id="publish_date" name="publish_date" type="date" class="validate" required value="<?php echo isset($album['publish_date']) ? $album['publish_date'] : date('Y-m-d'); ?>" >
                <label for="publish_date">Publish Date</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input  id="price"  step="any" name="price" type="number" class="validate" required value="<?php echo isset($album['price']) ? $album['price'] : null ?>" >
                    <label for="price">Price</label>
                </div>

               <label>Singer</label>
                 <div class="input-field col s6"> 
                    <select class="browser-default" id="id_singer" name="id_singer">
                        <?php foreach ($singers as $index => $singer) {
                            if($album['id_singer'] == $singer['id_singer']){
                                echo "<option value=".$singer['id_singer']." selected>".$singer['name']."</option>";
                            }else{
                                echo "<option value=".$singer['id_singer'].">".$singer['name']."</option>";
                            }
                            
                        }?>
                    </select>
                </div>
            </div>

            <button class="btn" type="submit">SEND</button>
            <a class='btn' href='' onclick="window.history.go(-1); return false;">Back</a></td>
            </form>
        </div>
    </div>
</body>
</html>
