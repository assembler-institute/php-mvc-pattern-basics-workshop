<div class="container">

    <div class="row m-4">
        <br>
        <?php
        foreach ($users as $user) {
            echo ' <div class="col-sm-2"> <div class="card"> <div class="card-body">';
            echo "<a href=?controller=anotations&action=getAnotationsById&id=" . $user['id'] . "&name=" . $user['name'] . ">" . "<h2 class='text-center'>" . $user["name"] . "</h2>" . "</a>";
            echo "<a href=?controller=users&action=getUser&id=" . $user['id'] . ">" . "<button type='button' class='btn btn-success btn-sm m-1'>Edit</button>" . "</a>";
            echo "<a href=?controller=users&action=deleteUser&id=" . $user['id'] . ">" . "<button type='button' class='btn btn-danger btn-sm m-1'>Delete</button>" . "</a>" . "<br>";
            echo '</div> </div> </div>';
        }
        ?>
    </div>
</div>