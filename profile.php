<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: /');
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Page</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>

    <form>
        <img src="<?= $_SESSION['user']['photo'] ?>" width="200" alt="photo">
        <h2 style="margin: 10px 0;"><?= "Hello, ", $_SESSION['user']['users_name'] ?></h2>
        <a href="vendor/logout.php" class="logout">Выход</a>
    </form>

</body>
</html>