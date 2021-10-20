<?php
    session_start();
    if ($_SESSION['user']) {
        header('Location: profile.php');
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>

    <form action="vendor/signup.php" method="post" enctype="multipart/form-data">
        <label>Full name</label>
        <input type="text" name="users_name" placeholder="Enter your full name">
        <label>Login</label>
        <input type="text" name="users_login" placeholder="Enter your login">
        <label>Email</label>
        <input type="email" name="users_email" placeholder="Enter your email">
        <label>Photo</label>
        <input type="file" name="photo">
        <label>Password</label>
        <input type="password" name="password" placeholder="Enter password">
        <label>Confirm password</label>
        <input type="password" name="password_confirm" placeholder="Confirm password">
        <button type="submit">Register</button>
        <p>
            You already have an account? - <a href="/">Log in</a>
        </p>
        <?php
            if ($_SESSION['message']) {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
        ?>
    </form>

</body>
</html>