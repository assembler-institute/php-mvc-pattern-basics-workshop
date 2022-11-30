<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/utils.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Employee Dashboard</title>
</head>

<body>

</body>

</html>
<?php
require_once("./config/helper.php");


if (empty($employees)) {
    debug_to_console("NOT OK - You are NOT grabing data correctly from the controller and displaying it in the View (Employee-EmployeeDashboard)");
} else {
    debug_to_console("OK - You are grabing data correctly from the controller and displaying it in the View (Employee-EmployeeDashboard)");
}
echo "<h2 class='title-header'>Employee Dashboard</h2>

        <div class='table-wrapper'>
        <form id='new-employee-form'>
            <table class='fl-table info-row'>
                <thead>
                    <tr>
                        <th class='employee-info'>ID</th>
                        <th class='employee-info'>FIRST NAME</th>
                        <th class='employee-info'>LAST NAME</th>
                        <th class='employee-info'>AGE</th>
                        <th class='employee-info'>GENDER</th>
                        <th class='new-employee'>+</th>
                    </tr>
                </thead>
                
            <tbody>";
array_walk(
    $employees,
    function ($employee_data) {
        $id = $employee_data[0];
        $first_name =  $employee_data[1];
        $last_name = $employee_data[2];
        $age = $employee_data[3];
        $gender =  $employee_data[4];

        echo "<tr class='row-employee-data'>";
        echo " <td data-id='$id' class='toForm' >" . $id . "</td>";
        echo " <td data-id='$id' class='toForm' >" . $first_name . "</td>";
        echo " <td data-id='$id' class='toForm' >" . $last_name . "</td>";
        echo " <td data-id='$id' class='toForm' >" . $age . "</td>";
        echo " <td data-id='$id' class='toForm' >" . $gender . "</td>";
        echo "<i class='far fa-edit modifyList' data-id='$id'></i>";
        echo "<a href='#' id='delete-button' class='delete-employee ml-3 danger-link' data-id='$id'><i class='far fa-trash-alt'></i></a>"; //Later i will insert trash icon.
        echo "</td></tr>";
    }
);
echo   "</tbody>
            </table>
            </div>";


?>