$(document).ready(function(){
  $("form#main_input_box").submit(function(event){  
    $.ajax({
      url: "modules/addTask.php",
      type: "post",
      data: $("form#main_input_box").serialize(),
      success: function(d){
       console.log(d);
      }
    });
  });

  $(".list_of_items").on("click", "button.delete", function(){
    var del = $(this);
    var id = $(this).attr("data-id");
    $.ajax({
      url: "modules/deleteTask.php",
      type: "post",
      data: {id: id},
      success: function() {
        del.closest("tr").hide();
      }
    });
  });

  $(".checkbox").change(function(){
    var del = $(this);
    var id = $(this).attr("data-id");
    var checked = false;
    if(this.checked) {
      checked = true;
    }
    $.ajax({
      url: "modules/updateTask.php",
      type: "post",
      data: {
        id: id,
        complete: checked
      },
      success: function(d) {
        console.log(d);
      }
    });
  });

  var date_input=$('input[name="date"]'); //our date input has the name "date"
  var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
  var options={
    format: 'mm/dd/yyyy',
    container: container,
    todayHighlight: true,
    autoclose: true,
  };
  date_input.datepicker(options);

  // if ($(".checkbox").is(':checked')){
  //   $(".list_of_items").closest('tr').toggleClass("completed_item");
  //   // $(".list_of_items").closest('tr').find('.edit').hide();
  // }

  // Update
  // $(".list_of_items").on("click", "button.edit", function(){
  //   var del = $(this);
  //   var id = $(this).attr("data-id");
  //   $("#hiddenField").val(id); 
  // });
});