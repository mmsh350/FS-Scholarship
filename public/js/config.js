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
    
 });

})();
