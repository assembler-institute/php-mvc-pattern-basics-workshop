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
        <h1>Offices page!</h1>
        </br>

        <?php
        if ($action == "getOffice" && (!isset($office) || !$office || sizeof($office) == 0)) {
            echo "<p>The office does not exists!</p>";
        } else if (isset($error)) {
            echo "<p>$error</p>";
        }
        ?>
        <form class="mb-5 needs-validation" action="index.php?controller=offices&action=<?php echo isset($office['officeId']) ? "updateOffice" : "createOffice" ?>" method="post">
            <input type="hidden" name="officeId" value="<?php echo isset($office['officeId']) ? $office['officeId'] : null ?>">
            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="city">City</label>
                        <input required type="text" value="<?php echo isset($office['city']) ? $office['city'] : null ?>" class="form-control" id="city" name="city" aria-describedby="city" placeholder="Enter city">
                    </div>

                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="country">Country</label>
                        <input required type="text" value="<?php echo isset($office['country']) ? $office['country'] : null ?>" class="form-control" id="country" name="country" aria-describedby="country" placeholder="Enter country">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input required type="text" value="<?php echo isset($office['address']) ? $office['address'] : null ?>" class="form-control" id="address" name="address" aria-describedby="address" placeholder="Enter address">
                    </div>
                </div>
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
            <a id="return" class="btn btn-secondary" href="<?php echo "?controller=offices&action=getAllOffices"; ?>">Return</a>
        </form>
    </div>
</body>

</html>