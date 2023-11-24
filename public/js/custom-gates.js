$(document).ready(function() {
    
    //Default
    $('#ptm11').prop( "checked", false );
    $('#ptm44').prop( "checked", false );

    
    $($("input[name=radio1]")).change(function(){
   
    if($('#ptm11').is(':checked'))
     { $('#topup').html('<i class="icofont icofont-pay">&nbsp;</i> Pay With Paystack'); }else{
           $('#topup').html('<i class="icofont icofont-pay">&nbsp;</i> Pay With Monnify');}
    });


     $('#topup').on('click', function() {
      let pmt1 = $('#ptm11').val();
      let pmt2 = $('#ptm44').val();
      let pmethod ='';
      let amt = document.getElementById("amount").value    
 
     //get selected option
        if($('#ptm11').is(':checked')) {
            pmethod = pmt1;
        }else if ( $('#ptm44').is(':checked') )
           pmethod = pmt2;
      else{
           
            $('#error').show();  $('#error').html('Please select a payment method first');
            setTimeout(function(){ 
							$("#error").empty();
							$("#error").hide();
						}, 2000);
            return;
        }
    
    if(amt <=0 || amt < 200){

      $('#error').show();  $('#error').html('Amount cannot be Zero or Less than 200 Naira');
            setTimeout(function(){ 
							$("#error").empty();
							$("#error").hide();
						}, 2000);
     
         return;
    }

    if(pmethod == pmt1)
    {
       
   
   document.getElementById("paymentForm");
  let handler = PaystackPop.setup({
    key: 'pk_test_93b89dcf975d40c3fe1bc2508edb0839b35353d2', // Replace with your public key
    email: document.getElementById("email").value,
    amount: document.getElementById("amount").value * 100,
    currency: "NGN",
    metadata: {
          custom_fields: [
              {
                  display_name: "Mobile Number",
                  variable_name: "mobile_number",
                  value: document.getElementById("phone_number").value
              },
			{
                display_name: "First Name",
                variable_name: "first_name",
                value: document.getElementById("first-name").value
            },
			{
                display_name: "Last Name",
                variable_name: "last_name",
                value: document.getElementById("last-name").value
            }
         ]
      },
    onClose: function(){
     
	    Swal.fire({
			  title:'Payment Cancelled',
			  text:'Wallet Top up request was cancelled.',
			  icon:'error',
			  confirmButtonColor: "#aaa",
			  confirmButtonText: "Close", 
			  allowOutsideClick: false		
		}) .then(function() {
			      //Redirect the user
		       window.location.reload();
		   })
		    setTimeout(function(){  
                  window.location.reload();   
            			}, 5000);
	    
    },
    callback: function(response){

	  if(response.success ='success'){

         document.getElementById("response").value= response.success;
         document.getElementById("reference").value= response.reference;
         desc = document.getElementById("desc").value;

      var _token = $('#_token').val();
		  $.ajax({    //create an ajax request to get session data 
				type: "POST",
				url: "verifyPayments",
				data: {ref:response.reference,pmethod, _token,desc},
				dataType: "json",   //expect json File to be returned                
				success: function(dataResult){ 
             
          if(dataResult.code == 200){
                  Swal.fire({
                  title:'Payment Confirmation',
                  text:'Funds received check your Wallet to confirm the funds ',
                  icon:'success',
                  confirmButtonColor: "#2e73b4",
                  confirmButtonText: "Continue", 
                  allowOutsideClick: false			  
                }
                ).then(function() {
                      //Redirect the user
                      window.location.reload();
                    });
          }
          else if(dataResult.code == 201){
            Swal.fire({
                  title: 'Error',
                  text:dataResult.err + ', Contact the administrator if you are debitted',
                  icon:'error',
                  confirmButtonColor: "#2e73b4",
                  allowOutsideClick: false		
                });
                setTimeout(function(){  
                  window.location.reload();   
            			}, 10000);
            
          }
           
              
				 }, 
         error: function(data) {
          Swal.fire({
                  title: 'Something Weird Happened',
                  text:'Sorry Error Occured while making Transaction.Try again...',
                  icon:'error',
                  confirmButtonColor: "#2e73b4",
                  allowOutsideClick: false		
                });
                setTimeout(function(){  
                   window.location.reload();   
            			}, 10000);

         }
				 });
		 
			
			  
	}else
	  {
		   Swal.fire({
			  title: 'Something Weird Happened',
			  text:'Sorry Error Occured while making Transaction.Try again...',
			  icon:'error',
			  confirmButtonColor: "#2e73b4",
			  allowOutsideClick: false		
		   })
       setTimeout(function(){  
                  window.location.reload();   
            			}, 10000);
	  }
}
  }); 
 handler.openIframe();
    }
else {
        

         let fn = document.getElementById("first-name").value;
         let ln = document.getElementById("last-name").value;
         let fullname = fn + ' ' + ln;

         let email = document.getElementById("email").value;
         let amt = document.getElementById("amount").value;

         let desc = document.getElementById("desc").value;
         var _token = $('#_token').val();

         MonnifySDK.initialize({
                amount: amt,
                currency: "NGN",
                reference: new String((new Date()).getTime()),
                customerFullName: fullname,
                customerEmail: email,
                apiKey: "MK_TEST_EW6F18MGYA",
                contractCode: "0931033534",
                paymentDescription: desc,
                
                onLoadStart: () => {
                    //alert("loading has started");
                },
                onLoadComplete: () => {
                    //console.log("SDK is UP");
                },
                onComplete: function(response) {
                    //Implement what happens when the transaction is completed.
                if(response.status == 'SUCCESS'){
                      
                   
                    $.ajax({    //create an ajax request to get session data 
                      type: "POST",
                      url: "verifyPayments",
                      data: {ref:response.transactionReference,
                             pmethod,_token,desc,amt:response.authorizedAmount},
                      dataType: "json",   //expect json File to be returned                
                      success: function(dataResult){ 
                          
                        if(dataResult.code == 200){
                                Swal.fire({
                                title:'Payment Confirmation',
                                text:'Funds received check your Wallet to confirm the funds ',
                                icon:'success',
                                confirmButtonColor: "#2e73b4",
                                confirmButtonText: "Continue", 
                                allowOutsideClick: false			  
                              }
                              ).then(function() {
                                    //Redirect the user
                                    window.location.reload();
                                  });
                        }
                        else if(dataResult.code == 201){
                          Swal.fire({
                                title: 'Error',
                                text:dataResult.err + ', Contact the administrator if you are debitted',
                                icon:'error',
                                confirmButtonColor: "#2e73b4",
                                allowOutsideClick: false		
                              });
                              setTimeout(function(){  
                                window.location.reload();   
                                }, 10000);
                          
                        }
                            
                      }, 
                      error: function(data) {
                        Swal.fire({
                                title: 'Something Weird Happened',
                                text:'Sorry Error Occured while making Transaction.Try again...',
                                icon:'error',
                                confirmButtonColor: "#2e73b4",
                                allowOutsideClick: false		
                              });
                              setTimeout(function(){  
                              // window.location.reload();   
                                }, 10000);

                      }
                      });

                    }
                    


                },
                onClose: function(response) {
                    //Implement what should happen when the modal is closed here
                    
                    if(response.paymentStatus == 'USER_CANCELLED'){
                        Swal.fire({
                                    title:'Payment Cancelled',
                                    text:'Wallet Top up request was cancelled.',
                                    icon:'error',
                                    confirmButtonColor: "#aaa",
                                    confirmButtonText: "Close", 
                                    allowOutsideClick: false		
                              }) .then(function() {
                                        //Redirect the user
                                     window.location.reload();
                                 })
                                  setTimeout(function(){  
                                        window.location.reload();   
                                              }, 5000);
                    }                
                    
                }
            });
}
//payment 2

 
     });
 });

 function isNumberKey(evt)
      {
        var e = evt || window.event; //window.event is safer, thanks @ThiefMaster
        var charCode = e.which || e.keyCode;                        
        if (charCode > 31 && (charCode < 47 || charCode > 57))
        return false;
        if (e.shiftKey) return false;
        return true;
     }