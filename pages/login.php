<?php
    $errors = [];
    if($_SERVER["REQUEST_METHOD"] == 'POST') {
        if(isset($_POST['email']) && isset($_POST['pass'])) {
            if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $errors[] = 'Invalid Email';
            } elseif (!preg_match("/^[0-9]+$/", $_POST['pass'])) {
                $errors[] = 'Invalid Password';
            } else {
                if ($_POST['email'] == "m.khoshdel81@gmail.com" && $_POST['pass'] == '1234') {
                    $errors[] = 'Successful Login';
                } else {
                    $errors[] = 'Wrong Email or Password';
                }
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
    <title>Login</title>
    <link rel="stylesheet" href="./assets/styles/form.css?2">
</head>
<body>
    <section class="container">
        <section class="form-container">

            <h1 class="form-title">Login</h1>

            <form action="./login" method="post" class="form">

                <label for="email">Email:</label>
                <input type="email" name="email" id="email">
                
                <label for="password">Password:</label>
                <input type="password" name="pass" id="password">

                <div class="checkbox-container">
                    <input type="checkbox" name="remember" id="checkbox">
                    <label for="checkbox">Remember Me</label>
                </div>

                <input type="submit" name="submit" class="submit-btn" value="Login">
                <div class="link">Not Registered? <a href="/signup">Sign up</a></div>

            </form>
            <?php foreach ($errors as $error) { ?>
                <div class="error"><?php echo $error;?></div>
            <?php }?>
        </section>
    </section>
</body>
</html>