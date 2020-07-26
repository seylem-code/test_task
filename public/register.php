<?php
    session_start();
    if(isset($_SESSION['user'])){
        header('Location: profile.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<!--Форма авторизации-->
<form action="signup.php" method="post">
    <label>Логин</label>
    <input type="text" name="login" placeholder="Придумайте свой логин">
    <label>email</label>
    <input type="email" name="email" placeholder="Введите свою почту">
    <label>Пароль</label>
    <input type="password" name="password" placeholder="Придумайте свой пароль">
    <label>Подтверждение пароля</label>
    <input type="password" name="password_confirm" placeholder="Подтвердите свой пароль">
    <button type="submit">Войти</button>
    <p>
        У вас уже есть аккаунт? - <a href="/">Авторизируйтесь</a>
    </p>
    <?php

        if(isset($_SESSION['message'])){
            echo '<p class="msg">'. $_SESSION['message'] .'</p>';
        }
        unset($_SESSION['message']);
    ?>

</form>
</body>
</html>
