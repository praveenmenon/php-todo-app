<?php
  require_once("../config/dbconnect.php");
  $sql = "UPDATE task SET complete =" .$_POST["complete"] ." where id = " .$_POST["id"];
  print_r($sql);
  if ($connection->query($sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $connection->error;
  }
?>