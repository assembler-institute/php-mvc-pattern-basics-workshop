<?php

// This is the entry point of your application, all your application must be executed in
// the "index.php", in such a way that you must include the controller passed by the URL
// dynamically so that it ends up including the view.

include_once "config/constants.php";

// TODO Implement the logic to include the controller passed by the URL dynamically
// In the event that the controller passed by URL does not exist, you must show the error view.
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@100;900&family=BioRhyme:wght@200;800&family=IBM+Plex+Serif:wght@100;300;700&display=swap" rel="stylesheet">
  <title>Document</title>
</head>

<body>
  <?php
  include_once ASSETS . "html/header.html";
  ?>
  <main>
    <?php
    include_once ASSETS . "html/menu.php";
    if (isset($_GET["controller"])) {
      if ($_GET["controller"] == "employee") {
        require_once CONTROLLERS . "employeeController.php";
      }
      if ($_GET["controller"] == "travel") {
        require_once CONTROLLERS . "travelController.php";
      }
    } else {
      require_once VIEWS . "main/main.php";
    }
    ?>
  </main>
</body>

</html>
<script>
  function goBack() {
    window.history.back();
  }
</script>