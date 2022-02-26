<?php
require('inc/connection.php');
require('inc/header.php');
require('inc/navbar.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $title = trim(htmlspecialchars($_POST['title']));
  $body  = trim(htmlspecialchars($_POST['body']));

  $errors = [];

  # Validation

  if (empty($title)) {
    $errors[] = 'title is require';
  } elseif (!is_string($title)) {
    $errors[] = 'title must be string';
  } elseif (strlen($title) > 255) {
    $errors[] = 'title must be <= 255';
  }

  if (empty($body)) {
    $errors[] = 'body is require';
  } elseif (!is_string($body)) {
    $errors[] = 'body must be string';
  }

  if (empty($errors)) {

    # INSERT

    $query  = "INSERT INTO `posts` (`title`,`body`,`user_id`) VALUES ('$title', '$body', 1)";
    $result = $con->query($query);
    if ($result) {
      header('location: index.php');
    }
  } else {
    $_SESSION['errors'] = $errors;
    header('location: create-post.php');
  }
}
