<?php
session_start();
include "db_users.php";

$login = $_POST['login'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];

    if($password == $password_confirm){
        $password = md5($password);
        $sql = "INSERT INTO users (login, email, pass) VALUES ('$login', '$email', '$password')";
        $result = $dsn->query($sql);

        $_SESSION['message'] = 'Регистрация прошла успешно';
        header('Location: index.php' );
    } else{
        $_SESSION['message'] = 'Пароли не совпадают';
        header('Location: register.php' );
    }
?>
