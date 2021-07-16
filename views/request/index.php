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
        <h1 class="center">Request place</h1>
        <table>
            <thead>
                <tr>
                    <th>Student register no</th>
                    <th>First name</th>
                    <th>Last name</th>
                </tr>
            </thead>
            <tbody>

                <?php
                include_once "models/student.php";
                foreach ($this->students as $row) {
                    $student = new Student();
                    $student = $row;
                }
                ?>
                <tr>
                    <td><?php echo $student->student_register; ?></td>
                    <td><?php echo $student->first_name; ?></td>
                    <td><?php echo $student->last_name; ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <?php require "./views/footer.php" ?>
</body>

</html>