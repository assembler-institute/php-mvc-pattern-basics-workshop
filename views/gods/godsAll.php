<?php

echo "
<main class='container'>
<h2>Gods</h2>
<table>
<thead>
    <tr>
        <th class='p-3'>Greek name</th>
        <th class='p-3'>Roman name</th>
        <th class='p-3'>Power</th>
    </tr>
</thead>
";

if (isset($data)) {
    if (count($data) > 0) {
        echo "<tbody>";
        array_walk($data, function ($row) {
            echo "<tr data-id=" . $row['id'] . ">
            <td class='p-3'>";
            echo $row['greek_name'];
            echo "</td>
            <td class='p-3'>";
            echo $row['roman_name'];
            echo "</td>
            <td class='p-3'>";
            echo $row['power'];
            echo "</td>
            </tr>
            ";
        });
        echo "</tbody></main>";
    } else {
        require_once VIEWS . '/error/error.php';
    }
} else {
    require_once VIEWS . '/error/error.php';
}
