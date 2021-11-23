<!-- This is the main generic view of your application, it's not required to use it -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale-1.0">
    <title>Main</title>
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
<nav class="nav flex-column">
  <a class="nav-link active" aria-current="page" href="?controller=employee&action=getAllEmployees">Employees</a>
  <a class="nav-link" href="?controller=salary&action=getAllSalaries">Salaries</a>
</nav>
</body>

</html>