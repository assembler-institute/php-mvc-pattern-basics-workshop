<?php
$employee = 		$responseEmp["data"];
$departments = 	$responseDepts["data"];
$action = isset($employee) ? "updateEmployeeByID" : "createNewEmployee";
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="<?= BASE_URL . "/node_modules/normalize.css/normalize.css" ?>">
	<link rel="stylesheet" href="<?= BASE_URL . "/node_modules/bootstrap/dist/css/bootstrap.min.css" ?>">
	<link rel="stylesheet" href="<?= BASE_URL . "/assets/css/style.css" ?>">
	<script src="<?= BASE_URL . "/node_modules/bootstrap/dist/js/bootstrap.min.js" ?>"></script>
</head>

<body>
	<?php include(BASE_PATH . "/assets/html/header.html") ?>;
	<main>
		<div class="container-sm">
			<h1 class="display-6 m-0 p-0">Employee</h1>
			<hr>
			<form method="POST" action="?controller=employee&action=<?= $action ?>">
				<?php if (isset($employee)) : ?>
					<input type="hidden" id="emp_no" name="emp_no" value="<?= $employee['emp_no'] ?>" />
				<?php endif ?>
				<div class="row">
					<div class="col-3 my-2">
						<label class="fw-normal" for="first_name">First name</label>
						<input class="form-control my-2" type="text" id="first_name" name="first_name" value="<?= $employee['first_name'] ?? null ?>" />
					</div>
					<div class="col-3 my-2">
						<label class="fw-normal" for="last_name">Last name</label>
						<input class="form-control my-2" type="text" id="last_name" name="last_name" value="<?= $employee['last_name'] ?? null ?>" />
					</div>
					<div class="col-3 my-2">
						<label class="fw-normal" for="birth_date">Last name</label>
						<input class="form-control my-2" type="date" id="birth_date" name="birth_date" value="<?= $employee['birth_date'] ?? null ?>" />
					</div>
					<div class="col-3 my-2">
						<label class="fw-normal" for="gender">Gender</label>
						<select class="form-select my-2" id="gender" name="gender">
							<?php if (isset($employee)) : ?>
								<option value="<?= $employee['gender'] ?>" disabled><?= $employee['gender'] ?></option>
							<?php endif ?>
							<option value="M">M</option>
							<option value="F">F</option>
						</select>
					</div>
					<div class="col-6 my-2">
						<label class="fw-normal" for="salary">Salary</label>
						<input class="form-control my-2" type="number" id="salary" name="salary" value="<?= $employee['salary'] ?? null ?>" />
					</div>
					<div class="col-6 my-2">
						<label class="fw-normal" for="dept_name">Department</label>
						<select class="form-select my-2" id="dept_no" name="dept_no">
							<?php if (isset($employee)) : ?>
								<option value="<?= $employee['dept_no'] ?>" disabled selected><?= $employee['dept_name'] ?></option>
							<?php endif ?>
							<?php foreach ($departments as $department) : ?>
								<option value="<?= $department['dept_no'] ?>"><?= $department['dept_name'] ?></option>
							<?php endforeach ?>
						</select>
					</div>
					<div class="col-12 my-2 d-flex justify-content-center gap-3">
						<button class="btn btn-primary btn-lg" type="reset">Clear</button>
						<button class="btn btn-primary btn-lg" type="submit">Submit</button>
					</div>
				</div>
			</form>
		</div>
	</main>
</body>

</html>