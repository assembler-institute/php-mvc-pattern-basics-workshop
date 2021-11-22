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
			<h1 class="display-6 m-0 p-0">Departments</h1>
			<hr>
			<table class="table table-striped table-light rounded-2 shadow-sm">
				<thead>
					<tr>
						<th class="fw-normal">Department º</th>
						<th class="fw-normal">Name</th>
						<th class="fw-normal">Total employees</th>
						<th class="fw-normal">Manager name</th>
						<th class="fw-normal">Manager date</th>
						<th class="fw-normal">Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($response["data"] as $department) : ?>
						<tr class="">
							<td class="fw-light"><?= $department['dept_no'] ?></td>
							<td class="fw-light"><?= $department['dept_name'] ?></td>
							<td class="fw-light"><?= $department['total_employees'] ?></td>
							<td class="fw-light"><?= $department['manager_name'] ?></td>
							<td class="fw-light"><?= $department['manager_date'] ?></td>
							<td class="fw-light">
								<a class="fs-4" href="?controller=department&action=getDepartmentForm&id=<?= $department['dept_no'] ?>">&#9998;</a>
								<a class="fs-4" href="?controller=department&action=deleteDepartmentByID&id=<?= $department['dept_no'] ?>">&#128465;</a>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</main>
</body>

</html>