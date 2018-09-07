<?php
    require_once("../config/dbconnect.php"); 
    $sql = "delete from task where id =" .$_POST["id"];
    echo $sql;
    if ($connection->query($sql)) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $connection->error;
    }
?>