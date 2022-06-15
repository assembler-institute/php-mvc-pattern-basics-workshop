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
        <form class="" action="index.php?controller=employee&action=<?php if(isset($employee[0]["id"])){echo "setEmployee";}else{echo "create";} ?>" method="post">
            <input type="hidden" name="id" value="<?php echo isset($employee[0]['id']) ? $employee[0]['id'] : null ?>">
            <label for="name">Name
            <input type="text" name="name" value="<?php echo isset($employee[0]["name"]) ? $employee[0]["name"] : null; ?>" required></label>
            <label for="Last name">Last name
            <input type="text" name="last_name" value="<?php echo isset($employee[0]["last_name"]) ? $employee[0]["last_name"] : null; ?>" required></label>
            <label for="email">E-mail
            <input type="text" name="email" value="<?php echo isset($employee[0]["email"]) ? $employee[0]["email"] : null; ?>" required></label>
            
            <label for="gender">Gender
            <select name="gender_id" class="form-control" id="gender" required>
                <option value="">Please Select</option>
                <option value="1" <?php echo isset($employee[0]['gender']) && $employee[0]['gender']  == 'Male' ? 'selected' : null; ?>>Male</option>
                <option value="2" <?php echo isset($employee[0]['gender']) && $employee[0]['gender']  == 'Female' ? 'selected' : null; ?>>Female</option>
            </select></label>
            
            <label for="city">City
            <input type="text" name="city" value="<?php echo isset($employee[0]["city"]) ? $employee[0]["city"] : null; ?>" required></label>
            <label for="street_address">Street address
            <input type="text" name="street_address" value="<?php echo isset($employee[0]["street_address"]) ? $employee[0]["street_address"] : null; ?>" required></label>
            <label for="state">State
            <input type="text" name="state" value="<?php echo isset($employee[0]["state"]) ? $employee[0]["state"] : null; ?>" required></label>
            <label for="postal_code">Postal code
            <input type="text" name="postal_code" value="<?php echo isset($employee[0]["postal_code"]) ? $employee[0]["postal_code"] : null; ?>" required></label>
            <label for="Age">Age
            <input type="text" name="age" value="<?php echo isset($employee[0]["age"]) ? $employee[0]["age"] : null; ?>" required></label>
            <label for="phone_number">Phone number
            <input type="text" name="phone_number" value="<?php echo isset($employee[0]["phone_number"]) ? $employee[0]["phone_number"] : null; ?>" required></label>
            <button type="submit" class="btn btn-primary">Submit</button>
            <?php 
            echo "
                <a class='btn btn-danger' href='?controller=employee&action=getAllEmployees'>Cancel</a>"
            ?>
        </form>
    </section>
</body>
</html>