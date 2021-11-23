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

        <!-- <tr>
            <form action="index.php?controller=anotations&action=createAnotations&id=<?php echo $userId ?>" method="POST">
                <th>
                    <select id="subject" name="subject">
                        <?php
                        // if ($subjects) {
                        //     foreach ($subjects as $subject) {
                        //         echo "<option value='" . $subject["id"] . "'>" . $subject["subjects_name"] . "</option>";
                        //     }
                        // }
                        ?>
                    </select>
                </th>
                <th><input type="text" class="form-control" id="test" name="test" aria-describedby="test" placeholder="test" value=""></th>
                <th><input type="text" class="form-control" id="grade" name="grade" aria-describedby="grade" placeholder="grade" value=""></th>
                <th><input type="date" class="form-control" id="date" name="date" aria-describedby="date" placeholder="date" value=""></th>
                <th><button type="submit" class="btn btn-primary">Submit</button></th>
                <form>
        </tr> -->

        <?php

        if (count($anotations) > 0) {
            foreach ($anotations as $anotation) {

                echo    "<tr>";
                echo        "<td>" . $anotation['subjects_name'] . "</td>";
                echo        "<td>" . $anotation['title'] . "</td>";
                echo        "<td>" . $anotation['grades'] . "</td>";
                echo        "<td>" .  $anotation['date'] . "</td>";

                // echo "<a href=?controller=anotations&action=getAnotations&id=" . $anotation['id'] . ">" . "<button type='button' class='btn btn-success btn-sm'>Edit</button>" . "</a>";
                // echo "<a href=?controller=anotations&action=deleteAnotations&id=" . $anotation['id'] . ">" . "<button type='button' class='btn btn-danger btn-sm'>Delete</button>" . "</a>" . "<br>";


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
