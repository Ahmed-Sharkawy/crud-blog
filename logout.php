<?php
session_start();
$_SESSION['isLogin']  = false;
unset($_SESSION['id']);
unset($_SESSION['email']);
header('location: login.php');
exit;
?>