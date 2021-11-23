<!-- This is the main generic view of your application, it's not required to use it -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale-1.0">
    <title>Salaries</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="?controller=main&action=viewMain">Home Page</a>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="?controller=login&action=logout">Log Out</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>
<h1>Salaries</h1>
<table class="table table-hover">
        <thead>
            <tr>
                <th class="tg-0pky">Emp_ID</th>
                <th class="tg-0pky">Salary</th>
                <th class="tg-0lax">From Date</th>
                <th class="tg-0lax">To Date</th>
                <th class="tg-0lax">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($salaries as $index => $salary) {
                echo "<tr>";
                echo "<td class='tg-0lax'>" . $salary["emp_id"] . "</td>";
                echo "<td class='tg-0lax'>" . $salary["salary"] . "</td>";
                echo "<td class='tg-0lax'>" . $salary["from_date"] . "</td>";
                echo "<td class='tg-0lax'>" . $salary["to_date"] . "</td>";
                echo "<td colspan='2' class='tg-0lax'>
                <a class='btn btn-secondary' href='?controller=salary&action=getSalary&id=" . $salary["emp_id"] . "'>Edit</a>
                <a class='btn btn-danger' href='?controller=salary&action=deleteSalary&id=" . $salary["emp_id"] . "'>Delete</a>
                </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <a id="home" class="btn btn-primary" href="?controller=salary&action=createSalary">Create</a>
    <a id="home" class="btn btn-secondary" href="?controller=main&action=viewMain">Back</a>
</body>

</html>