<?php
  require_once("config_db.php");
  $connection = new mysqli($servername, $username, $password, $dbname);

  if ($connection -> connect_error) {
    die("Database connection failed:" . $connection->connect_error);
  }
?>