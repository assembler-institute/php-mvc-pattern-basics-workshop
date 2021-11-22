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
		<div class="container-fluid">
			<div class="d-flex justify-content-center align-items-center gap-3 p-3">
				<a href="?controller=employee&action=getAllEmployees">
					<div class="section-card rounded-3 p-5 shadow-sm">Employees</div>
				</a>
				<a href="?controller=department&action=getAllDepartments">
					<div class="section-card rounded-3 p-5 shadow-sm">Departments</div>
				</a>
			</div>
		</div>
	</main>
</body>

</html>