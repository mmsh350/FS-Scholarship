$(document).ready(function() {

//Register Agent
//Create New Account Information
$('#register').click(function(evt) {

      $('#register').prop("disabled", true);
       
        $("#error1").empty();
        $("#spinner").show();
        
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


var table2;
 
$('.bd-example-modal-xl').on('shown.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id');

    var approved = button.data('approve');
    var rejected = button.data('reject');
    var counted = button.data('app_count');
   
    $("#appcount").html(counted);
    $("#rejected").html(rejected);
    $("#approved").html(approved);
    
    $.ajax({
        url: 'get-agentProfile',
        type: "GET",
        data:{id},
        dataType: "json",
        success: function(data) {
            $("#appid").val(data.id);

            //populate form
           
            if(data.profile_pic == "" || data.profile_pic == null)
                     $("#passport").attr({ "src": 'images/No-Image.png'});
            else{
                
                $("#passport").attr({ "src": 'data:image/;base64,'+data.profile_pic });
               
            }
            $("#agent_name").html(data.first_name+' '+data.middle_name+' '+data.last_name);
            $("#agender").html(data.gender);
            $("#type").html(toTitleCase(data.role));
           
            $("#aphoneno").html(data.phone_number);
            $("#aemail").html(data.email);
            $("#aaddress").html(data.address);
            $("#regon").html(data.reg_on);
            $("#initiator").html(data.registrar);
            
            if(data.email_verified_at == null || data.email_verified_at=='')
                    $("#cverify").html('<span class="badge badge-warning">Not Verified</span>');
             else
                 $("#cverify").html('<span class="badge badge-success">Verified</span>');

            if(data.is_active == 1)
            {
                $("#astatus").html('<span class="badge badge-success">Active </span>');
            }else{
                $("#astatus").html('<span class="badge badge-danger">In-Active</span>');
            }
    
           if(data.gender == null || data.dateofBirth=='')
           {
             $("#updt").html('<span class="badge badge-danger">Profile Update is Required ! <i class="fa fa-times"></i></span>');
           }
           else{
                $("#updt").html('<span class="badge badge-success">Updated <i class="fa fa-check"></i></span>');
                $("#adob").html(data.dateofBirth);
           }
             
         },
        error: function(data) {
            $(".bd-example-modal-xl").scrollTop(0);
            $("#err").show();
            $("#err").empty();
            $('#err').append('<strong>Error Occured While Fetching Data...</strong>');
            setTimeout(function(){ 
                $('.bd-example-modal-xl').modal('toggle');
                    $("#err").empty();
                    $("#err").hide();
                }, 5000);
        }
    });
    //convert to title Case
    function toTitleCase(str) {
        return str.replace(/(?:^|\s)\w/g, function(match) {
            return match.toUpperCase();
        });
    }

    //get Active Applications
//Ftech Verified list    
 table2= $('#activelist').on('error.dt', function ( e, settings, techNote, message ) {
    //console.log( 'An error has been reported by DataTables: ', message );
}).DataTable({
        processing: true,
        serverSide: true,
        ajax: "staff-applications-verify",
        pagingType: "full_numbers",
        language: { "processing": '<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>' },
        lengthMenu: [
        [5,10, 25, 50, -1],
        [5,10, 25, 50, 'All'],
        ],
        columns: [
        {data: 'id', name: 'id'},
        {data: 'created_at', name: 'created_at'},
        {data: 'names', name: 'names'},
        {data: 'ramount', name: 'ramount'},
        {data: 'phone', name: 'phone'},
        {data: 'app_status', name: 'app_status'},
        {data: 'action', name: 'action'},
        ],

        dom: 'Blfrtip',
        buttons: [
        {
        extend: 'print',
        exportOptions: {
        columns: [ 0, 1, 2, 3,4,5,6 ]
        },
        title: '- Applicant Submission List (Pending) -'
        },
        {
        extend: 'pdfHtml5',
        exportOptions: {
        columns: [ 0, 1, 2, 3,4,5,6 ]
        },
        title: '- Applicant Submission List (Pending) -'
        },

        ],
        "fnRowCallback" : function(nRow, aData, iDisplayIndex){
        $("td:first", nRow).html(iDisplayIndex +1);
        return nRow;
        },

        });
    
});   
$('#activelist').append('<caption style="caption-side: top"><span class="badge badge-dark">Active Applications </span></caption>');

$('.bd-example-modal-xl').on('hidden.bs.modal', function () {
    table2.destroy();
})

});
