<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <title>Document</title>
</head>
<?php print_r($employee[0][0]); ?>

<body>
    <h1>Employee</h1>


    <form class="w-50 m-auto" action="index.php?controller=employee&action=<?php echo isset($employee[0][0]) ? "updateMovie" : "createEmployee" ?>" method="post">
        <input type="hidden" name="employee_id" value="<?php echo isset($employee[0][0]) ? $employee[0][0] : null ?>">
        <div class="form-group row md-6">
            <label for="employee_name">First Name</label>
            <input required type="text" class="form-control" value="<?php echo isset($employee) ? $employee[0][1] : null ?>" class="form-control" id="employee_name" name="employee_name" aria-describedby="employee_name" placeholder="Enter employee first name">
        </div>
        <div class="form-group row md-6">
            <label for="released_year">Last Name</label>
            <input required type="text" class="form-control" value="<?php echo isset($employee) ? $employee[0][2] : null ?>" class="form-control" id="employee_lastName" name="employee_lastName" aria-describedby="employee_lastName" placeholder="Enter employee last name">
        </div>
        <div class="form-group row md-6">
            <label for="runtime">Gender</label>
            <input required type="text" class="form-control" value="<?php echo isset($employee) ? $employee[0][3] : null ?>" class="form-control" id="gender" name="gender" aria-describedby="gender" placeholder="Enter employee gender">
        </div>

        <div class="form-group row md-6">
            <label for="runtime">Age</label>
            <input required type="text" class="form-control" value="<?php echo isset($employee) ? $employee[0][4] : null ?>" class="form-control" id="age" name="age" aria-describedby="age" placeholder="Enter employee age">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>

</html>