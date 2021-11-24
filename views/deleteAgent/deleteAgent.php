<?php 
$agent_code= $_GET["agent_code"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

  <title>Delete</title>
</head>

<body>
  <div class="container-sm border m-4 p-4 rounded text-center">
    <h4>Are you sure you want to delete?</h4>
    <a href="?controller=agent&action=confirmDelete&agent_code=<?=$agent_code?>" class="btn btn-danger">Delete</a>
  </div>
</body>

</html>