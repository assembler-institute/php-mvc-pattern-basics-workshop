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
<nav class="nav flex-column">
  <a class="nav-link active" aria-current="page" href="?controller=employee&action=getAllEmployees">Employees</a>
  <a class="nav-link" href="?controller=travel&action=getAllTravels">Travels</a>
</nav>
</body>

</html>