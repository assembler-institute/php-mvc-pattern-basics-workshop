<!--  -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
  <h1>Agents Dashboard</h1>
  <style type="text/css">

  </style>
  <div class="container-md">
    <table class="table border">
      <thead>
        <tr>
          <th class="tg-0pky">Agent Code</th>
          <th class="tg-0pky">Name</th>
          <th class="tg-0lax">Working Area</th>
          <th class="tg-0lax">Commision</th>
          <th class="tg-0lax">Phone Number</th>
          <th class="tg-0lax">Country</th>
          <th class="tg-0lax">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
            foreach ($agents as $index => $agent) {
                echo "<tr>";
                echo "<td class='tg-0lax'>" . $agent["agent_code"] . "</td>";
                echo "<td class='tg-0lax'>" . $agent["agent_name"] . "</td>";
                echo "<td class='tg-0lax'>" . $agent["working_area"] . "</td>";
                echo "<td class='tg-0lax'>" . $agent["comission"] . "</td>";
                echo "<td class='tg-0lax'>" . $agent["phone_no"] . "</td>";
                echo "<td class='tg-0lax'>" . $agent["country"] . "</td>";
                echo "<td colspan='2' class='tg-0lax'>
                <a class='btn btn-secondary' href='?controller=agent&action=editAgent&agent_code=" . $agent["agent_code"] . "'>Edit</a>
                <a class='btn btn-danger' href='?controller=agent&action=deleteAgent&agent_code=" . $agent["agent_code"] . "'>Delete</a>
                </td>";
                echo "</tr>";
            }
            ?>
      </tbody>
    </table>
    <a id="home" class="btn btn-primary" href="?controller=agent&action=createAgent">Create</a>
    <a id="home" class="btn btn-secondary" href="./">Back</a>
  </div>


</body>

</html>