<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Book Form</title>
</head>

<body>
    <div class="form__header">
        <h1 class="form__title"><?php echo isset($book['id']) ? "Edit Book" : "Add Book" ?></h1>
        <a id="home" class="form__btn return" href="./">↩️</a>
    </div>
    <form action="index.php?controller=book&action=<?php echo isset($book['id']) ? "editBook" : "newBook" ?>" class="form" method="post">
        <input type="hidden" name="id" value=<?php echo isset($book['id']) ? $book['id'] : null ?>>
        <div class="form__el">
            <label for="title">Title</label>
            <input type="text" name="title" id="" value="<?php echo isset($book['title']) ? $book['title'] : null ?>" required>
        </div>
        <div class="form__el">
            <label for="language">Language</label>
            <input type="text" name="language" id="" value="<?php echo isset($book['language']) ? $book['language'] : null ?>" required>
        </div>
        <div class="form__el">
            <label for="year">Year</label>
            <input type="text" name="year" id="" value="<?php echo isset($book['year']) ? $book['year'] : null ?>" required>
        </div>
        <div class="form__el">
            <label for="mov_id">Movement</label>
            <select name="mov_id" class="form__control" id="type" required>
                <option value="">Please Select</option>
                <option value="1" <?php echo isset($book['mov_id']) && $book['mov_id']  == 1 ? 'selected' : null ?>>Romanticism</option>
                <option value="2" <?php echo isset($book['mov_id']) && $book['mov_id']  == 2 ? 'selected' : null ?>>Symbolism</option>
                <option value="3" <?php echo isset($book['mov_id']) && $book['mov_id']  == 3 ? 'selected' : null ?>>Modernismo</option>
                <option value="4" <?php echo isset($book['mov_id']) && $book['mov_id']  == 4 ? 'selected' : null ?>>Vanguardia</option>
                <option value="5" <?php echo isset($book['mov_id']) && $book['mov_id']  == 5 ? 'selected' : null ?>>Modernism</option>
                <option value="6" <?php echo isset($book['mov_id']) && $book['mov_id']  == 6 ? 'selected' : null ?>>Surrealism</option>
            </select>
        </div>
        <button type="submit" class="main__link"><?php echo isset($book['id']) ? "Update" : "Create" ?></button>
    </form>
</body>