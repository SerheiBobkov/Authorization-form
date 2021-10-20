<?php

session_start();

if ($_SESSION['user']) {
    header('Location: profile.php');
}
//}else{
//        header('Location: ../index.php');
//}

elseif (isset($_SESSION["locked"]))
{
    $difference = time() - $_SESSION["locked"];
    if ($difference > 30)
    {
        unset($_SESSION["locked"]);
        unset($_SESSION["login_attempts"]);
    }
}
//session_destroy();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Authorization</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
    <form action="vendor/signin.php" method="post">
        <label>Login</label>
        <input type="text" name="users_login" placeholder="Enter your login">
        <label>Password</label>
        <input type="password" name="password" placeholder="Enter your password">
        <?php

        if ($_SESSION["login_attempts"] >= 3) {
            $_SESSION["locked"] = time();

            echo "Please wait for 30 seconds";

        } else {
            ?>
            <button type="submit">Enter</button>
        <?php } ?>

        <p>
            You don't have an account? - <a href="/register.php">Register now</a>
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