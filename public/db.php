<?php
$host = 'localhost';
$database = 'student';
$user = 'homestead';
$pass = 'secret';

$dsn = mysqli_connect($host, $user, $pass, $database);
$options = array(
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
);
if ($dsn->connect_errno) {
    printf("Не удалось подключиться: %s\n", $dsn->connect_error);
    exit();
}
?>
