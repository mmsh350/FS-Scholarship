$(document).ready(function() {

    $.fn.dataTable.ext.errMode = 'none';
//Ftech Pending list    
var table = $('#users').DataTable({
    processing: true,
    serverSide: true,
    ajax: "users",
    pagingType: "full_numbers",
    language: { "processing": '<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>' },
    lengthMenu: [
        [5,10, 25, 50, -1],
        [5,10, 25, 50, 'All'],
    ],
    order: [[0, 'asc']],
    columns: [
        {data: 'id', name: 'id'},
        {data: 'email', name: 'email'},
        {data: 'fullname', name: 'fullname'},
        {data: 'role', name: 'role'},
        {data: 'is_active', name: 'is_active'},
        {data: 'created_at', name: 'created_at'},
        {data: 'action', name: 'action'},
    ],
    "autoWidth": false,
    
   
    dom: 'Blfrtip',
    buttons: [
    {
        extend: 'print',
        exportOptions: {
            columns: [ 0, 1, 2, 3,4,5]
        },
        title: 'Users'
    },
    {
        extend: 'pdfHtml5',
        exportOptions: {
            columns: [ 0, 1, 2, 3,4,5]
        },
        title: 'Users'
    },
 
],
    "fnRowCallback" : function(nRow, aData, iDisplayIndex){
        $("td:first", nRow).html(iDisplayIndex +1);
       return nRow;
    },
   
});


 
 
 
//  //show Edit Modal
 $('.bd-example-modal-xl').on('shown.bs.modal', function(event) {
    $("#modal-preloader").show();
    var button = $(event.relatedTarget) // Button that triggered the modal
    let id = button.data('id') ;

    $.ajax({
        url: 'get-users',
        type: "GET",
        data:{id},
        dataType: "json",
        success: function(data) {
            $("#modal-preloader").hide();
            $("#userid").val(data.id);

            //populate form
            if(data.profile_pic == "" || data.profile_pic == null)
                 $("#passport").attr({ "src": 'images/No-Image.png'});
            else
                $("#passport").attr({ "src": 'data:image/;base64,'+data.profile_pic });

             $("#first_name").val(data.first_name);
             $("#middle_name").val(data.middle_name);
             $("#last_name").val(data.last_name);
             $("#phone_number").val(data.phone_number);
             $("#email").val(data.email);
             $("#dob").val(data.dob);
             $("#bvn").val(data.bvn);
             $("#oldpath").val(data.id_cards);

            if(data.gender == 'Male')
               $("#gender").val("Male").change();
            else if(data.gender == 'Female')
               $("#gender").val("Female").change();
            else
               $("#gender").val("Choose").change();
           
            $("#address").html(data.address);
            $("#state").val(data.state_id).change();
            $("#status").val( data.is_active );

            if(data.email_verified_at == null || data.email_verified_at==''){
                $("#cverify").html('<span class="badge badge-warning">Not Verified</span>');
                $("#verify").show();
            }
            else{
                $("#cverify").html('<span class="badge badge-success">Verified</span>');
                $("#verify").hide();
               
            }

                $("#regon").html(data.created_at);
                $("#initiator").html(toTitleCase(data.registeredby));
                $("#type").html(toTitleCase(data.role));
                $("#updton").html(data.updated_at);
                
            if(data.role == 'applicant'){
                $("#state").prop('disabled', true);
            }
            else{
                $("#state").prop('disabled', false);
            }
             
            if(data.is_active == 1)
            {
                $("#astatus").html('<span class="badge badge-success">Active </span>');
                $("#activate").html('<i class="fa fa-eye-slash"></i> &nbsp; Disable');
                $("#activate").attr('class', 'btn btn-danger');
               

            }else{
                $("#astatus").html('<span class="badge badge-danger">In-Active</span>');
            }
        },
        error: function(data) {
            $(".bd-example-modal-xl").scrollTop(0);
            $("#error_update").show();
            $("#error_update").empty();
            $('#error_update').append('<strong>Error Occured While Fetching Data...</strong>');
            setTimeout(function(){ 
                $('.bd-example-modal-xl').modal('toggle');
                    $("#error_update").empty();
                    $("#error_update").hide();
                }, 5000);
        }
    });
    //convert to title Case
    function toTitleCase(str) {
        return str.replace(/(?:^|\s)\w/g, function(match) {
            return match.toUpperCase();
        });
    }
    
}); 


//  //show View Modal
$('.view').on('shown.bs.modal', function(event) {
    $("#modal-preloader2").show();
    var button = $(event.relatedTarget) // Button that triggered the modal
    let id = button.data('id') ;

    $.ajax({
        url: 'get-users',
        type: "GET",
        data:{id},
        dataType: "json",
        success: function(data) {
            $("#modal-preloader2").hide();
            
            //populate form
            if(data.profile_pic == "" || data.profile_pic == null)
                 $("#label_passport").attr({ "src": 'images/No-Image.png'});
            else
                $("#label_passport").attr({ "src": 'data:image/;base64,'+data.profile_pic });

             $("#username").html(data.first_name+' '+data.middle_name+' '+data.last_name);
             $("#label_gender").html(data.gender );
             $("#label_phoneno").html(data.phone_number);
             $("#label_email").html(data.email);
             $("#label_dob").html(data.dob);
             $("#label_BVN").html(data.bvn);
            
            if(data.id_cards == "" || data.id_cards == null)
              $("#label_doc").attr({ "alt": 'Identity Card not available.'});
            else  
              $("#label_doc").attr({ "src": 'data:image/;base64,'+data.id_cards});
           
             $("#label_address").html(data.address);
             $("#label_state").html(data.statename);
            

            if(data.email_verified_at == null || data.email_verified_at=='') 
                $("#label_verify").html('<span class="badge badge-warning">Not Verified</span>');
           else 
                $("#label_verify").html('<span class="badge badge-success">Verified</span>');
               
                $("#label_regon").html(data.created_at);
                $("#label_initiator").html(toTitleCase(data.registeredby));
                $("#label_type").html(toTitleCase(data.role));
                $("#label_updton").html(data.updated_at);
                
                if(data.role == 'staff')
                   $("#label_username").html('Staff Names');
                else if(data.role == 'agent')
                   $("#label_username").html('Agent Names');
                else
                   $("#label_username").html('Applicant Names');
             
            if(data.is_active == 1)
            {
                $("#label_astatus").html('<span class="badge badge-success">Active </span>'); 

            }else{
                $("#label_astatus").html('<span class="badge badge-danger">In-Active</span>');
            }
        },
        error: function(data) {
            $(".view").scrollTop(0);
            setTimeout(function(){ 
                $('.view').modal('toggle');
                }, 5000);
        }
    });
    //convert to title Case
    function toTitleCase(str) {
        return str.replace(/(?:^|\s)\w/g, function(match) {
            return match.toUpperCase();
        });
    }
    
}); 

//Verify Email
$('#verify').click(function(evt) {

  $('#verify').prop("disabled", true); 

   var _token = $('#_token').val();   
   var userid = $('#userid').val(); 

   $('#verify').html("Processing ...");
   $.ajax({    //create an ajax request to get session data 
    type: "POST",
    url: "verifyEmail",   //expect json File to be returned  
    data: {userid:userid,_token},		
    success: function(response){  
                    $(".bd-example-modal-xl").scrollTop(0);
                    $("#done_update").show();
                    $('#done_update').append('<strong>Email Verification Completed.</strong>');

                    setTimeout(function(){  
                       window.location.reload(); 
                    }, 3000);
        },
        error: function(data) {
            $(".bd-example-modal-xl").scrollTop(0);
            $("#error_update").show();
            $.each(data.responseJSON.errors, function (key, value) {
                $("#error_update").empty();
                $('#error_update').append('<strong>Error Occured While Verifying Email Id! </strong>');
            });
            
            setTimeout(function(){ 
                    $('#verify').prop("disabled", false);
                    $("#error_update").empty();
                    $("#error_update").hide();
                }, 3000);
        }
    });
 });

 //Verify Email
$('#activate').click(function(evt) {

    $('#activate').prop("disabled", true); 
  
     var _token = $('#_token').val();   
     var userid = $('#userid').val(); 
     var status = $('#status').val(); 
  
     $('#activate').html("Processing ...");
     $.ajax({    //create an ajax request to get session data 
      type: "POST",
      url: "activateUser",   //expect json File to be returned  
      data: {userid:userid,_token,status},		
      success: function(response){  
                      $(".bd-example-modal-xl").scrollTop(0);
                      $("#done_update").show();
                      $('#done_update').append('<strong>Action Completed.</strong>');
  
                      setTimeout(function(){  
                         window.location.reload(); 
                      }, 3000);
          },
          error: function(data) {
              $(".bd-example-modal-xl").scrollTop(0);
              $("#error_update").show();
              $.each(data.responseJSON.errors, function (key, value) {
                  $("#error_update").empty();
                  $('#error_update').append('<strong>Error Occured While Activating Account </strong>');
              });
             
                  setTimeout(function(){ 
                      $('#activate').prop("disabled", false);
                      $("#error_update").empty();
                      $("#error_update").hide();
                  }, 3000);
          }
      });
   });

   $('#btnSave').click(function(evt) {
    $("#spinner").show();
   // $('#btnSave').prop("disabled", true);
        
    // Stop the button from submitting the form:
        evt.preventDefault();

        // Serialize the entire form:
        var data = new FormData(this.form);
        $.ajax({
            url: 'updateUser',
            type: "POST",
            data,
            processData: false,
            contentType: false,
            cache: false,
            success: function(dataResult) {
                $(".bd-example-modal-xl").scrollTop(0);
                        $("#done_update").show();
                        $('#done_update').append('<i class="fa fa-info-circle" aria-hidden="true"></i>'+'<strong>Profile Update Successful !</strong>');
                        $('#btnSave').html("Redirecting ...");
                        setTimeout(function(){  
                            $("#error_update").hide();
                            //$('form').trigger("reset");
                            window.location.reload(); 
                            $("#spinner").hide();
                        }, 2000);
            },
            error: function(data) {
                $(".bd-example-modal-xl").scrollTop(0);
                $("#error_update").show();
                $.each(data.responseJSON.errors, function (key, value) {
                    $("#error_update").empty();
                    $('#error_update').append('<i class="fa fa-info-circle" aria-hidden="true"></i>'+'<strong>'+value+'</strong>');
                });
                
                    setTimeout(function(){ 
                        $(".bd-example-modal-xl").scrollTop(0);
                        $('#btnSave').prop("disabled", false);
                        $("#error_update").empty();
                        $("#error_update").hide();
                        $("#spinner").hide();
                    }, 5000);
            }
        });

});


$($("input[name=account_type]")).change(function(){

    var radioValue = $("input[name='account_type']:checked").val();
    
    if(radioValue == 'Staff'){
    
       $('#idcards').hide();
       $('#location').show();
       $('#bbvn').hide();
    }
    else if(radioValue == 'Agent'){
      $('#idcards').show();
      $('#location').show();
      $('#bbvn').show();
    }
    else{
        $('#idcards').hide();
        $('#location').hide();
        $('#bbvn').hide();
    }

});

//Create New Account Information
$('#register').click(function(evt) {

      $('#register').prop("disabled", true);
       
        $("#error1").empty();
        $("#spinner2").show();
        var first_name = $('#firstname').val();
        var last_name = $('#lastname').val();
        var email = $('#email_id').val();
        var phoneno = $('#phoneno').val();
        
        
        if (first_name !== "" && last_name !== "" && email !== "" && phoneno !== "") {
        // Stop the button from submitting the form:
            evt.preventDefault();

            // Serialize the entire form:
            var data = new FormData(this.form);
            $.ajax({
                url: "createUser",
                type: "POST",
                data,
                processData: false,
                contentType: false,
                cache: false,       
                success: function(data) {
                    //$('#register').prop("disabled", false);
                            $("#success1").show().empty();
                            $('#success1').append('<strong> Account Created Succesfully!</strong>');
                            window.scrollTo(0, 0);
                            setTimeout(function(){ 
                               $('#form').trigger("reset");

                                $('#idcards').hide();
                                $('#location').hide();
                                $('#bbvn').hide();
                                window.location.reload(); 
                            }, 2000);
                },
                error: function(data) {
                    window.scrollTo(0, 0);
                    $.each(data.responseJSON.errors, function (key, value) {
                        $("#error1").show().empty();
                        $('#error1').append('<strong>'+value+'</strong>');
                    });
                    
                        setTimeout(function(){  
                            $('#register').prop("disabled", false);
                            $("#error1").empty().fadeOut();
                            $("#spinner2").hide();  
                        }, 2000);
                }
            });
    } else 
    {

                        $("#error1").show().empty();
                        $('#error1').append('<strong>All fields are required!</strong>');
                        window.scrollTo(0, 0);
                        setTimeout(function(){  	
                            $('#register').prop("disabled", false);
                            $("#error1").fadeOut();
                            $("#spinner2").hide();  
                        }, 2000); 

    }    

});

 
});
