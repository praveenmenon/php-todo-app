<html>
  <head>
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    <script src="js/main.js"></script>
  </head>
  <body>
    <?php
    require_once("config/dbconnect.php");
    $sql_query = "SELECT * FROM task";
    $result = $connection->query($sql_query);
    $tasks = array();
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $tasks[] = $row;
      }
    }
    ?>

    <div class="container" id="main">
      <?php include('layouts/header.php'); ?>
      <form>
        <table class="table table-dark">
        <thead>
        <tr>
          <th scope="col">Done</th>
          <th scope="col">Date</th>
          <th scope="col">Ttile</th>
          <th scope="col">Description</th>
          <th scope="col">Action</th>
        </tr>
        </thead>
          <?php foreach ($tasks as $task): ?>
            <tr class="list-group list_of_items">
                <td>
                  <?php if ($task['complete'] == true) : ?>
                    <input type="checkbox" class="checkbox" checked data-id='<?php echo $task['id']?>'>
                  <?php  else : ?>
                    <input type="checkbox" class="checkbox" data-id='<?php echo $task['id']?>'>
                  <?php endif; ?>
                </td>
                <td><label><?php echo $task['date'] ?></td>  
                <td><?php echo $task['title'] ?></td>  
                <td><?php echo $task['description'] ?></td>             
                <td>
                  <button class="delete btn btn-warning" value= "delete" data-id='<?php echo $task['id']?>'>Delete</button>
                  <!-- <button class="edit btn btn-success" data-id='<?php echo $task['id']?>'>Edit</button> -->
                </td>
            </tr>
          <?php endforeach; ?>
        </table>
      </form>
    </div>
  </body>
</html>