<?php
session_start();

  $con = new mysqli("localhost", "root", "", "dbblog");

  if ($con->connect_error){
    die($con->connect_error);
  }

?>