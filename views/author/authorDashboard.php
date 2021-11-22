<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Author Dashboard</title>
</head>

<body>
    <h1>Our Authors</h1>
    <table class="table">
        <thead>
            <tr>
                <th class="table__head">ID</th>
                <th class="table__head">Name</th>
                <th class="table__head">Last Name</th>
                <th class="table__head">Country</th>
                <th class="table__head">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($authors as $index => $author) {
                echo "<tr>";
                echo "<td class='table__cell'>" . $author["id"] . "</td>";
                echo "<td class='table__cell'>" . $author["first_name"] . "</td>";
                echo "<td class='table__cell'>" . $author["last_name"] . "</td>";
                echo "<td class='table__cell'>" . $author["country"] . "</td>";
                echo "<td colspan='2' class='table__btns'>
                <a class='table__edit' href='?controller=author&action=getAuthor&id=" . $author["id"] . "'>Edit</a>
                <a class='table__delete' href='?controller=author&action=deleteAuthor&id=" . $author["id"] . "'>Delete</a>
                </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <a id="home" class="btn btn-primary" href="?controller=author&action=createAuthor">Create</a>
    <a id="home" class="form__return" href="./">Back</a>
</body>

</html>