$(document).ready(function() {

	//Create New Account Information
	$('#register').click(function(evt) {

		if($('#checkbox1').is(':checked'))
		 {
			$('#register').prop("disabled", true);
			$("#spinner").show();
			var first_name = $('#firstname').val();
			var last_name = $('#lastname').val();
			var email = $('#email').val();
			var password = $('#password').val();
			var cpassword = $('#password_confirmation').val();
			
			if (first_name !== "" && last_name !== "" && email !== "" && password !== "" && cpassword !=="" ) {
			// Stop the button from submitting the form:
				evt.preventDefault();
	
				// Serialize the entire form:
				var data = new FormData(this.form);
				$.ajax({
					url: "register",
					type: "POST",
					data,
					processData: false,
					contentType: false,
					cache: false,
					success: function(dataResult) {
	
								$("#error2").empty();
								$("#errorColor2").css("background", "green");
								$('#error2').append('<strong>Account Created Succesfully!</strong>');
								$('#register').html("Redirecting ...");
	
								setTimeout(function(){  
									$('form').trigger("reset");
									location.href = dataResult.redirect_url; 
								}, 2000);
					},
					error: function(data) {
						 
						$.each(data.responseJSON.errors, function (key, value) {
							$("#error2").empty();
							$('#error2').append('<strong>'+value+'</strong>');
						});
						
							setTimeout(function(){  
								$('#register').prop("disabled", false);
								$("#spinner").hide();  
								$("#error2").empty();
							}, 5000);
					}
				});
		} else 	{
	
							$("#error2").empty();
							$('#error2').append('<strong>All fields are required!</strong>');
							setTimeout(function(){  	
								$("#spinner").hide();
								$('#register').prop("disabled", false);
							}, 2000); 
	
				}
		 }
		 else 	{
	
			$("#error2").empty();
			$('#error2').append('<strong>Please accept our privacy policy</strong>');
			setTimeout(function(){  	
				$("#spinner").hide();
				$('#register').prop("disabled", false);
			}, 2000); 

}
		

	});
	
});