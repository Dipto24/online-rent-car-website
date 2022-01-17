<?php
session_start();

session_destroy();

unset($_COOKIE['user_login']);

setcookie('user_login', $phonenumber, -time()+60*60);

header('Location: login.php');

?>