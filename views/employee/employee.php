<!-- This is the main generic view of your application, it's not required to use it -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale-1.0">
    <meta name="description" content="Web site " />
    <title>Employees</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
<main class="main container">

    <h1>Employee Details</h1>
    <form method="post" action="">
        <div class="col-md-6">
            <label for="birthDate" class="form-label">Birth Date</label>
            <input
                required
                type="text"
                class="form-control"
                id="birthDate"
                name="birthDate"
                value=""
            >
        </div>
        <div class="col-md-6">
            <label for="lastName" class="form-label">Last Name</label>
            <input
                type="text"
                class="form-control"
                id="lastName"
                name="lastName"
                value=""
            >
        </div>

        <div class="col-md-6">
            <label for="firstName" class="form-label">First Name</label>
            <input
                required
                type="text"
                class="form-control"
                id="firstName"
                name="firstName"
                value=""
            >
        </div>
        <div class="col-md-6">
            <label for="gender" class="form-label">Gender</label>
            <select id="gender" class="form-select" name="gender">
                <option selected>Choose...</option>
                <option value="M">Male</option>
                <option value="F">Female</option>
            </select>
        </div>

        <div class="col-md-6">
            <label for="hireDate" class="form-label">Hire Date</label>
            <input required type="text" class="form-control" id="hireDate" name="hireDate" value="">
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="submit" class="btn btn-secondary"><a href="#">Return</a></button>
        </div>
    </form>
</main>

</body>

</html>