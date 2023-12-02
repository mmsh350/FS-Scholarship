$(document).ready(function() {
	//Create New Account Information
	$('#submit').click(function(evt) {
		$('#submit').prop("disabled", true);
		
		// Stop the button from submitting the form:
			evt.preventDefault();

			// Serialize the entire form:
			var data = new FormData(this.form);
			$.ajax({
				url: 'app-handler',
				type: "POST",
				data,
				processData: false,
				contentType: false,
				cache: false,
				success: function(dataResult) {
							window.scrollTo(0, 0);
							$("#success").show();
							$('#success').append('<strong>Application Submitted Succesfully!</strong>');
							$('#submit').html("Redirecting ...");
							setTimeout(function(){  
								$("#error").hide();
								$('form').trigger("reset");
							  window.location.reload(); 
							}, 2000);
				},
				error: function(data) {
					window.scrollTo(0, 0);
					$("#error").show();
					$.each(data.responseJSON.errors, function (key, value) {
						$("#error").empty();
						$('#error').append('<strong>'+value+'</strong>');
					});
					
						setTimeout(function(){ 
							window.scrollTo(0, 0); 
							$('#submit').prop("disabled", false);
							$("#error").empty();
							$("#error").hide();
						}, 5000);
				}
			});
	 

	});
	 
});