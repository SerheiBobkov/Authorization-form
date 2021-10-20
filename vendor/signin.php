<?php
session_start();
require_once 'connect.php';

$login = $_POST['users_login'];
$password = md5($_POST['password']);
$check_result = mysqli_query($connect, "SELECT * FROM `users` WHERE `users_login` = '$login' AND `password` = '$password'");

if (mysqli_num_rows($check_result)>0) {

    $user = mysqli_fetch_assoc($check_result);

    $_SESSION['user'] = [
//        "id" => $user['id'],
        "users_login" => $user['users_login'],
        "users_name" => $user['users_name'],
        "password" => $user ['password'],
        "photo" => $user['photo'],
//        "email" => $user['users_email']
    ];
    header('Location: ../profile.php');

} else {
    $_SESSION["login_attempts"] += 1;
    $_SESSION['message'] = 'Не верный логин или пароль';
    header('Location: ../index.php');
}
?>


