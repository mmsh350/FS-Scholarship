(function () {
  var primary = localStorage.getItem("primary") || "#7A70BA";
  var secondary = localStorage.getItem("secondary") || "#48A3D7";

  window.MofiAdminConfig = {
    // Theme Primary Color
    primary: primary,
    // theme secondary color
    secondary: secondary,
  };

  $(window).on('load', function(){
    $('body').addClass('loaded');
    $("#spinner").hide();
    $("#spinner2").hide();
    
 });

})();

$('#read').click(function(evt) {
  $.ajax({    //create an ajax request to get session data 
     type: "POST",
     url: "read",   //expect json File to be returned  
     success: function(response){ 
      $('#done').show();
     }
    });
});
