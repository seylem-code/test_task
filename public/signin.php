<?php
    session_start();
    include "db_users.php";

    $login = $_POST['login'];
    $password = md5($_POST['password']);

    $check_user = $dsn->query("SELECT * FROM users WHERE login = '$login' AND pass = '$password'");
    if(mysqli_num_rows($check_user) > 0){

        $user = mysqli_fetch_assoc($check_user);
        $_SESSION['user'] = [
            "login" => $user['login'],
            "email" => $user['email']
        ];

        header('Location: profile.php');

    } else{
        $_SESSION['message'] = 'Не верный логин или пароль';
        header('Location: index.php' );

    }


