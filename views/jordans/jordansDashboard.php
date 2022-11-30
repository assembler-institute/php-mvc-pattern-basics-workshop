<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
    <h1>Jordans page!</h1>
    <style type="text/css">

    </style>
    <table class="table">
        <thead>
            <tr>
                <th class="tg-0pky">ID</th>
                <th class="tg-0pky">Name</th>
                <th class="tg-0lax">Clothes</th>
                <th class="tg-0lax">Price</th>
                <th class="tg-0lax">Size</th>
                <th class="tg-0lax">Shipment</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($jordans as $index => $jordans) {
                echo "<tr>";
                echo "<td class='tg-0lax'>" . $jordans["id"] . "</td>";
                echo "<td class='tg-0lax'>" . $jordans["name"] . "</td>";
                echo "<td class='tg-0lax'>" . $jordans["clothes"] . "</td>";
                echo "<td class='tg-0lax'>" . $jordans["price"] . "</td>";
                echo "<td class='tg-0lax'>" . $jordans["size"] . "</td>";
                echo "<td class='tg-0lax'>" . $jordans["shipment"] . "</td>";
                echo "<td colspan='2' class='tg-0lax'>
                <a class='btn btn-secondary' href='?controller=jordans&action=getJordan&id=" . $jordans["id"] . "'>Edit</a>
                <a class='btn btn-danger' href='?controller=jordans&action=deleteJordan&id=" . $jordans["id"] . "'>Delete</a>
                </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <a id="home" class="btn btn-primary" href="?controller=jordans&action=createJordan">Create</a>
    <a id="home" class="btn btn-secondary" href="./">Back</a>
    <div>
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a6/Logo_NIKE.svg/1200px-Logo_NIKE.svg.png" alt="" style="width: 70%;">
    </div>
</body>
</html>