<h1 class="m-2 p-2"> <?php echo $name  ?> Grades </h1>
<div class="m-4 p-4">
    <table class="w-100">
        <tr>
            <th>
                <h4>Subject</h4>
            </th>
            <th>
                <h4>Test</h4>
            </th>
            <th>
                <h4>Grade</h4>
            </th>
            <th>
                <h4>Date</h4>
            </th>
            <th>
                <h4>Actions</h4>
            </th>
        </tr>

        <?php

        if (count($anotations) > 0) {

            foreach ($anotations as $anotation) {

                echo    "<tr class='m-4'>";
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
