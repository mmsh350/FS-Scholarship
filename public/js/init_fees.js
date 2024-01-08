$(document).ready(function() {

	$('#pay').click(function(evt) {
		
		swal({
			title: "Accept Offer?",
			text: "Are you sure you want to accept this offer !",
			type: "warning",
			showCancelButton: true,
			confirmButtonClass: "btn-success",
			confirmButtonText: "Yes, Accept Offer!",
			closeOnConfirm: false,
		  },
		  function(){
			$('#pay').prop("disabled", true);     
			var bank_name =  $('#bankname').val();   
			var account_number = $('#acctno').val();   
			var account_name = $('#acctname').val();   
			
			   var _token = $('#_token').val();   
			   let  appid =  $('#app_id').val();
			   $.ajax({    //create an ajax request to get session data 
				type: "POST",
				url: "make-payment",   //expect json File to be returned  
				data: {appid:appid,_token,bank_name,account_number,account_name},		
				success: function(response){  
	
								window.scrollTo(0, 0);
								$("#success1").show();
								$('#success1').append('<strong>Offer Accepted Sucessfully !</strong>');
								$('#pay').html("Redirecting ...");
								setTimeout(function(){  
									$("#error1").hide();
								  window.location.reload(); 
								}, 3000);
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
								$('#pay').prop("disabled", false);
								$("#error1").empty();
								$("#error1").hide();
							}, 3000);
					}
				});
				   
					swal.close();	

		  });
		  $(".sweet-alert").css('background-color', '#e6e6e6');//Optional changes the color of the sweetalert 
		});
	 
			//Reject offer

			$('#reject_offer').click(function(evt) {
					
				swal({
					title: "Reject Offer ?",
					text: "Are you sure you want to reject this offer !",
					type: "warning",
					showCancelButton: true,
					confirmButtonClass: "btn-danger",
					confirmButtonText: "Yes, Reject Offer!",
					closeOnConfirm: false
					
				  },
				  function(){
					var _token = $('#_token').val();   
					let  appid =  $('#app_id').val();
					$.ajax({    //create an ajax request to get session data 
					 type: "POST",
					 url: "reject-offer",   //expect json File to be returned  
					 data: {appid:appid,_token},		
					 success: function(response){  
		 
									 window.scrollTo(0, 0);
									 $("#success1").show();
									 $('#success1').append('<strong>Offer Rejection Successful !</strong>');
									 $('#reject_offer').html("Redirecting ...");
									 setTimeout(function(){  
										 $("#error1").hide();
										
									   window.location.reload(); 
									 }, 3000);
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
									 $('#reject_offer').prop("disabled", false);
									 $("#error1").empty();
									 $("#error1").hide();
								 }, 3000);
						 }
					 });
					 swal.close();
				  });
					 
				  $(".sweet-alert").css('background-color', '#e6e6e6');//Optional changes the color of the sweetalert 
				});

	 

    //Pay Modal
    $('#payModal').on('shown.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id') 
        var amt = button.data('amount')// Extract info from data-* attributes
		var cat = button.data('cat')// Extract info from data-* attributes
		var approve = button.data('approve')// Extract info from data-* attributes
    
        $("#app_id").val(id);
        $("#amount").html(amt);

		$("#onep").html(amt);

		$("#cat").html(cat);
		$("#cat2").html(cat);
		$("#appv").html(approve);
    });

	//Pay Modal
    $('#rejectModal').on('shown.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
       
        var comment = button.data('comments')// Extract info from data-* attributes

        $("#message").html(comment);
    });

 
});