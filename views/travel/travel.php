<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- show form as inputs and two buttons to send or cancel -->
    <section class="body--section__inputDataEmployee">
        <form class="" action="index.php?controller=travel&action=<?php if(isset($hobbiesEmployee[0]["id"])){echo "saveHobbie";} ?>" method="post">
            <input type="hidden" name="id" value="<?php echo isset($hobbiesEmployee[0]['id']) ? $hobbiesEmployee[0]['id'] : null ?>">
            <label for="name">Name
            <input type="text" name="name" value="<?php echo isset($hobbiesEmployee[0]["name"]) ? $hobbiesEmployee[0]["name"] : null; ?>" required></label>
            <label for="Last name">Last name
            <input type="text" name="last_name" value="<?php echo isset($hobbiesEmployee[0]["last_name"]) ? $hobbiesEmployee[0]["last_name"] : null; ?>" required></label>
            <label for="hobbieName">Hobby
            <input type="text" name="hobby" value="<?php echo isset($hobbiesEmployee[0]["hobbieName"]) ? $hobbiesEmployee[0]["hobbieName"] : null; ?>" required></label>
            
            <label for="type">Type
            <select name="type" class="form-control" id="gender" required>
                <option value="">Please Select</option>
                <option value="1" <?php echo isset($hobbiesEmployee[0]['type']) && $hobbiesEmployee[0]['type']  == 'Indoor' ? 'selected' : null; ?>>Indoor</option>
                <option value="2" <?php echo isset($hobbiesEmployee[0]['type']) && $hobbiesEmployee[0]['type']  == 'Outdoor' ? 'selected' : null; ?>>Outdoor</option>
            </select></label>
            <button type="submit" class="btn btn-primary">Submit</button>
            <?php 
            echo "
                <a class='btn btn-danger' href='?controller=travel&action=getAllEmployeesHobbies'>Cancel</a>"
            ?>
        </form>
    </section>
</body>
</html>