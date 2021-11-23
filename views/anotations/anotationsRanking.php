<h1> Top 10 Anotations </h1>
<div>
    <table>
        <tr>
            <th>Student</th>
            <th>Subject</th>
            <th>Test</th>
            <th>Grade</th>
        </tr>
        <?php

        if (count($anotations) > 0) {
            foreach ($anotations as $anotation) {

                echo    "<tr>";
                echo        "<td> <a href=?controller=anotations&action=getAnotationsById&id=" .
                    $anotation['id'] . "&name=" .  $anotation['name'] . ">"
                    . $anotation['name'] . "</a> </td>";
                echo        "<td>" . $anotation['subjects_name'] . "</td>";
                echo        "<td>" . $anotation['title'] . "</td>";
                echo        "<td>" .  $anotation['grades'] . "</td>";
                echo    "</tr>";
            }
        } else {
            echo "No anotations founded";
        }
        ?>
    </table>
</div>
<?php
