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
        <form class="" action="index.php?controller=employee&action=<?php if(isset($employee[0]["id"])){echo "setEmployee";} ?>" method="post">
            <input type="hidden" name="id" value="<?php echo isset($employee[0]['id']) ? $employee[0]['id'] : null ?>">
            <input type="text" name="name" value="<?php echo $employee[0]["name"]; ?>" required></label>
            <input type="text" name="email" value="<?php echo $employee[0]["email"]; ?>" required>
            

            <select name="gender_id" class="form-control" id="gender" required>
                <option value="">Please Select</option>
                <option value="1" <?php echo isset($employee['gender_id']) && $employee['gender_id']  == 1 ? 'selected' : null; ?>>Male</option>
                <option value="2" <?php echo isset($employee['gender_id']) && $employee['gender_id']  == 2 ? 'selected' : null; ?>>Female</option>
            </select>

            <input type="text" name="city" value="<?php echo $employee[0]["city"]; ?>" required>
            <input type="text" name="age" value="<?php echo $employee[0]["age"]; ?>" required>
            <input type="text" name="phone_number" value="<?php echo $employee[0]["phone_number"]; ?>" required>
            <button type="submit" class="btn btn-primary">Submit</button>
            <?php 
            echo "
                <a class='btn btn-danger' href='?controller=employee&action=getAllEmployees'>Cancel</a>"
            ?>
        </form>
    </section>
</body>
</html>