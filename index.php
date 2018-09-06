<html>
    <head>
        <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="js/main.js"></script>
    </head>
    <body>
        <?php
        require_once("config/config_db.php");

        $connection = new mysqli("127.0.0.1", "testuser", "password", "test_db");
        
        if ($connection -> connect_error) {
            die("Database connection failed:" . $conn->connect_error);
        }
        $sql_query = "SELECT id, description FROM task";
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
                <label>
                    <input type="text" class ="form-control" id="custom_textbox" name="Item" placeholder="What do you need to do?">
                    <input type="submit" value="Add" class="btn btn-primary add_button">
                </label>
            </form>
            <form>
                <ol class="list-group list_of_items">
                    <?php foreach ($tasks as $task): ?>
                    <li class="list-group-item">
                        <div class="text_holder">
                            <?php echo $task['description'] ?>
                            <div class="btn-group pull-right">
                                <button class="delete btn btn-warning" value= "delete" onClick='location.href="?delete=<?php echo $task['id']?>"'>Delete</button>
                                <button class="edit btn btn-success">Edit</button>
                            </div>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="pull-right">
                            </label>
                        </div>
                    </li>
                    <?php endforeach; ?>
                </ol>
            </form>
        </div>
    </body>
</html>