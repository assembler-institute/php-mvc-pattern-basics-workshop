<?php

foreach ($users as $user) {
    echo $user["name"];
    echo "<a href=?controller=posts&action=getPostById&id=" . $user['id'] . ">Enseñame mis post</a>" . "<br>";
}
