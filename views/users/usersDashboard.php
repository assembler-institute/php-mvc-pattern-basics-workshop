<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <br>
    <br>
    <?php
    foreach ($users as $user) {
        echo '<div class="card"> <div class="card-body">';
        echo "<a href=?controller=anotations&action=getAnotationsById&id=" . $user['id'] . "&name=" . $user['name'] . ">" . "<h2>" . $user["name"] . "</h2>" . "</a>";
        echo "<a href=?controller=users&action=getUser&id=" . $user['id'] . ">" . "<button type='button' class='btn btn-success btn-sm'>Edit</button>" . "</a>";
        echo "<a href=?controller=users&action=deleteUser&id=" . $user['id'] . ">" . "<button type='button' class='btn btn-danger btn-sm'>Delete</button>" . "</a>" . "<br>";
        echo '</div> </div>';
    }
    ?>
</body>

</html>