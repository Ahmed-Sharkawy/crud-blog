<?php
require('inc/connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $title = trim(htmlspecialchars($_POST['title']));
  $body  = trim(htmlspecialchars($_POST['body']));
  $id    = trim(htmlspecialchars($_POST['id']));

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

    $query  = "UPDATE `posts` SET `title` = '$title' , `body` = '$body'  WHERE `id` = $id ";
    $result = $con->query($query);
    if ($result) {
      header('location: index.php');
    }
  } else {
    $_SESSION['errors'] = $errors;
    header("location: edit-post.php?id=$id");
  }
}