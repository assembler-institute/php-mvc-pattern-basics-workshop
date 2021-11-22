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
        <h1>Employee's page!</h1>
        </br>

        <?php
        if ($action == "getEmployee" && (!isset($employee) || !$employee || sizeof($employee) == 0)) {
            echo "<p>The employee does not exists!</p>";
        } else if (isset($error)) {
            echo "<p>$error</p>";
        }
        ?>
        <form class="mb-5 needs-validation" action="index.php?controller=employee&action=<?php echo isset($employee['employeeId']) ? "updateEmployee" : "createEmployee" ?>" method="post">
            <input type="hidden" name="id" value="<?php echo isset($employee['employeeId']) ? $employee['employeeId'] : null ?>">
            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="first-name">Name</label>
                        <input required type="text" value="<?php echo isset($employee['firstName']) ? $employee['firstName'] : null ?>" class="form-control" id="first-name" name="first-name" aria-describedby="name" placeholder="Enter first name">
                    </div>

                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="last-name">Last Name</label>
                        <input required type="text" value="<?php echo isset($employee['lastName']) ? $employee['lastName'] : null ?>" class="form-control" id="last-name" name="last-name" aria-describedby="lastnameHelp" placeholder="Enter last name">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="age">Last Name</label>
                        <input required type="text" value="<?php echo isset($employee['age']) ? $employee['age'] : null ?>" class="form-control" id="age" name="age" aria-describedby="age" placeholder="Enter age">
                    </div>
                </div>
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
            <a id="return" class="btn btn-secondary" href="<?php echo "?controller=employee&action=getAllEmployees&action=getAllEmployees"; ?>">Return</a>
        </form>
    </div>
</body>

</html>