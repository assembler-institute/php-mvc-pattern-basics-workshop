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
        <h1>Edit jordan page!</h1>
        </br>

        <?php
        if ($action == "getJordan" && (!isset($jordan) || !$jordan || sizeof($jordan) == 0)) {
            echo "<p>The employee does not exists!</p>";
        } else if (isset($error)) {
            echo "<p>$error</p>";
        }
        ?>
        <form class="mb-5 needs-validation" action="index.php?controller=jordans&action=<?php echo isset($jordan['id']) ? "updateJordans" : "createJordan" ?>" method="post">
            <input type="hidden" name="id" value="<?php echo isset($jordan['id']) ? $jordan['id'] : null ?>">
            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input required type="text" value="<?php echo isset($jordan['name']) ? $jordan['name'] : null ?>" class="form-control" id="name" name="name" aria-describedby="name" placeholder="Enter name">
                    </div>

                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="name">Clothes</label>
                        <input required type="text" value="<?php echo isset($jordan['clothes']) ? $jordan['clothes'] : null ?>" class="form-control" id="clothes" name="clothes" aria-describedby="clothes" placeholder="Enter the clothe">
                    </div>
                </div>
            </div>
            <div class="form-row">
            <div class="col">
                    <div class="form-group">
                        <label for="name">Price</label>
                        <input required type="text" value="<?php echo isset($jordan['price']) ? $jordan['price'] : null ?>" class="form-control" id="price" name="price" aria-describedby="price" placeholder="Enter the price">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="name">Size</label>
                        <input required type="text" value="<?php echo isset($jordan['size']) ? $jordan['size'] : null ?>" class="form-control" id="size" name="size" aria-describedby="size" placeholder="Enter the size">
                    </div>
                </div>
            </div>
            <div class="form-group">
                        <label for="name">Shipment</label>
                        <input required type="text" value="<?php echo isset($jordan['shipment']) ? $jordan['shipment'] : null ?>" class="form-control" id="shipment" name="shipment" aria-describedby="shipment" placeholder="Enter the type of shipment">
                    </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <a id="return" class="btn btn-secondary" href="<?php echo "?controller=jordans&action=getAllJordans&action=getAllJordans"; ?>">Return</a>
        </form>
    </div>
    <div>
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a6/Logo_NIKE.svg/1200px-Logo_NIKE.svg.png" alt="" style="width: 70%;">
    </div>
</body>