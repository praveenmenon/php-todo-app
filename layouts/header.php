<h1>To-Do List PHP</h1>
<form action= "index.php" method = "post" role ="form" id="main_input_box">
<table class="table">
  <tr>
    <td><input type="text" class ="form-control title" id="custom_textbox" name="title" placeholder="What do you need to do?" required></td>
    <td><input type="text" class ="form-control description" id="custom_textbox" name="task_description" placeholder="Give a description of your task"></td>             
    <td><input class="form-control dateField" id="date" name="date" placeholder="MM/DD/YYYY" type="text" required/></td>
    <td><input type="submit" name="submit" value="add" class="btn btn-primary add_button"></td>
  </tr>
</table>
</form>