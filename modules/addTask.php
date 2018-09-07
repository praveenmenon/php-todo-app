<?php
  require_once("../config/dbconnect.php");
    $title = $_POST['title'];
    $description = $_POST['task_description'];
    $date = $_POST['date'];
    $complete = 0; 
    $sql = "INSERT INTO task (title, description, date, complete) VALUES ('{$title}', '{$description}', '{$date}', {$complete})";
    echo $sql;
    if ($connection->query($sql)) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $connection->error;
    }
?>