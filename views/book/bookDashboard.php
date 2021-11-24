<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Book Depository</title>
</head>

<body>
    <div class="form__header">
        <a id="home" class="form__btn" href="?controller=book&action=newBook">+</a>
        <h1 class="form__title">Our Books</h1>
        <a id="home" class="form__btn return" href="./">↩️</a>

    </div>
    <table class="form__table">
        <thead>
            <tr>
                <th class="form__tabHead">ID</th>
                <th class="form__tabHead">Title</th>
                <th class="form__tabHead">Language</th>
                <th class="form__tabHead">Year</th>
                <th class="form__tabHead">Movement</th>
                <th class="form__tabHead">Author</th>
                <th class="form__tabHead">Actions</th>
            </tr>
        </thead>
        <tbody class="table__body">
            <?php
            foreach ($books as $index => $book) {
                $movement = getMovement($book);
                $author = getAuthor($book);
                echo "<tr>";
                echo "<td class='form__tabCell centredRow'>" . $book["id"] . "</td>";
                echo "<td class='form__tabCell'>" . $book["title"] . "</td>";
                echo "<td class='form__tabCell'>" . $book["language"] . "</td>";
                echo "<td class='form__tabCell'>" . $book["year"] . "</td>";
                echo "<td class='form__tabCell'>" . $movement . "</td>";
                echo isset($author) ? "<td class='form__tabCell'>" . $author["first_name"] . " " . $author["last_name"] . "</td>" : "Author not registered";
                echo "<td colspan='2' class='form__tabCell centredRow'>
                <a class='form__edit' href='?controller=book&action=getBook&id=" . $book["id"] . "'>Edit</a>
                <a class='form__delete' href='?controller=book&action=deleteBook&id=" . $book["id"] . "'>Delete</a>
                </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>