$(document).ready(function() {

$.fn.dataTable.ext.errMode = 'none';
//Ftech Pending list    
var table = $('#pendinglist').DataTable({
    processing: true,
    serverSide: true,
    ajax: "agent-pending",
    pagingType: "full_numbers",
    language: { "processing": '<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>' },
    lengthMenu: [
        [10, 25, 50, -1],
        [10, 25, 50, 'All'],
    ],
    
    columns: [
        {data: 'id', name: 'applications.id'},
        {data: 'created_at', name: 'applications.created_at'},
        {data: 'names', name: 'applications.names'},
        {data: 'approved_amount', name: 'applications.approved_amount'},
        {data: 'balance', name: 'balance'},
        {data: 'action', name: 'action'},
    ],
    "columnDefs": [
        { "searchable": false, "targets": 4 }
      ],
    dom: 'Blfrtip',
    buttons: [
    {
        extend: 'print',
        exportOptions: {
            columns: [ 0, 1, 2, 3,4]
        },
        title: 'Outstanding Loans'
    },
    {
        extend: 'pdfHtml5',
        exportOptions: {
            columns: [ 0, 1, 2, 3,4]
        },
        title: 'Outstanding Loans'
    },
 
],
    "fnRowCallback" : function(nRow, aData, iDisplayIndex){
        $("td:first", nRow).html(iDisplayIndex +1);
       return nRow;
    },
   
});

  
    $('#completed-tab').click(function(evt) {
   
        //Ftech Disburse list    
        var table001 = $('#completedlist').on( 'error.dt', function ( e, settings, techNote, message ) {
                        // console.log( 'An error has been reported by DataTables: ', message );
        }).DataTable({
            processing: true,
            serverSide: true,
            ajax: "agent-loan-completed",
            pagingType: "full_numbers",
            destroy: true,
            language: { "processing": '<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>' },
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'All'],
            ],
            
            columns: [
                {data: 'id', name: 'applications.id'},
                {data: 'created_at', name: 'applications.created_at'},
                {data: 'names', name: 'applications.names'},
                {data: 'approved_amount', name: 'applications.approved_amount'},
                {data: 'status', name: 'status'},
            ],
            
            dom: 'Blfrtip',
            buttons: [
            {
                extend: 'print',
                exportOptions: {
                    columns: [ 0, 1, 2, 3,4 ]
                },
                title: 'Repaid Applications'
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2, 3,4]
                },
                title: 'Repaid Application)'
            },
         
        ],
            "fnRowCallback" : function(nRow, aData, iDisplayIndex){
                $("td:first", nRow).html(iDisplayIndex +1);
               return nRow;
            },
         
        });
        
        });

 
 
        

let table3="";
//Plan Modal
$('.repayModal').on('shown.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    let appid = button.data('id') ;
    var _token = $('#_token').val();
   
   //Ftech repay list    
           var table3 = $('#repaylist').on( 'error.dt', function ( e, settings, techNote, message ) {
             //   console.log( 'An error has been reported by DataTables: ', message );
                
           }).DataTable({
                ajax: {
                    url: 'repay-data',
                    type: 'POST',
                    data:{appid,_token},
                },
            processing: true,
            serverSide: true,
            pagingType: "full_numbers",
            destroy: true,
            language: { "processing": '<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>' },
            lengthMenu: [
            [6,12 -1],
            [6,12,'All'],
            ],

            columns: [
            {data: 'id', name: 'id'},            
            {data: 'repayment_amount', name: 'repayment_amount'},
            {data: 'repayment_date', name: 'repayment_date'},
            {data: 'status', name: 'status'},
            {data: 'metadata', name: 'metadata'},
            {data: 'action', name: 'action'},       
            ],
   
            dom: 'Blfrtip',
            buttons: [
            {
            extend: 'print',
            exportOptions: {
            columns: [ 1, 2, 3,4 ]
            },
            title: 'Applicant Repayment List'
            },
            {
            extend: 'pdfHtml5',
            exportOptions: {
            columns: [ 1, 2, 3,4,]
            },
            title: 'Applicant Repayment List'
            },

            ],
            "fnRowCallback" : function(nRow, aData, iDisplayIndex){
            $("td:first", nRow).html(iDisplayIndex +1);
            return nRow;
            },
            
            })
            

            $('.repayModal tbody').off('click').on('click', '.remind', function () {
                var row = $(this).closest('tr');
                var id = table3.row( row ).data().id;
                var _token = $('#_token').val();   
                $("#modal-preloader2").show();
                
              

                $.ajax({    //create an ajax request to get session data 
                    type: "POST",
                    url: "send-reminder",   //expect json File to be returned  
                    data: {id:id,_token},		
                    success: function(response){  
                        $("#modal-preloader2").hide();
                                    $(".disburseModal").scrollTop(0);
                                    $("#done_3").show();
                                    $('#done_3').append('<strong>Reminder Sent.</strong>');
                                    setTimeout(function(){ 
                                        $("#done_3").empty();
                                        $("#done_3").hide();
                                    }, 3000);
                                   
                                       
                        },
                        error: function(data) {
                            $(".disburseModal").scrollTop(0);
                            $("#err3").show();
                            $.each(data.responseJSON.errors, function (key, value) {
                                $("#err3").empty();
                                $('#err3').append('<strong>'+value+'</strong>');
                            });
                                setTimeout(function(){ 
                                    $("#err3").empty();
                                    $("#err3").hide();
                                }, 3000);
                        }
                    });

                });

                    //Make payment

                    $('.repayModal tbody').on('click', '.paynow', function () {
                        var row = $(this).closest('tr');
                        var id = table3.row( row ).data().id;
                        var _token = $('#_token').val();   
                       

                        swal({
                            title: "Make Repayment?",
                            text: "Are you sure you want to Proceed !",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonClass: "btn-success",
                            confirmButtonText: "Yes",
                            closeOnConfirm: false,
                          },
                          function(){
                            $("#modal-preloader3").show();
                        $.ajax({    //create an ajax request to get session data 
                            type: "POST",
                            url: "make-repayment",   //expect json File to be returned  
                            data: {loanid:id,_token},		
                            success: function(response){  
                                $("#modal-preloader3").hide();
                                            $(".disburseModal").scrollTop(0);
                                            $("#done_3").show();
                                            $('#done_3').append('<strong>Repayment Successful.</strong>');
                                            $('.paynow').hide();
                                            setTimeout(function(){ 
                                                $("#done_3").empty();
                                                $("#done_3").hide();
                                            }, 3000);
                                },
                                error: function(data) {
                                    $(".disburseModal").scrollTop(0);
                                    $("#err3").show();
                                    $.each(data.responseJSON.errors, function (key, value) {
                                        $("#err3").empty();
                                        $('#err3').append('<strong>'+value+'</strong>');
                                    });
                                    $("#modal-preloader3").hide();
                                        setTimeout(function(){ 
                                            $("#err3").empty();
                                            $("#err3").hide();
                                        }, 3000);
                                }
                            });
                            swal.close();	

                        });
                        $(".sweet-alert").css('background-color', '#e6e6e6');//Optional changes the color of the sweetalert 

              });
            

});
});
