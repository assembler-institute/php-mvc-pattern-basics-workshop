<h1> <?php echo $name  ?> Grades </h1>
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
                echo        "<td>";
                echo "<a href=?controller=anotations&action=deleteAnotations&id=" . $anotation['id'] . ">" . "<button type='button' class='btn btn-danger btn-sm'>Delete</button>" . "</a>";
                echo        "</td>";
                echo    "</tr>";
            }
        } else {
            echo "No anotations founded";
        }
        ?>
    </table>
    <div>
        <a class="btn btn-primary" href="?controller=anotations&action=formCreateAnotations&id=<?php echo $userId ?>"><span class="fas fa-edit"></span> Add Grade</a>
    </div>

</div>
<?php
