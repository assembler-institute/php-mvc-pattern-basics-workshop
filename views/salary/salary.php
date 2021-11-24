<!-- This is the main generic view of your application, it's not required to use it -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale-1.0">
    <meta name="description" content="Web site " />
    <title>Salaries</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
        crossorigin="anonymous"
    >
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
    <h1>Salary Details</h1>
    <?php
        if(isset($salary["emp_id"])) {
            echo "<form method='post' action='index.php?controller=salary&action=updateSalary'>";
        } else {
            echo "<form method='post' action='index.php?controller=salary&action=createSalary'>";
        }
    ?>
        <input
                hidden
                type="text"
                class="form-control"
                id="empId"
                name="empId"
                value="<?php if(isset($salary['emp_id']) && $salary['emp_id']) echo $salary['emp_id']; ?>"
        >
        <div class="col-md-6">
            <label for="salary" class="form-label">Salary</label>
            <input
                required
                type="text"
                class="form-control"
                id="salary"
                name="salary"
                value="<?php if(isset($salary['salary']) && $salary['salary']) echo $salary['salary']; ?>"
            >
        </div>
        <div class="col-md-6">
            <label for="fromDate" class="form-label">From Date</label>
            <input
                type="date"
                class="form-control"
                id="fromDate"
                name="fromDate"
                value="<?php if(isset($salary['from_date']) && $salary['from_date']) echo $salary['from_date']; ?>"
            >
        </div>

        <div class="col-md-6">
            <label for="toDate" class="form-label">To Date</label>
            <input
                required
                type="date"
                class="form-control"
                id="toDate"
                name="toDate"
                value="<?php if(isset($salary['to_date']) && $salary['to_date']) echo $salary['to_date']; ?>"
            >
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="submit" class="btn btn-secondary">
                <a href="<?php echo '?controller=salary&action=getAllSalaries'; ?>">Return</a>
            </button>
        </div>
    </form>
</main>
</body>
</html>