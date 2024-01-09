$(document).ready(function() {

	$('#pay').click(function(evt) {
		
		$('#pay').prop("disabled", true);     
			
		$("#spinner").show();
			let loanid = $('#loanid').val();   
			
			   var _token = $('#_token').val();   
			   
			   $.ajax({    //create an ajax request to get session data 
				type: "POST",
				url: "make-repayment",   //expect json File to be returned  
				data: {loanid:loanid,_token},		
				success: function(response){  
					$("#spinner").hide();
								window.scrollTo(0, 0);
								$("#success1").show();
								$('#success1').append('<strong>Loan Repayment Sucessfully !</strong>');
								$('#pay').html("Redirecting ...");
								setTimeout(function(){  
									$("#error1").hide();
								  window.location.reload(); 
								}, 3000);
					},
					error: function(data) {
						$("#spinner").hide();
						window.scrollTo(0, 0);
						$("#error1").show();
						$.each(data.responseJSON.errors, function (key, value) {
							$("#error1").empty();
							$('#error1').append('<strong>'+value+'</strong>');
						});
						
							setTimeout(function(){ 
								window.scrollTo(0, 0); 
								$('#pay').prop("disabled", false);
								$("#error1").empty();
								$("#error1").hide();
							}, 3000);
					}
				});

		});
	 
		 
	 

    //Pay Modal
    $('#payModal').on('shown.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id') 
        var amt = button.data('amt')// Extract info from data-* attributes
		var amttext = button.data('amttext')// Extract info from data-* attributes
		var date = button.data('date')// Extract info from data-* attributes
    
        $("#loanid").val(id);
        $("#amount").html(amt);
		$("#amttext").html(amttext);
		$("#date").html(date);
    });

	 
 
});