<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<h1>Employee Dashboard page!</h1>
    <style type="text/css">

    </style>
    <table class="table">
        <thead>
            <tr>
                <th class="tg-0pky">ID</th>
                <th class="tg-0pky">Name</th>
                <th class="tg-0lax">last Name</th>
                <th class="tg-0lax">Gender</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($employees as $index => $employee) {
                echo "<tr>";
                echo "<td class='tg-0lax'>" . $employee["emp_no"] . "</td>";
                echo "<td class='tg-0lax'>" . $employee["first_name"] . "</td>";
                echo "<td class='tg-0lax'>" . $employee["last_name"] . "</td>";
                echo "<td class='tg-0lax'>" . $employee["gender"] . "</td>";
                echo "<td colspan='2' class='tg-0lax'>
                <a class='btn btn-secondary' href='?controller=employee&action=updateEmployee&id=" . $employee["emp_no"] . "'>Edit</a>
                <a class='btn btn-danger' href='?controller=employee&action=deleteEmployee&id=" . $employee["emp_no"] . "'>Delete</a>
                </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <a id="home" class="btn btn-primary" href="?controller=employee&action=createEmployee">Create</a>
    <a id="home" class="btn btn-secondary" href="./">Back</a>

</body>
</html>