<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
    <h1>Employee Dashboard page!</h1>
    <style type="text/css">

    </style>
    <table class="table">
        <thead>
            <tr>
                <th class="tg-0pky">ID</th>
                <th class="tg-0pky">First name</th>
                <th class="tg-0lax">Last name</th>
                <th class="tg-0lax">Age</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($employees as $index => $employee) {
                echo "<tr>";
                echo "<td class='tg-0lax'>" . $employee["employeeId"] . "</td>";
                echo "<td class='tg-0lax'>" . $employee["firstName"] . "</td>";
                echo "<td class='tg-0lax'>" . $employee["lastName"] . "</td>";
                echo "<td class='tg-0lax'>" . $employee["age"] . "</td>";

                echo "<td colspan='2' class='tg-0lax'>
                <a class='btn btn-secondary' href='?controller=employee&action=getEmployee&employeeId=" . $employee["employeeId"] . "'>Edit</a>
                <a class='btn btn-danger' href='?controller=employee&action=deleteEmployee&employeeId=" . $employee["employeeId"] . "'>Delete</a>
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