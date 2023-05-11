<?php
    $errors = [];
    if($_SERVER["REQUEST_METHOD"] == 'POST') {
        if(isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['rpass'])) {
            if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $errors[] = 'Invalid Email';
            }
            if (!preg_match("/^[0-9]+$/", $_POST['pass'])) {
                $errors[] = 'Invalid Password';
            }
            if ($_POST['pass'] !== $_POST['rpass']) {
                $errors[] = 'Repeat Password is not the same';
            }
            if ($errors == []) {
                $errors[] = 'Created Profile';
            }
        } else {
            $errors[] = 'Missing Field';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="./assets/styles/form.css">
</head>
<body>
    <section class="container">
        <section class="form-container">

            <h1 class="form-title">Sign Up</h1>

            <form action="./signup" method="post" class="form">

                <label for="email">Email:</label>
                <input type="email" name="email" id="email">
                
                <label for="password">Password:</label>
                <input type="password" name="pass" id="password">
                
                <label for="Rpassword">Repeat Password:</label>
                <input type="password" name="rpass" id="Rpassword">

                <input type="submit" name="submit" class="submit-btn" value="Sign Up">
                <div class="link">Already have an account? <a href="/login">Login</a></div>

            </form>
            <?php foreach ($errors as $error) { ?>
                <div class="error"><?php echo $error;?></div>
            <?php }?>
        </section>
    </section>
</body>
</html>