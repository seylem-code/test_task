<?php
session_start();
    if(!isset($_SESSION['user'])){
        header('Location: /');
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
    <label>Привет</label>
   <h2 style="margin: 10px 0"><?= $_SESSION['user']['login']?></h2>
    <h2><?= $_SESSION['user']['email']?></h2>
    <a href="logout.php" class="logout">Выход</a>


</form>
</body>
</html>
