
$(document).ready(function() {

const currentDate = new Date();

function formatDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) 
        month = '0' + month;
    if (day.length < 2) 
        day = '0' + day;

    return [ year,month, day].join('-');
}
 
$('#date1').val(formatDate(currentDate)) ;
$('#date2').val(formatDate(currentDate)) ;

$('#from').html(formatDate(currentDate)) ;
$('#to').html(formatDate(currentDate)) ;

setTimeout(function() {
    $('#generate').trigger('click');
},10);

$('#generate').click(function(evt) {
   
    
   
$('#generate').prop("disabled", true);
 
  $("#error1").empty();
  $("#spinner2").show();
  // Stop the button from submitting the form:
      evt.preventDefault();

      // Serialize the entire form:
      var data = new FormData(this.form);
      $.ajax({
          url: "generate",
          type: "POST",
          data,
          processData: false,
          contentType: false,
          cache: false,       
          success: function(data) {
              $('#generate').prop("disabled", false);
                      $("#success1").show().empty();
                      $('#success1').append('<strong> Revenue Fetched!</strong>');

                      $('#interest').html('&#8358; '+data.interest);
                      $('#upfront').html('&#8358; '+ data.fee);
                      $('#total').html('&#8358; '+ data.total);
                    
                     let d1 = $('#date1').val();
                     let d2 = $('#date2').val();
                      $('#from').html(d1) ;
                      $('#to').html(d2) ;

                      setTimeout(function(){  
                        $("#success1").empty().fadeOut();
                    }, 4000);
          },
          error: function(data) {
              window.scrollTo(0, 0);
              $.each(data.responseJSON.errors, function (key, value) {
                  $("#error1").show().empty();
                  $('#error1').append('<strong>'+value+'</strong>');
              });
              
                  setTimeout(function(){  
                      $('#generate').prop("disabled", false);
                      $("#error1").empty().fadeOut();
                  }, 4000);
          }
      });
  
});
});