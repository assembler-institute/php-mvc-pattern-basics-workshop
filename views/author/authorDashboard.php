<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Author Dashboard</title>
</head>

<body>
    <div class="form__header">
        <a id="home" class="form__btn" href="?controller=author&action=createAuthor">+</a>
        <h1 class="form__title">Our Authors</h1>
        <a id="home" class="form__btn return" href="./">↩️</a>

    </div>
    <table class="form__table">
        <thead>
            <tr>
                <th class="form__tabHead">ID</th>
                <th class="form__tabHead">Name</th>
                <th class="form__tabHead">Last Name</th>
                <th class="form__tabHead">Country</th>
                <th class="form__tabHead">Actions</th>
            </tr>
        </thead>
        <tbody class="table__body">
            <?php
            foreach ($authors as $index => $author) {
                echo "<tr>";
                echo "<td class='form__tabCell centredRow'>" . $author["id"] . "</td>";
                echo "<td class='form__tabCell'>" . $author["first_name"] . "</td>";
                echo "<td class='form__tabCell'>" . $author["last_name"] . "</td>";
                echo "<td class='form__tabCell'>" . $author["country"] . "</td>";
                echo "<td colspan='2' class='form__tabCell centredRow'>
                <a class='form__edit' href='?controller=author&action=getAuthor&id=" . $author["id"] . "'>Edit</a>
                <a class='form__delete' href='?controller=author&action=deleteAuthor&id=" . $author["id"] . "'>Delete</a>
                </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

</body>

</html>