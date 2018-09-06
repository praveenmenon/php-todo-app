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
        require_once("config/config_db.php");

        $connection = new mysqli("127.0.0.1", "testuser", "password", "test_db");
        
        if ($connection -> connect_error) {
            die("Database connection failed:" . $conn->connect_error);
        }
        $sql_query = "SELECT * FROM task";
	    $result = $connection->query($sql_query);
	    $tasks = array();
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $tasks[] = $row;
            }
        }
        
        if($_GET['delete']){delete();}
        if($_GET['button2']){fun2();}

        function delete()
        {
         $delete_query = "DELETE FROM task where id = " . $_GET['delete'];
         echo $delete_query;
        //  $result = $connection->query($delete_query);
        //  echo $result;
        }
        function fun2()
        {
        //This function will update some column in database to 2
        }

        $connection->close();
        ?>
        <div class="container" id="main">
            <h1>To-Do List PHP</h1>
            <form role ="form" id="main_input_box">
            <table class="table">
                <tr>
                    <td><input type="text" class ="form-control" id="custom_textbox" name="Item" placeholder="What do you need to do?" required></td>
                    <td><input type="text" class ="form-control" id="custom_textbox" name="ttask_description" placeholder="Give a description of your task"></td>             
                    <td><input class="form-control" id="date" name="date" placeholder="MM/DD/YYYY" type="text" required/></td>
                    <td><input type="submit" value="Add" class="btn btn-primary add_button"></td>
                </tr>
            </table>
            </form>
            <form>
              <table class="table table-dark">
              <thead>
              <tr>
                <th scope="col">Date</th>
                <th scope="col">Done</th>
                <th scope="col">Ttile</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
              </tr>
              </thead>
                <?php foreach ($tasks as $task): ?>
                  <tr class="list-group list_of_items">
                      <!-- <li class="list-group-item"> -->
                      <td><label class="completed_item"><?php echo $task['date'] ?></td>  
                      <td>
                        <div class="checkbox">
                          <label>
                            <input type="checkbox">
                          </label>
                        </div>
                      </td>
                      <td><?php echo $task['title'] ?></td>  
                      <td><?php echo $task['description'] ?></td>             
                      <td><button class="delete btn btn-warning" value= "delete" onClick='location.href="?delete=<?php echo $task['id']?>"'>Delete</button>
                      <button class="edit btn btn-success">Edit</button></td>
                      <!-- </li> -->
                  </tr>
                <?php endforeach; ?>
                </table>
            </form>
        </div>
    </body>
</html>