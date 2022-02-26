<?php
require('inc/connection.php');

if ($_SESSION['isLogin'] == false) {
  header('location: login.php');
  exit();
}

if (isset($_GET['id'])) {

  $id = $_GET['id'];

  $query  = "DELETE FROM `posts` WHERE `id` = '$id' ";
  $result = $con->query($query);
  header('location:index.php');
} else {
  header('location:index.php');
}