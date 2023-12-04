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

	$($("input[name=flexRadioDefault]")).change(function(){

     
		var radioValue = $("input[name='flexRadioDefault']:checked").val();
		if(radioValue == 'Yes'){
		
		   $('#intPhone').show();
		   $('#intaddr').show();
		}
		else{
		  $('#intPhone').hide();
		  $('#intaddr').hide();
		}

  });

  //Tabs
  $('#next1').click(function(evt) {
   
	$('#next-kin').addClass('show active'); 
	$('#next-kin-tab').addClass('active'); 
	 
	$('#wizard-contact').removeClass('show active');
	$('#wizard-contact-tab').removeClass('active');
  });

   $('#pre1').click(function(evt) {
   
   $('#next-kin').removeClass('show active'); 
   $('#next-kin-tab').removeClass('active'); 
	
   $('#wizard-contact').addClass('show active');
   $('#wizard-contact-tab').addClass('active');
 });

   //Tabs
   $('#next2').click(function(evt) {
   //Next 
	$('#education').addClass('show active'); 
	$('#education-tab').addClass('active'); 
	
	$('#next-kin').removeClass('show active'); 
	$('#next-kin-tab').removeClass('active'); 
   });

   $('#pre2').click(function(evt) {
   //Next 
   $('#education').removeClass('show active'); 
	$('#education-tab').removeClass('active'); 
	
	$('#next-kin').addClass('show active'); 
	$('#next-kin-tab').addClass('active'); 
 });


 $('#next3').click(function(evt) {
   //Next 
   $('#gurantor').addClass('show active'); 
   $('#gurantor-tab').addClass('active'); 
	
   $('#education').removeClass('show active'); 
	$('#education-tab').removeClass('active'); 
 });

 $('#pre3').click(function(evt) {
   
   $('#gurantor').removeClass('show active'); 
   $('#gurantor-tab').removeClass('active'); 
	
   $('#education').addClass('show active'); 
	$('#education-tab').addClass('active'); 
 });

 $('#next4').click(function(evt) {
   //Next 
   $('#school').addClass('show active'); 
   $('#school-tab').addClass('active'); 
	
   $('#gurantor').removeClass('show active'); 
	$('#gurantor-tab').removeClass('active'); 
 });

 $('#pre4').click(function(evt) {
   //Next 
   $('#school').removeClass('show active'); 
   $('#school-tab').removeClass('active'); 
	
   $('#gurantor').addClass('show active'); 
	$('#gurantor-tab').addClass('active'); 
 });


 $('#next5').click(function(evt) {
   //Next 
   $('#school').removeClass('show active'); 
   $('#school-tab').removeClass('active'); 
	
   $('#media').addClass('show active'); 
	$('#media-tab').addClass('active'); 
 });

 $('#pre5').click(function(evt) {
   //Next 
   $('#school').addClass('show active'); 
   $('#school-tab').addClass('active'); 
	
   $('#media').removeClass('show active'); 
	$('#media-tab').removeClass('active'); 
 });

 //Auto Set gender

 $("#title").change(function(){
	 let title_text =  $('#title :selected').val();
	if(title_text == "Mr")
		   $("select#nok_gender ").val("Male").change();
	 else if(title_text == "")
		   $("select#nok_gender").val("").change();
	else
		  $("select#nok_gender").val("Female").change();
  });                  


  image.onchange = evt => {
  const [file] = image.files
  if (file) {
		preview.src = URL.createObjectURL(file)
  }
  }

	 
});