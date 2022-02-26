<?php
require('inc/connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $email         = trim(htmlspecialchars($_POST['email']));
  $password      = trim($_POST['password']);


  $errors = [];

  if (empty($email)) {
    $errors[] = 'email is require';
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'email not valid';
  } elseif (strlen($email) > 255) {
    $errors[] = "em$email must be <= 255";
  }

  if (empty($password)) {
    $errors[] = 'password is require';
  } elseif (!is_string($password)) {
    $errors[] = 'password not valid';
  }

  if (empty($errors)) {

    $query  = "SELECT * FROM `users` WHERE `email` = '$email'";
    $result = $con->query($query);

    if ($result->num_rows) {

      $user = $result->fetch_assoc();
      // $password_hash = password_hash($password,PASSWORD_DEFAULT);
      $resultpassword = password_verify($password, $user['password']);

      if ($resultpassword) {

        $_SESSION['isLogin']  = true;
        $_SESSION['id']       = $user['id'];
        $_SESSION['email']    = $user['email'];

        header('location: index.php');
      } else {
        $_SESSION['errors'] = ["credintials not correct"];
        header('location: login.php');
      }
    } else {
      $_SESSION['errors'] = ["credintials not "];
      header('location: login.php');
    }
  } else {
    $_SESSION['errors'] = $errors;
    header('location: login.php');
  }
} else {
  header('location: login.php');
}
