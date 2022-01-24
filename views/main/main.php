<!-- This is the main generic view of your application, it's not required to use it -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASE_URL.'/assets/css/style.css'?>">
</head>

<body>
<div class="divide" >
<div class="img" style="border: none; background-image: url('http://m.gettywallpapers.com/wp-content/uploads/2020/11/Brawl-Stars-Wallpaper.jpg')" > 
<a href="?controller=brawl&action=getbrawls">
    <p style="color: white">Brawlers</p>
    </a>
</div>
 <div style="border: none; background-image: url('https://scontent-mad1-1.xx.fbcdn.net/v/t1.6435-9/197344824_822928531745214_4383334119921038439_n.jpg?_nc_cat=111&ccb=1-5&_nc_sid=973b4a&_nc_ohc=c1CDDueoS88AX-qqeen&_nc_ht=scontent-mad1-1.xx&oh=00_AT8pTKjonTIrBwegv7NzPGHkoDcN6Fv4C2WVAYdOAJBYhg&oe=620D8AAD')">
 <a href="?controller=class&seeBrawl=checkRarity">
<p style="color: white" >Class/Rarity</p>
</a>
</div>
</div>
    <!-- <h1>Welcome to MVC Pattern Basics!</h1>
    <div class="list-group">
        <a class="list-group-item list-group-item-action" href="?controller=brawl&action=getbrawls">Brawls</a>
        <a class="list-group-item list-group-item-action" href="?controller=class&seeBrawl=checkRarity">Rarity brawls</a> -->
</body>

</html>
<!-- <a href="?controller=brawl&action=getbrawls"> <img src="http://m.gettywallpapers.com/wp-content/uploads/2020/11/Brawl-Stars-Wallpaper.jpg" alt="" style="width: 100%; height:843px"></a> </div>
<div>
<img src="https://scontent-mad1-1.xx.fbcdn.net/v/t1.6435-9/197344824_822928531745214_4383334119921038439_n.jpg?_nc_cat=111&ccb=1-5&_nc_sid=973b4a&_nc_ohc=c1CDDueoS88AX-qqeen&_nc_ht=scontent-mad1-1.xx&oh=00_AT8pTKjonTIrBwegv7NzPGHkoDcN6Fv4C2WVAYdOAJBYhg&oe=620D8AAD" alt=""
style="width: 100%"> -->