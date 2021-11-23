<h1> <?php echo $name ?> Grades </h1>
<div>
    <table>
        <tr>
            <th>Subject</th>
            <th>Test</th>
            <th>Grade</th>
            <th>Date</th>
            <th>Actions</th>

        </tr>
        <?php

        if (count($anotations) > 0) {
            foreach ($anotations as $anotation) {

                echo    "<tr>";
                echo        "<td>" . $anotation['subjects_name'] . "</td>";
                echo        "<td>" . $anotation['title'] . "</td>";
                echo        "<td>" . $anotation['grades'] . "</td>";
                echo        "<td>" .  $anotation['date'] . "</td>";
                echo    "</tr>";
            }
        } else {
            echo "No anotations founded";
        }
        ?>
    </table>
</div>
<?php
