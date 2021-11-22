<?php

$department = $responseDept["data"];
$employees = 	$responseEmps["data"];

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
			<h1 class="display-6 m-0 p-0">Department</h1>
			<hr>
			<form method="POST" action="?controller=department&action=updateDepartmentByID">
				<input type="hidden" id="dept_no" name="dept_no" value="<?= $department['dept_no'] ?>" />
				<div class="row">
					<div class="col-6 my-2">
						<label class="fw-normal" for="dept_name">Department name</label>
						<input class="form-control my-2" type="text" id="dept_name" name="dept_name" value="<?= $department['dept_name'] ?>" />
					</div>
					<div class="col-6 my-2">
						<label class="fw-normal" for="manager_no">Manager</label>
						<select class="form-select my-2" id="manager_no" name="manager_no">
							<option value="<?= $department['manager_no'] ?>" disabled selected><?= $department['manager_name'] ?></option>
							<?php foreach ($employees as $employee) : ?>
								<option value="<?= $employee['emp_no'] ?>"><?= $employee['first_name'] . " " . $employee['last_name'] ?></option>
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