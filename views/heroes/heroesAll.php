<?php

echo "
<main class='container'>
<h2>Heroes</h2>
<table>
<thead>
    <tr>
        <th class='p-3'>Name</th>
        <th class='p-3'>Hero type</th>
        <th class='p-3'>Power</th>
        <th class='p-3'></th>
    </tr>
    </thead>
";

if (isset($data)) {
    if (count($data) > 0) {
        echo "<tbody>";
        array_walk($data, function ($row) {
            echo "<tr data-id=" . $row['id'] . ">
            <td class='p-3'>";
            echo $row['name'];
            echo "</td>
            <td class='p-3'>";
            echo $row['hero_type'];
            echo "</td>
            <td class='p-3'>";
            echo $row['power'];
            echo "</td><td>";
            ($row['original'] ? "" : print("<a href='?controller=heroes&action=remove&id=" . $row['id'] . "' class='btn btn-secondary' disabled>Remove</a>"));
            echo "</td>
            </tr>";
        });
        echo "</tbody>";
        echo "<a href='?controller=heroes&action=createHero' class='btn btn-light mt-4'>Become the hero!</a>
        </main>";
    } else {
        require_once VIEWS . '/error/error.php';
    }
} else {
    require_once VIEWS . '/error/error.php';
}
