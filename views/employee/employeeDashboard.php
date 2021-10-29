<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="./assets/js/utils.js"></script>
    <link rel="stylesheet" href="assets/css/style.css">

    <title>Employee Dashboard</title>
</head>

<body>

    <h1 class="ml-3">Employees</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>FIRST NAME</th>
                <th>LAST NAME</th>
                <th>GENDER</th>
                <th>AGE</th>
                <?php
                echo " <th><a class='btn btn-warning addBtn' href='?controller=employee&action=getEmployee'>Add</a></th>";
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
            array_walk(
                $employees,
                function ($employee_data) {
                    $id = $employee_data[0];
                    $first_name =  $employee_data[1];
                    $last_name = $employee_data[2];
                    $gender = $employee_data[3];
                    $age =  $employee_data[4];

                    echo "<tr class='row-employee-data'>";
                    echo " <td class='align-middle'>" . $id . "</td>";
                    echo " <td class='align-middle'>" . $first_name . "</td>";
                    echo " <td class='align-middle'>" . $last_name . "</td>";
                    echo " <td class='align-middle'>" . $gender . "</td>";
                    echo " <td class='align-middle'>" . $age . "</td>";

                    echo "<td> 
                    <a class='btn btn-info' href='?controller=employee&action=getEmployee&id=" . $id . "'>Edit</a>
                    <a class='btn btn-danger' href='?controller=employee&action=deleteEmployee&id=" . $id . "'>Delete</a>

                    </td>";
                    echo "</tr>";
                }
            );
            ?>
        </tbody>
    </table>
</body>

</html>