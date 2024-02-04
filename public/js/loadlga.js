$(document).ready(function() {  
    var _token = $('#_token').val();         
    $("#state").change(function(){
        $("#lga").attr('disabled', true);
      var getId = $(this).val();
    
      $.ajax({    //create an ajax request to get session data 
      type: "POST",
      url: "get-lga",
      dataType: "json",   //expect json File to be returned  
      data: {getId:getId,_token},		
      success: function(response){                  
           var len = response.length;
                      $("#lga").attr('disabled', false);
                      $("#lga").empty();   
                      $("#lga").append("<option value=''>"+"Choose..."+"</option>");
                      for( var i = 0; i<len; i++)
                      {
                           
                         var id = response[i]['id'];
                         var name = response[i]['lgaName'];
                    
                         $("#lga").append("<option value='"+id+"'>"+name+"</option>");                            
                      }
      },
      error:function(data) 
      {
                  $("#error").show(); $("#error").html('');
                  $('#error').append('<div class="alert alert-danger alert-dismissible" role="alert"><strong> Error(500) Error Processing your request, Please contact the administrator! </strong></div');
                  setTimeout(function(){  
                      $('#error').fadeOut("slow"); 
                  }, 3000); 
      }

  });
   });
  
   $("#nok_state").change(function(){
    var getId = $(this).val();
    $("#nok_lga").attr('disabled', true);
    $.ajax({    //create an ajax request to get session data 
    type: "POST",
    url: "get-lga",
    dataType: "json",   //expect json File to be returned  
    data: {getId:getId,_token},			
    success: function(response){                  
         var len = response.length;
                    $("#nok_lga").attr('disabled', false);
                    $("#nok_lga").empty();   
                    $("#nok_lga").append("<option value=''>"+"Choose..."+"</option>");
                    for( var i = 0; i<len; i++)
                    {
                         
                       var id = response[i]['id'];
                       var name = response[i]['lgaName'];
                  
                       $("#nok_lga").append("<option value='"+id+"'>"+name+"</option>");                            
                    }
    },
    error:function(data) 
    {
                $("#error").show(); $("#error").html('');
                $('#error').append('<div class="alert alert-danger alert-dismissible" role="alert"><strong> Error(500) Error Processing your request, Please contact the administrator! </strong></div');
                setTimeout(function(){  
                    $('#error').fadeOut("slow"); 
                }, 3000); 
    }
      
}); 
});
   
  
});