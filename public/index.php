<?php
session_start();
if(isset($_SESSION['user'])){
    header('Location: profile.php');
}
include "db.php";

function fill_group($dsn)
{
    $output = '';
    $sql = "SELECT * FROM groups";
    $sql = $dsn->query($sql);
    while ($row = mysqli_fetch_array($sql)) {
        $output .= '<option value="' . $row["grp_id"] . '">' . $row["group_name"] . '</option>';
    }
    return $output;
}
function fill_info($dsn){
    $output = '';
    $sql_join = "SELECT * FROM groups JOIN students ON groups.grp_id = students.group_id JOIN grade ON students.std_id = grade.student_id JOIN subjects ON subjects.sub_id = grade.subject_id";
    $sql_join = $dsn->query($sql_join);

    while($row = mysqli_fetch_array($sql_join)) {
//
        $output .= '<tr><td>'.$row["group_name"].'</td><td>'.$row["student_name"].'</td><td>'.$row["grade_name"].'</td><td>'.$row["subject_name"].'</td>';
//

    }
    return $output;



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
<form action="signin.php" method="post">
    <label>Логин</label>
    <input type="text" name="login" placeholder="Введите свой логин">
    <label>Пароль</label>
    <input type="password" name="password" placeholder="Введите свой пароль">
    <button type="submit">Войти</button>
    <p>
        Нет аккаунта? - <a href="register.php">Зарегистрируйтесь</a>
    </p>
    <?php

    if(isset($_SESSION['message'])){
        echo '<p class="msg">'. $_SESSION['message'] .'</p>';
    }
    unset($_SESSION['message']);
    ?>
</form>

<h3>
    <select name="group" id="group">
        <option value="">Показать все группы</option>
        <?php echo fill_group($dsn); ?>
    </select>
    <br /><br />

</h3>
<div class="row" id="show_info">

</div>
</body>
</html>

<script>
    $(document).ready(function () {
        $('#group').change(function () {
            var grp_id = $(this).val();
            //console.log(grp_id);
            $.ajax({
               url: 'select.php',
               method: 'POST',
                data:{grp_id:grp_id},
                success: function(data){
                   $('#show_info').html(data);
                }
            });
        });

    });
</script>
