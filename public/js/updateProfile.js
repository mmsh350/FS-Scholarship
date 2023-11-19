$(document).ready(function() {
	//Create New Account Information
	$('#btnSave').click(function(evt) {
		$('#btnSave').prop("disabled", true);
		var first_name = $('#firstname').val();
		var last_name = $('#surname').val();
		var dob = $('#dob').val();
		var phone = $('#phone').val();
		var gender = $('#gender').val();
		 
		if (first_name !== "" && last_name !== "" && dob !== "" && gender !== "" && phone !=="" ) {
		// Stop the button from submitting the form:
			evt.preventDefault();

			// Serialize the entire form:
			var data = new FormData(this.form);
			$.ajax({
				url: 'profileUpdate',
				type: "POST",
				data,
				processData: false,
				contentType: false,
				cache: false,
				success: function(dataResult) {
							window.scrollTo(0, 0);
							$("#success").show();
							$('#success').append('<strong>Update Succesfully!</strong>');
							$('#btnSave').html("Redirecting ...");
							setTimeout(function(){  
								$("#error3").hide();
								$('form').trigger("reset");
								window.location.reload(); 
							}, 2000);
				},
				error: function(data) {
					window.scrollTo(0, 0);
					$("#error3").show();
					$.each(data.responseJSON.errors, function (key, value) {
						$("#error3").empty();
						$('#error3').append('<strong>'+value+'</strong>');
					});
					
						setTimeout(function(){ 
							window.scrollTo(0, 0); 
							$('#btnSave').prop("disabled", false);
							$("#error3").empty();
							$("#error3").hide();
						}, 5000);
				}
			});
	} else 	{

						window.scrollTo(0, 0);
						$("#error3").empty();
						$('#error3').append('<strong>Please fill in the required fields (*)</strong>');
						$("#error3").show();
						setTimeout(function(){  	
							$('#btnSave').prop("disabled", false);
							$("#error3").hide();
						}, 2000); 

			}

	});
	//Update Password

	$('#btnUpdate').click(function(evt) {
		$('#btnUpdate').prop("disabled", true);
		$("#spinner").show();
		var pass = $('#password').val();
		var cpass = $('#current_password').val();
		var passconfirm = $('#password_confirmation').val();
		 
		 
		if (pass !== "" && cpass !== "" && passconfirm !== "") {
		// Stop the button from submitting the form:
			evt.preventDefault();

			// Serialize the entire form:
			var data = new FormData(this.form);
			$.ajax({
				url: 'password',
				type: "POST",
				data,
				processData: false,
				contentType: false,
				cache: false,
				success: function(dataResult) {
							window.scrollTo(0, 0);
							$("#success1").show();
							$('#success1').append('<strong>Update Succesfully! </strong>');
							setTimeout(function(){  
								$('form').trigger("reset");
								window.location.reload(); 
							}, 2000);
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
							$('#btnUpdate').prop("disabled", false);
							$("#error1").empty();
							$("#error1").hide();
						}, 2000);
				}
			});
	} else 	{

						window.scrollTo(0, 0);
						$("#error1").empty();
						$('#error1').append('<strong>All Fields are required! </strong>');
						$("#error1").show();
						setTimeout(function(){  	
							$('#btnUpdate').prop("disabled", false);
							$("#error1").hide();
						}, 2000); 

			}

	});
});