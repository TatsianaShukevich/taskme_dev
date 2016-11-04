function add_task() {
  var caption = $('#caption').val();
  var description = $('#description').val();

  $.ajax({
      method: "POST",
      url: "/task/create",
      beforeSend: function( ) {
        return true;
      },
      data: {
              caption: caption,
              description: description,
              date_created: "",
              date_deadline: "",
              assignee: ""
            }
    })
    //.before(function (data) {
    //  return true;
    //})
    .success(function( output ) {

    });



};

function validate() {
  return true;
};

(function($){

  //$('#date_created').datepicker.setDefaults({
  //  showOn: "both",
  //  buttonImageOnly: true,
  //  buttonImage: "calendar.gif",
  //  buttonText: "Calendar"
  //});

  //$("#date_created").datepicker();
//console.log($("#datepicker"));
//  $("#datepicker").datepicker.setDefaults({
//      showOn: "both",
//      buttonImageOnly: true,
//      buttonImage: "calendar.gif",
//      buttonText: "Calendar"
//    });
  //$.ajax({
  //    method: "POST",
  //    url: "../app/src/Controller/TaskController.php",
  //    data: { name: "John", location: "Boston" }
  //  })
  //  .done(function( msg ) {
  //    alert( "Data Saved: " + msg );
  //  });
})(jQuery);
