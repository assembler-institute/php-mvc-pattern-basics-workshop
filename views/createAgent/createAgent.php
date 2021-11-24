<?php echo $_GET["agent_code"]
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

  <title>Create Agent</title>
</head>


<body>
  <h2>Create Agent</h2>
  <div>
    <form action="?controller=agent&action=agentCreated" method="POST" class="container-sm card py-4">
      <label for="">Name</label>
      <input class="mb-2" type="text" name="agent_code" value="">
      <label for="">Name</label>
      <input class="mb-2" type="text" name="agent_name" value="">
      <label for="">Working Area</label>
      <input class="mb-2" type="text" name="working_area" value="">
      <label for="">Comission</label>
      <input class="mb-2" type="text" name="comission" value="">
      <label for="">Phone Number</label>
      <input class="mb-2" type="text" name="phone_no" value="">
      <label for="">Country</label>
      <input class="mb-2" type="text" name="country" value="">
      <input type="submit" class="btn btn-primary mt-4">
    </form>
  </div>

</body>