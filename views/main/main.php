<!-- This is the main generic view of your application, it's not required to use it -->
<?php
include_once "./views/include/header"
?>

<h1>Welcome to MVC Pattern Basics!</h1>
<div class="list-group">
    <a class="list-group-item list-group-item-action" href="?controller=users&action=getAllUsers">Users Controller</a>

</div>
<?php
include_once "../include/footer.html"
?>