<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <title>Document</title>
</head>
<?php print_r($movie[0][0]); ?>

<body>
    <h1>Movie</h1>


    <form class="w-50 m-auto" action="index.php?controller=movie&action=<?php echo isset($movie[0][0]) ? "updateMovie" : "createMovie" ?>" method="post">
        <input type="hidden" name="movie_id" value="<?php echo isset($movie[0][0]) ? $movie[0][0] : null ?>">
        <div class="form-group row md-6">
            <label for="movie_name">Movie name</label>
            <input required type="text" class="form-control" value="<?php echo isset($movie) ? $movie[0][1] : null ?>" class="form-control" id="movie_name" name="movie_name" aria-describedby="movie_name" placeholder="Enter movie name">
        </div>
        <div class="form-group row md-6">
            <label for="released_year">Released year</label>
            <input required type="text" class="form-control" value="<?php echo isset($movie) ? $movie[0][2] : null ?>" class="form-control" id="released_year" name="released_year" aria-describedby="released_year" placeholder="Enter movie name">
        </div>
        <div class="form-group row md-6">
            <label for="runtime">Running time</label>
            <input required type="text" class="form-control" value="<?php echo isset($movie) ? $movie[0][3] : null ?>" class="form-control" id="runtime" name="runtime" aria-describedby="runtime" placeholder="Enter movie name">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>

</html>