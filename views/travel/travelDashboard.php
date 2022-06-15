<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <nav class="navBar">
        <img class="logo" src="./assets/img/assembler.png">
        <h1>Hobbies Dashboard page!</h1>
        <h4>Welcome @<?php echo USER;?></h4>
    </nav>
    <style type="text/css">

    </style>
    <p><?php echo $msg ?>
    <table class="table">
        <thead>
            <tr>
                <th class="tg-0pky">ID</th>
                <th class="tg-0pky">Name</th>
                <th class="tg-0lax">Last Name</th>
                <th class="tg-0lax">Hobby</th>
                <th class="tg-0lax">Type</th>
                <th class="tg-0lax">ACTIONS</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($employeesHobbies as $index => $employee) {
                echo "<tr>";
                echo "<td class='tg-0lax'>" . $employee["id"] . "</td>";
                echo "<td class='tg-0lax'>" . $employee["name"] . "</td>";
                echo "<td class='tg-0lax'>" . $employee["last_name"] . "</td>";
                echo "<td class='tg-0lax'>" . $employee["hobbieName"] . "</td>";
                echo "<td class='tg-0lax'>" . $employee["type"] . "</td>";
                echo "<td colspan='2' class='tg-0lax'>
                <a class='btn btn-secondary' href='?controller=travel&action=getTravel&id=" . $employee["id"] . "'>Edit</a>
                </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <a id="home" class="btn btn-secondary" href="./">Back</a>
</body>

</html>