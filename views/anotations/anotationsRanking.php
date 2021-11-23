<h1 class="m-2 p-2"> Top 10 Anotations </h1>
<div class="m-4 p-4">
    <table class="w-100">
        <tr>
            <th>
                <h3>Student</h3>
            </th>
            <th>
                <h3>Subject</h3>
            </th>
            <th>
                <h3>Test</h3>
            </th>
            <th>
                <h3>Grade</h3>
            </th>
        </tr>
        </h2>
        <?php

        if (count($anotations) > 0) {
            foreach ($anotations as $anotation) {

                echo    "<tr>";
                echo        "<td> <h5><a href=?controller=anotations&action=getAnotationsById&id=" .
                    $anotation['id'] . "&name=" .  $anotation['name'] . ">"
                    . $anotation['name'] . "</a> </h5> </td>";
                echo        "<td> <h5>" . $anotation['subjects_name'] . " </h5> </td>";
                echo        "<td> <h5>" . $anotation['title'] . " </h5> </td>";
                echo        "<td> <h5>" .  $anotation['grades'] . " </h5> </td>";
                echo    "</tr>";
            }
        } else {
            echo "No anotations founded";
        }
        ?>
    </table>
</div>
<?php
