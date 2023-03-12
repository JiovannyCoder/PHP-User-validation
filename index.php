<?php

    require('User_validator.php');

    $message = $username = $email = "";

    if(isset($_POST['submit'])) {
        $validation = new UserValidator($_POST);

        $username = $_POST['username'];
        $email = $_POST['email'];

        $errors = $validation->validateForm();
        if(!$errors) {
            $message = 'User validate successfully !';
        }
    }

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User validation POO</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="create-user">
        <h2>Create a new user</h2>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <label for="username">Username : </label>
            <input type="text" name="username" id="username" value="<?php echo htmlspecialchars($username) ?? '' ?>">
            <div class="error">
                <?php echo $errors['username'] ?? '' ?>
            </div>
            <label for="email">Email : </label>
            <input type="text" name="email" id="email" value="<?php echo htmlspecialchars($email) ?? '' ?>">
            <div class="error">
                <?php echo $errors['email'] ?? '' ?>
            </div>
            <input type="submit" value="Validate" name="submit">
            <div class="message">
            <?php echo $message ?? '' ?>
            </div>
        </form>
    </div>
</body>
</html>