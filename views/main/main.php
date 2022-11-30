<!-- This is the main generic view of your application, it's not required to use it -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Main view</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
	<main class="container">
		<h1>Main view</h1>
		<div class="list-group">
			<a 
				class="list-group-item list-group-item-action" 
				href="?controller=customer&action=getAllCustomers"
			>Customer Controller</a>
			<a 
				class="list-group-item list-group-item-action" 
				href="?controller=product&action=getAllProducts"
			>Product Controller</a>
		</div>
	</main>
</body>
</html>