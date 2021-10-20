<?php
    session_start();
    require_once 'connect.php';

    $users_name = $_POST['users_name'];
    $users_login = $_POST['users_login'];
    $users_email = $_POST['users_email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    if ($password === $password_confirm) {

        $path = 'uploads/' . time() . $_FILES['photo']['name'];
        if (!move_uploaded_file($_FILES['photo']['tmp_name'], '../' . $path)) {
            $_SESSION['message'] = 'Ошибка при загрузке файла';
            header('Location: ../register.php');
        }

        $password = md5($password);

        mysqli_query($connect, "INSERT INTO `users` 
                                        (`id`, 
                                         `users_login`,
                                         `users_name`, 
                                         `users_email`, 
                                         `password`, 
                                         `photo`) 
                                       VALUES (NULL,'$users_login', '$users_name',  '$users_email', '$password', '$path')");

        $_SESSION['message'] = 'Регистрация прошла успешно!';
        header('Location: ../index.php');


    } else {
        $_SESSION['message'] = 'Пароли не совпадают';
        header('Location: ../register.php');
    }

?>
