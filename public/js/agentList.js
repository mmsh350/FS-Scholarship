$(document).ready(function() {

//Register Agent
//Create New Account Information
$('#register').click(function(evt) {

      $('#register').prop("disabled", true);
       
        $("#error1").empty();
        $("#spinner").show();
        var first_name = $('#firstname').val();
        var last_name = $('#lastname').val();
        var email = $('#email').val();
        var phoneno = $('#phoneno').val();
        
        
        if (first_name !== "" && last_name !== "" && email !== "" && phoneno !== "") {
        // Stop the button from submitting the form:
            evt.preventDefault();

            // Serialize the entire form:
            var data = new FormData(this.form);
            $.ajax({
                url: "add-agent",
                type: "POST",
                data,
                processData: false,
                contentType: false,
                cache: false,       
                success: function(data) {

                            $("#success1").show().empty();
                            $('#success1').append('<strong>Agent Account Created Succesfully!</strong>');
                            window.scrollTo(0, 0);
                            setTimeout(function(){ 
                                $('#form').trigger("reset");
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
                            $("#spinner").hide();  
                        }, 2000);
                }
            });
    } else 	{

                        $("#error1").show().empty();
                        $('#error1').append('<strong>All fields are required!</strong>');
                        setTimeout(function(){  	
                            $('#register').prop("disabled", false);
                            $("#error1").fadeOut();
                            $("#spinner").hide();  
                        }, 2000); 

            }
     
    

});



//Ftech agent list    
var table = $('#agentlist').DataTable({
    processing: true,
    serverSide: true,
    ajax: "agents",
    pagingType: "full_numbers",
    language: { "processing": '<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>' },
    lengthMenu: [
        [5,10, 25, 50, -1],
        [5,10, 25, 50, 'All'],
    ],
    
    columns: [
        {data: 'id', name: 'id'},
        {data: 'full_name', name: 'full_name'},
        {data: 'phone_number', name: 'phone_number'},
        {data: 'appcount', name: 'appcount'},
        {data: 'approveCount', name: 'approveCount'},
        {data: 'rejectCount', name: 'rejCount'},
        {data: 'status', name: 'status'},
        {data: 'action', name: 'action'},
    ],
    
    dom: 'Blfrtip',
    buttons: [
    {
        extend: 'print',
        exportOptions: {
            columns: [ 0, 1, 2, 3,4,5,6 ]
        },
        title: '- Agent Activity List -'
    },
    {
        extend: 'pdfHtml5',
        exportOptions: {
            columns: [ 0, 1, 2, 3,4,5,6 ]
        },
        title: '- Agent Activity List -'
    },
 
],
    "fnRowCallback" : function(nRow, aData, iDisplayIndex){
        $("td:first", nRow).html(iDisplayIndex +1);
       return nRow;
    },
 
});

 //Pay Modal
 $('.bd-example-modal-xl').on('shown.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id') 
    
  alert(id);
    $("#app_id").val(id);
    $("#amount").html(amt);
    
});   
});
