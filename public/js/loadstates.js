$(document).ready(function() {  
    var _token = $('#_token').val();      
    $.ajax({    //create an ajax request to get session data 
    type: "POST",
    url: "get-state",
    data:{_token},
    dataType: "json",   //expect json File to be returned                
    success: function(response){                    
         var len = response.length;
                    $("#state").empty();
                    $("#state").append("<option value=''>"+"Choose..."+"</option>");
                    
                    $("#nok_state").empty();
                    $("#nok_state").append("<option value=''>"+"Choose..."+"</option>");

                    $("#hos_state").empty();
                    $("#hos_state").append("<option value=''>"+"Choose..."+"</option>");

                    for( var i = 0; i<len; i++)
                    {
                         var id = response[i]['id'];
                         var dname = response[i]['stateName'];

                         $("#state").append("<option value='"+id+"'>"+dname+"</option>"); 
                         $("#nok_state").append("<option value='"+id+"'>"+dname+"</option>"); 
                         $("#hos_state").append("<option value='"+id+"'>"+dname+"</option>"); 
                    }   
    },
    error:function(data) 
            {
                $("#error").show(); $("#error").html('');
                $('#error').append('<div class="alert alert-danger alert-dismissible" role="alert"><strong> Error(500) Error Processing your request, Please contact the administrator! </strong></div');
            }
});	


});