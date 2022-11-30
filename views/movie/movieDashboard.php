<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <title>Document</title>
</head>

<body>
    <h1>Movies</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>RELEASED</th>
                <th>RUNNING TIME</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($movies as $movie) {
                echo "<tr>";
                echo "<td>" . $movie[0] . "</td>";
                echo "<td>" . $movie[1] . "</td>";
                echo "<td>" . $movie[2] . "</td>";
                echo "<td>" . $movie[3] . "</td>";
                echo "<td> 
                <a class='btn btn-secondary' href='?controller=movie&action=getMovie&id=" . $movie[0] . "'>Edit</a>
                <a class='btn btn-danger' href='?controller=movie&action=deleteMovie&id=" . $movie[0] . "'>Delete</a>
                </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>