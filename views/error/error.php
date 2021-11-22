<!-- This is the error view that you should show when the request was wrong -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error Depository</title>
</head>

<body>
    <div class="main">
        <h1 class="main__title"><?= isset($errorMsg) ? $errorMsg : "" ?></h1>
        <h2 class="main_subtitle">You may want to go back and take a look to our database</h2>
        <a class="main__link" href="?controller=author&action=getAllAuthors">Authors</a>
        <a class="main__link" href="?controller=book&action=getAllBooks">Books</a>
    </div>
</body>

</html>