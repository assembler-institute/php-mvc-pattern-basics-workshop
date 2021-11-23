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
			<div class="d-flex justify-content-between align-items-end">
				<h1 class="display-6 m-0 p-0">Employees</h1>
				<a class="btn btn-sm btn-primary" href="?controller=employee&action=getEmployeeForm">Add</a>
			</div>
			<hr>
			<table class="table table-striped table-light rounded-2 shadow-sm">
				<thead>
					<tr>
						<th class="fw-normal">Employee º</th>
						<th class="fw-normal">First name</th>
						<th class="fw-normal">Last name</th>
						<th class="fw-normal">Gender</th>
						<th class="fw-normal">Birth date</th>
						<th class="fw-normal">Hire date</th>
						<th class="fw-normal">Current salary</th>
						<th class="fw-normal">Current department</th>
						<th class="fw-normal">Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($response["data"] as $employee) : ?>
						<tr class="">
							<td class="fw-light"><?= $employee['emp_no'] ?></td>
							<td class="fw-light"><?= $employee['first_name'] ?></td>
							<td class="fw-light"><?= $employee['last_name'] ?></td>
							<td class="fw-light"><?= $employee['gender'] ?></td>
							<td class="fw-light"><?= $employee['birth_date'] ?></td>
							<td class="fw-light"><?= $employee['hire_date'] ?></td>
							<td class="fw-light"><?= $employee['salary'] ?></td>
							<td class="fw-light"><?= $employee['dept_name'] ?></td>
							<td class="fw-light">
								<a class="fs-4" href="?controller=employee&action=getEmployeeForm&id=<?= $employee['emp_no'] ?>">&#9998;</a>
								<a class="fs-4" href="?controller=employee&action=deleteEmployeeByID&id=<?= $employee['emp_no'] ?>">&#128465;</a>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</main>
</body>

</html>