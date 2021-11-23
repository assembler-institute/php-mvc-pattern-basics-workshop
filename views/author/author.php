<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Author Form</title>
</head>

<body>
    <div class="form__header">
        <h1 class="form__title"><?php echo isset($author['id']) ? "Edit Author" : "Add Author" ?></h1>
        <a id="home" class="form__btn return" href="./">↩️</a>
    </div>
    <form method="POST" action="index.php?controller=author&action=<?php echo isset($author['id']) ? "updateAuthor" : "createAuthor" ?>" class="form">
        <input name="id" type="hidden" value=<?php echo isset($author['id']) ? $author['id'] : null ?>>
        <div class="form__el">
            <label for="first_name">Name</label>
            <input type="text" name="first_name" id="" value="<?php echo isset($author['first_name']) ? $author['first_name'] : null ?>" required>
        </div>
        <div class="form__el">
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" id="" value="<?php echo isset($author['last_name']) ? $author['last_name'] : null ?>" required>
        </div>
        <div class="form__el">
            <label for="country">Country</label>
            <input type="text" name="country" id="" value="<?php echo isset($author['country']) ? $author['country'] : null ?>" required>
        </div>
        <div class="form__el">
            <label for="language">Language</label>
            <input type="text" name="language" id="" value="<?php echo isset($author['language']) ? $author['language'] : null ?>" required>
        </div>
        <div class="form__el">
            <label for="death_date">Date of Death</label>
            <input type="date" name="death_date" id="" value="<?php echo isset($author['death_date']) ? $author['death_date'] : null ?>" required>
        </div>
        <div class="form__el">
            <label for="death_age">Death Age</label>
            <input type="text" name="death_age" id="" value="<?php echo isset($author['death_age']) ? $author['death_age'] : null ?>" required>
        </div>
        <button type="submit" class="main__link"><?php echo isset($author['id']) ? "Update" : "Create" ?></button>
    </form>
</body>

</html>