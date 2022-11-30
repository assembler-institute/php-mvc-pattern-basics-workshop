<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THIS IS MAIN VIEW</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

</head>

<body>
    <section>
        <h2>MVC Pattern basics - Employees & Movies </h2>
        <ul class="link-group">
            <li class="list-group-item"><a href="index.php?controller=employee&action=getAllEmployees">Employees</a></li>
            <li class="list-group-item"><a href="index.php?controller=movie&action=getAllMovies">Movies</a></li>

            <!-- Where the user is interacting, clicking, etc, we call to Controllers -->
        </ul>
    </section>
</body>

</html>
<?php
require_once("./config/helper.php");
debug_to_console("OK -You are executing main.php VIEW");
?>