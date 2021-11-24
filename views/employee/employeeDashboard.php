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
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="?controller=main&action=viewMain">Home Page</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="?controller=employee&action=getAllEmployees">Employees</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?controller=salary&action=getAllSalaries">Salaries</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?controller=login&action=logout">Log Out</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <main class="main container">
    <h1>Employees Info</h1>
    <table class="table table-hover">
          <thead>
              <tr>
                  <th class="tg-0pky">ID</th>
                  <th class="tg-0pky">Birth Date</th>
                  <th class="tg-0lax">Last Name</th>
                  <th class="tg-0lax">First Name</th>
                  <th class="tg-0lax">Gender</th>
                  <th class="tg-0lax">Hire Date</th>
                  <th class="tg-0lax">Actions</th>
              </tr>
          </thead>
          <tbody>
              <?php
              foreach ($employees as $index => $employee) {
                  echo "<tr>";
                  echo "<td class='tg-0lax'>" . $employee["id"] . "</td>";
                  echo "<td class='tg-0lax'>" . $employee["birth_date"] . "</td>";
                  echo "<td class='tg-0lax'>" . $employee["last_name"] . "</td>";
                  echo "<td class='tg-0lax'>" . $employee["first_name"] . "</td>";
                  echo "<td class='tg-0lax'>" . $employee["gender"] . "</td>";
                  echo "<td class='tg-0lax'>" . $employee["hire_date"] . "</td>";
                  echo "<td colspan='2' class='tg-0lax'>
                  <a class='btn btn-secondary' href='?controller=employee&action=getEmployee&id=" . $employee["id"] . "'>Edit</a>
                  <a class='btn btn-danger' href='?controller=employee&action=deleteEmployee&id=" . $employee["id"] . "'>Delete</a>
                  </td>";
                  echo "</tr>";
              }
              ?>
          </tbody>
    </table>
    <a id="home" class="btn btn-primary" href="?controller=employee&action=createEmployee">Create</a>
    <a id="home" class="btn btn-secondary" href="?controller=main&action=viewMain">Back</a>
  </main>
</body>

</html>