<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Author Form</title>
</head>

<body>
    <form method="POST" action="index.php?controller=employee&action=<?php echo isset($author['id']) ? "updateAuthor" : "createAuthor" ?>" class="form">
        <div class="form__el">
            <label for="name">Name</label>
            <input type="text" name="name" id="" value="<?php echo isset($author['first_name']) ? $author['first_name'] : null ?>" required>
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
            <input type="text" name="death_date" id="" value="<?php echo isset($author['death_date']) ? $author['death_date'] : null ?>" required>
        </div>
        <div class="form__el">
            <label for="death_age">Death Age</label>
            <input type="text" name="death_age" id="" value="<?php echo isset($author['death_age']) ? $author['death_age'] : null ?>" required>
        </div>
        <button type="submit" class="form__btn"><?php echo isset($author['id']) ? "Update" : "Create" ?></button>
        <a href="./" class="form__return">Return</a>
    </form>
</body>

</html>