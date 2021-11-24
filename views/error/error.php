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
		<div class="d-flex flex-column justify-content-center align-items-center gap-3">
			<h1 class="display-1">OOPS!</h1>
			<p class="display-4">Something went wrong: <?= $errorMsg ?></p>
		</div>
	</main>
</body>

</html>