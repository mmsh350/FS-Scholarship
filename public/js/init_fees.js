$(document).ready(function() {
	//Create New Account Information
	$('#pay').click(function(evt) {
		//$('#pay').prop("disabled", true);
		
           var _token = $('#_token').val();   
           let  appid =  $('#app_id').val();
           $.ajax({    //create an ajax request to get session data 
            type: "POST",
            url: "make-payment",   //expect json File to be returned  
            data: {appid:appid,_token},		
            success: function(response){  

							window.scrollTo(0, 0);
							$("#success1").show();
							$('#success1').append('<strong>Transaction Completed!</strong>');
							$('#pay').html("Redirecting ...");
							setTimeout(function(){  
								$("#error1").hide();
								 
							  window.location.reload(); 
							}, 5000);
				},
				error: function(data) {
					window.scrollTo(0, 0);
					$("#error1").show();
					$.each(data.responseJSON.errors, function (key, value) {
						$("#error1").empty();
						$('#error1').append('<strong>'+value+'</strong>');
					});
					
						setTimeout(function(){ 
							window.scrollTo(0, 0); 
							$('#submit').prop("disabled", false);
							$("#error1").empty();
							$("#error1").hide();
						}, 5000);
				}
			});
	 

	});

    //Pay Modal
    $('#payModal').on('shown.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id') 
        var amt = button.data('amount')// Extract info from data-* attributes
    
        $("#app_id").val(id);
        $("#amount").html(amt);
        
         
    });

	//Pay Modal
    $('#rejectModal').on('shown.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
       
        var comment = button.data('comments')// Extract info from data-* attributes

        $("#message").html(comment);
        
         
    });

 
});