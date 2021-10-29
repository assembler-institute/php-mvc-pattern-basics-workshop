<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <title>Movie Dashboard</title>
</head>

<body>
    <h1 class="ml-3">Movies</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>RELEASED</th>
                <th>RUNNING TIME</th>
                <th><?php echo "<a class='btn btn-warning addBtn' href='?controller=movie&action=getMovie'>ADD</a>" ?>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($movies as $movie) {
                echo "<tr>";
                echo "<td class='align-middle'>" . $movie[0] . "</td>";
                echo "<td class='align-middle'>" . $movie[1] . "</td>";
                echo "<td class='align-middle'>" . $movie[2] . "</td>";
                echo "<td class='align-middle'>" . $movie[3] . "</td>";
                echo "<td> 
                <a class='btn btn-info' href='?controller=movie&action=getMovie&id=" . $movie[0] . "'>Edit</a>
                <a class='btn btn-danger' href='?controller=movie&action=deleteMovie&id=" . $movie[0] . "'>Delete</a>
                </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>