<!-- This is the main generic view of your application, it's not required to use it -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale-1.0">
    <title>Employees</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
<h1>Employee</h1>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Birth Date</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Gender</th>
      <th scope="col">Hire Date</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <!-- <tbody>
    <?php
        foreach ($employees as $employee) {
            echo "<tr>";
            echo "<td>". $employee["id"] . "</td>";
            echo "<td>". $employee["birth_date"] . "</td>";
            echo "<td>". $employee["first_name"] . "</td>";
            echo "<td>". $employee["last_name"] . "</td>";
            echo "<td>". $employee["gender"] . "</td>";
            echo "<td>". $employee["hire_date"] . "</td>";
            echo "<td>
            <button type='button' class='btn btn-primary'><a href='?controller=employee&action=getEmployee&id=" . $employee["id"] . "'>Edit</a></button>
            <button type='button' class='btn btn-danger'><a href='?controller=employee&action=deleteEmployee&id=" . $employee["id"] . "'>Delete</a></button>
            </td>";
            echo "</tr>";
        }
    ?>
  </tbody> -->
</table>
<button type='button' class='btn btn-primary'><a href='?controller=employee&action=createEmployee'>Create</a></button>
<button type='button' class='btn btn-primary'><a href='./'>Return</a></button>
</body>

</html>