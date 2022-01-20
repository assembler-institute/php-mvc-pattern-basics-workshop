<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
    <div class="containter">
        <h1>Edit shoe page!</h1>
        </br>

        <?php
        if ($action == "getEmployee" && (!isset($shoe) || !$shoe || sizeof($shoe) == 0)) {
            echo "<p>The employee does not exists!</p>";
        } else if (isset($error)) {
            echo "<p>$error</p>";
        }
        ?>
        <form class="mb-5 needs-validation" action="index.php?controller=employee&action=<?php echo isset($shoe['id']) ? "updateEmployee" : "createEmployee" ?>" method="post">
            <input type="hidden" name="id" value="<?php echo isset($shoe['id']) ? $shoe['id'] : null ?>">
            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input required type="text" value="<?php echo isset($shoe['name']) ? $shoe['name'] : null ?>" class="form-control" id="name" name="name" aria-describedby="name" placeholder="Enter name">
                    </div>

                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="name">Size</label>
                        <input required type="text" value="<?php echo isset($shoe['size']) ? $shoe['size'] : null ?>" class="form-control" id="size" name="size" aria-describedby="size" placeholder="Enter the size">
                    </div>
                </div>
            </div>
            <div class="form-row">
            <div class="col">
                    <div class="form-group">
                        <label for="name">Color</label>
                        <input required type="text" value="<?php echo isset($shoe['color']) ? $shoe['color'] : null ?>" class="form-control" id="color" name="color" aria-describedby="color" placeholder="Enter the color">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="name">Price</label>
                        <input required type="text" value="<?php echo isset($shoe['price']) ? $shoe['price'] : null ?>" class="form-control" id="price" name="price" aria-describedby="price" placeholder="Enter the price">
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <a id="return" class="btn btn-secondary" href="<?php echo "?controller=employee&action=getAllEmployees&action=getAllEmployees"; ?>">Return</a>
        </form>
    </div>
</body>
