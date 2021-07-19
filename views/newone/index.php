<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <title>Document</title>
</head>

<body>
    <?php require "./views/header.php" ?>

    <div id="main">
        <h1 class="center">New registred</h1>

        <div class="center"><?php echo $this->newMessage; ?></div>

        <form action="<?php echo constant("URL"); ?>newone=newStudent" method="POST">
            <p>
                <label for="id">Student Register</label>
                <input type="text" name="id" required>
            </p>
            <p>
                <label for="name">First Name</label>
                <input type="text" name="name" required>
            </p>
            <p>
                <label for="lastName">Last Name</label>
                <input type="text" name="lastName" required>
            </p>
            <p>
                <input type="submit" value="New student">
            </p>
        </form>
    </div>
    <?php require "./views/footer.php" ?>
</body>

</html>