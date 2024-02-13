$(document).ready(function() {
    
//Ftech School list    
var table = $('#schools').DataTable({
    processing: true,
    serverSide: true,
    ajax: "admin-schools",
    pagingType: "full_numbers",
    language: { "processing": '<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>' },
    lengthMenu: [
        [10, 25, 50, -1],
        [10, 25, 50, 'All'],
    ],
    order: [[0, 'asc']],
    columns: [
        {data: 'id', name: 'schools.id'},
        {data: 'schl_category', name: 'schools.schl_category'},
        {data: 'schl_name', name: 'schools.schl_name'},
        {data: 'stateName', name: 'states.stateName'},
        {data: 'is_active', name: 'schools.is_active'},
        {data: 'created_at', name: 'schools.created_at'},
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
        title: 'School List'
    },
    {
        extend: 'pdfHtml5',
        exportOptions: {
            columns: [ 0, 1, 2, 3,4,5]
        },
        title: 'School List'
    },
 
],
    "fnRowCallback" : function(nRow, aData, iDisplayIndex){
        $("td:first", nRow).html(iDisplayIndex +1);
       return nRow;
    },
   
});

//Ftech School list    
var table001 = $('#staff-schools').DataTable({
    processing: true,
    serverSide: true,
    ajax: "admin-schools",
    pagingType: "full_numbers",
    language: { "processing": '<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>' },
    lengthMenu: [
        [10, 25, 50, -1],
        [10, 25, 50, 'All'],
    ],
    order: [[0, 'asc']],
    columns: [
        {data: 'id', name: 'schools.id'},
        {data: 'schl_category', name: 'schools.schl_category'},
        {data: 'schl_name', name: 'schools.schl_name'},
        {data: 'stateName', name: 'states.stateName'},
        {data: 'is_active', name: 'schools.is_active'},
    ],
    "autoWidth": false,

    dom: 'Blfrtip',
    buttons: [
    {
        extend: 'print',
        exportOptions: {
            columns: [ 0, 1, 2, 3,4]
        },
        title: 'School List'
    },
    {
        extend: 'pdfHtml5',
        exportOptions: {
            columns: [ 0, 1, 2, 3,4]
        },
        title: 'School List'
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
        url: 'get-schools',
        type: "GET",
        data:{id},
        dataType: "json",
        success: function(data) {
            $("#modal-preloader").hide();
            $("#school_id").val(data.id);
            //populate form
            
            $("#schl_category_edit").val(data.schl_category).change();
            $("#school_name_edit").val(data.schl_name);
            $("#state2").val(data.state_id).change();
            $("#status").val( data.is_active );

            if(data.is_active == 1)
            {
                $("#astatus").html('<span class="badge badge-success">Active </span>');
                $("#activate").html('<i class="fa fa-eye"></i> &nbsp; Disable');
                $("#activate").attr('class', 'btn btn-danger');
               

            }else{
                $("#astatus").html('<span class="badge badge-danger">Not-Active</span>');
                $("#activate").html('<i class="fa fa-eye-slash"></i> &nbsp; Enable');
                $("#activate").attr('class', 'btn btn-success');
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
     
    
}); 


 //Activate School
$('#activate').click(function(evt) {

    $('#activate').prop("disabled", true); 
  
     var _token = $('#_token').val();   
     var userid = $('#school_id').val(); 
     var status = $('#status').val(); 
  
     $('#activate').html("Processing ...");
     $.ajax({    //create an ajax request to get session data 
      type: "POST",
      url: "activateSchool",   //expect json File to be returned  
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
                  $('#error_update').append('<strong>Error Occured While Activating School </strong>');
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
      $('#btnSave').prop("disabled", true);
        
    // Stop the button from submitting the form:
        evt.preventDefault();

        // Serialize the entire form:
        var data = new FormData(this.form);
        $.ajax({
            url: 'updateSchool',
            type: "POST",
            data,
            processData: false,
            contentType: false,
            cache: false,
            success: function(dataResult) {
                $('#btnSave').prop("disabled", false);
                $(".bd-example-modal-xl").scrollTop(0);
                        $("#done_update").show();
                        $('#done_update').append('<i class="fa fa-info-circle" aria-hidden="true"></i>'+'<strong>School Update Successful !</strong>');
                        $('#btnSave').html("Redirecting ...");
                        setTimeout(function(){  
                            $("#error_update").hide();
                             
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

//Create New Account Information
$('#register').click(function(evt) {

      $('#register').prop("disabled", true);
       
        $("#error1").empty();
        $("#spinner2").show();
        // Stop the button from submitting the form:
            evt.preventDefault();

            // Serialize the entire form:
            var data = new FormData(this.form);
            $.ajax({
                url: "createSchool",
                type: "POST",
                data,
                processData: false,
                contentType: false,
                cache: false,       
                success: function(data) {
                    //$('#register').prop("disabled", false);
                            $("#success1").show().empty();
                            $('#success1').append('<strong> School Created Succesfully!</strong>');
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
        
});
		 

      

});
 
