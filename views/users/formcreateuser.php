<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php ?>



    <form action="index.php?controller=users&action=<?php echo isset($_GET['id']) ? "updateUser" : "createUser" ?>" method="POST">
        <input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : null ?>">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" value="<?php echo isset($user['name']) ? $user['name'] : null ?>">
        </div>
        <div class="form-group">
            <label for="last_name">Last_name</label>
            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter your last name" value="<?php echo isset($user['last_name']) ? $user['last_name'] : null ?>">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter your email" value="<?php echo isset($user['email']) ? $user['email'] : null ?>">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="<?php echo isset($user['password']) ? $user['password'] : null ?>">
        </div>
        <div class="form-group">
            <label for="avatar">Avatar</label>
            <input type="text" class="form-control" id="avatar" name="avatar" aria-describedby="emailHelp" placeholder="Enter email" value="<?php echo isset($user['avatar']) ? $user['avatar'] : null ?>">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>

</html>