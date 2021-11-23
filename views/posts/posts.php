<?php

if (count($posts) > 0) {
    foreach ($posts as $post) {
        echo $post["title"] . "<br>";
        echo $post["description"];
    }
} else {
    echo "No posts founded";
}
