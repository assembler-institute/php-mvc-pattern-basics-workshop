<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
    <h1>Office Dashboard</h1>
    <style type="text/css">

    </style>
    <table class="table">
        <thead>
            <tr>
                <th class="tg-0pky">ID</th>
                <th class="tg-0pky">City</th>
                <th class="tg-0lax">Country</th>
                <th class="tg-0lax">Address</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($offices as $index => $office) {
                echo "<tr>";
                echo "<td class='tg-0lax'>" . $office["officeId"] . "</td>";
                echo "<td class='tg-0lax'>" . $office["city"] . "</td>";
                echo "<td class='tg-0lax'>" . $office["country"] . "</td>";
                echo "<td class='tg-0lax'>" . $office["address"] . "</td>";

                echo "<td colspan='2' class='tg-0lax'>
                <a class='btn btn-secondary' href='?controller=offices&action=getOffice&officeId=" . $office["officeId"] . "'>Edit</a>
                <a class='btn btn-danger' href='?controller=offices&action=deleteOffice&officeId=" . $office["officeId"] . "'>Delete</a>
                </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <a id="home" class="btn btn-primary" href="?controller=offices&action=createOffice">Create</a>
    <a id="home" class="btn btn-secondary" href="./">Back</a>
</body>

</html>