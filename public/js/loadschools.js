$(document).ready(function() { 
    var _token = $('#_token').val();          
    $("#schl_category").change(function(){
        $("#school_name").attr('disabled', true);
        
      var getId = $(this).val();
    
      $.ajax({    //create an ajax request to get session data 
      type: "POST",
      url: "get-schools",
      dataType: "json",   //expect json File to be returned  
      data: {getId:getId,_token},		
      success: function(response){                  
           var len = response.length;
                      $("#school_name").attr('disabled', false);
                      $("#school_name").empty();   
                      $("#school_name").append("<option value=''>"+"Choose..."+"</option>");
                      for( var i = 0; i<len; i++)
                      {
                           
                         var id = response[i]['id'];
                         var name = response[i]['schl_name'];
                    
                         $("#school_name").append("<option value='"+id+"'>"+name+"</option>");  
                                                  
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