$(document).ready(function() {   
    var _token = $('#_token').val();        
    $.ajax({    //create an ajax request to get session data 
    type: "POST",
    url: "get-countries",
    data:{_token},
    dataType: "json",   //expect json File to be returned                
    success: function(response){                    
         var len = response.length;
                    $("#country").empty();
                    $("#country").append("<option value=''>"+"Choose..."+"</option>");
                    
                    $("#nationality").empty();
                    $("#nationality").append("<option value=''>"+"Choose..."+"</option>");

                    for( var i = 0; i<len; i++)
                    {
                         var id = response[i]['id'];
                         var dname = response[i]['CountryName'];

                         $("#country").append("<option value='"+id+"'>"+dname+"</option>"); 
                         $("#nationality").append("<option value='"+id+"'>"+dname+"</option>"); 
                    }   
    },
    error:function(data) 
            {
                $("#error").show(); $("#error").html('');
                $('#error').append('<div class="alert alert-danger alert-dismissible" role="alert"><strong> Error(500) Error Processing your request, Please contact the administrator! </strong></div');
            }
});	


});