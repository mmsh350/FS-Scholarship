$(document).ready(function() {

//Calculate monthly repayment

 $("#app_amount" ).on( "focusout", function() {
    let appamt = $('#app_amount').val() ;
    let repay = appamt / 12;
    $('#mrepay').val(Math.floor(repay));    
});

$.fn.dataTable.ext.errMode = 'none';
//Ftech Pending list    
var table = $('#pendinglist').DataTable({
    processing: true,
    serverSide: true,
    ajax: "admin-applications",
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
        {data: 'app_verify', name: 'app_verify'},
        {data: 'action', name: 'action'},
    ],
    
    dom: 'Blfrtip',
    buttons: [
    {
        extend: 'print',
        exportOptions: {
            columns: [ 0, 1, 2, 3,4,5]
        },
        title: 'Applicant List (Pending Approval)'
    },
    {
        extend: 'pdfHtml5',
        exportOptions: {
            columns: [ 0, 1, 2, 3,4,5]
        },
        title: 'Applicant List (Pending Approval)'
    },
 
],
    "fnRowCallback" : function(nRow, aData, iDisplayIndex){
        $("td:first", nRow).html(iDisplayIndex +1);
       return nRow;
    },
   
});


$('#verified-tab').click(function(evt) {
   
//Ftech Verified list    
var table2 = $('#verifiedlist').on( 'error.dt', function ( e, settings, techNote, message ) {
                // console.log( 'An error has been reported by DataTables: ', message );
}).DataTable({
    processing: true,
    serverSide: true,
    ajax: "admin-applications-verify",
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
        {data: 'status', name: 'status'},
        {data: 'app_status', name: 'app_status'},
        {data: 'action', name: 'action'},       
    ],
    
    dom: 'Blfrtip',
    buttons: [
    {
        extend: 'print',
        exportOptions: {
            columns: [ 0, 1, 2, 3,4,5 ]
        },
        title: 'Applicant List (Approved Application)'
    },
    {
        extend: 'pdfHtml5',
        exportOptions: {
            columns: [ 0, 1, 2, 3,4,5,]
        },
        title: 'Applicant List (Approved Application)'
    },
 
],
    "fnRowCallback" : function(nRow, aData, iDisplayIndex){
        $("td:first", nRow).html(iDisplayIndex +1);
       return nRow;
    },
 
});

});

$("#repay").on( "click", function() {
    $('.repayModal').modal('show');  
});

$('.repayModal').on('hidden.bs.modal', function () {
    $('.bd-example-modal-xl').css('z-index', '');
});

var table3="";
//Plan Modal
$('.repayModal').on('shown.bs.modal', function(event) {
    $('.bd-example-modal-xl').css('z-index', 1039);
    let appid = $('#appid').val() ;
    var _token = $('#_token').val();
   //Ftech repay list    
            var table3 = $('#repaylist').on( 'error.dt', function ( e, settings, techNote, message ) {
                // console.log( 'An error has been reported by DataTables: ', message );
            }).DataTable({
                ajax: {
                    url: 'repay-data',
                    type: 'POST',
                    data:{appid,_token},
                },
            processing: true,
            serverSide: true,
            pagingType: "full_numbers",
            language: { "processing": '<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>' },
            lengthMenu: [
            [5,10, 25, 50, -1],
            [5,10, 25, 50, 'All'],
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
            
            });

            $('.repayModal tbody').on('click', '.remind', function () {
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
            

});

$("#disburse").on( "click", function() {
    $('.disburseModal').modal('show');  
});

$('.disburseModal').on('hidden.bs.modal', function () {
    $('.bd-example-modal-xl').css('z-index', '');
});
//Show Mothnly dues dates
$('#show_table').click(function() {
    $('#table_repay').toggle("slide");
});

//Plan Modal
$('.disburseModal').on('shown.bs.modal', function(event) {
    $('.bd-example-modal-xl').css('z-index', 1039);
    let appid = $('#appid').val() ;
    $('#rappid').val(appid) ;

     $('#table_repay').hide();

    $.ajax({    //create an ajax request to get session data 
        type: "GET",
        url: "approval-data",   //expect json File to be returned  
        data: {appid},		
        success: function(response){  
    
                        $("#apr_amt").html('&#8358; '+response.approved_amount);
                        $("#appr_initfee").html('&#8358; '+response.initial_fee);
                        $("#appr_monthly").html('&#8358; '+response.monthly_repayment);
                        $("#appr_date").html(response.created_at);
                        $("#appr_interest").html('&#8358; '+response.interest);
                        

                        $("#appr_lb1").html('&#8358; '+response.monthly_repayment);
                        $("#appr_lb2").html('&#8358; '+response.monthly_repayment);
                        $("#appr_lb3").html('&#8358; '+response.monthly_repayment);
                        $("#appr_lb4").html('&#8358; '+response.monthly_repayment);
                        $("#appr_lb5").html('&#8358; '+response.monthly_repayment);
                        $("#appr_lb6").html('&#8358; '+response.monthly_repayment);
                        $("#appr_lb7").html('&#8358; '+response.monthly_repayment);
                        $("#appr_lb8").html('&#8358; '+response.monthly_repayment);
                        $("#appr_lb9").html('&#8358; '+response.monthly_repayment);
                        $("#appr_lb10").html('&#8358; '+response.monthly_repayment);
                        $("#appr_lb11").html('&#8358; '+response.monthly_repayment);
                        $("#appr_lb12").html('&#8358; '+response.monthly_repayment);

                        
                                             
                        $("#mt1").val(response.d1);$("#mt2").val(response.d2);$("#mt3").val(response.d3);
                        $("#mt4").val(response.d4);$("#mt5").val(response.d5);$("#mt6").val(response.d6);
                        $("#mt7").val(response.d7);$("#mt8").val(response.d8);$("#mt9").val(response.d9);
                        $("#mt10").val(response.d10);$("#mt11").val(response.d11);$("#mt12").val(response.d12);
                        
                         
                        
            },
            error: function(data) {
                $(".disburseModal").scrollTop(0);
                $("#err2").show();
                $.each(data.responseJSON.errors, function (key, value) {
                    $("#err2").empty();
                    $('#err2').append('<strong>Error Occured While Fetching Data...</strong>');
                });
              
                    setTimeout(function(){ 
                        $('.disburseModal').modal('toggle');
                        $("#err2").empty();
                        $("#err2").hide();
                    }, 5000);
            }
        });
    

});

 
 //show Modal
 $('.bd-example-modal-xl').on('shown.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    let id = button.data('id') ;
    $("#modal-preloader").show();
    $.ajax({
        url: 'get-application-data',
        type: "GET",
        data:{id},
        dataType: "json",
        success: function(data) {
            $("#appid").val(data.id);
            $("#modal-preloader").hide();
            //populate form
            $('#comments').val(null);
            $("#passport").attr({ "src": 'data:image/;base64,'+data.passport });
            $("#app_name").html(data.names);
            $("#gender").html(data.gender);
            $("#dob").html(data.dateofBirth);
            $("#phoneno").html(data.phone);
            $("#email").html(data.email);
            $("#country").html(data.country_name.CountryName);
            $("#nationality").html(data.nationality_name.CountryName);
            $("#state").html(data.state.stateName);
            $("#lga").html(data.lga.lgaName);
            $("#haddress").html(data.home_address);
            $("#busstop").html(data.busstop_address);
            $("#appamount").html('&#8358; '+data.appamount);
            $("#initamount").html('&#8358; '+data.initamount);
            $("#cat").html(data.category);
            $("#amount").html('&#8358; '+data.amount);          
             
            if(data.status == 'Approved')
            {
                $("#dis1").show();
                $("#dis2").show();
                $("#dis3").show();
                $("#dis4").show();
                $('#action').hide() 
                
                if(data.app_accept == '1')
                {
                    $("#app_accept").html('<span class="badge badge-success">Accepted</span>');
                    $("#caccept").show();
                    
                }
                else  if(data.app_accept == '2')
                    $("#app_accept").html('<span class="badge badge-danger">Rejected</span>');
                else
                $("#app_accept").html('<span class="badge badge-warning">Pending</span>');
            
            }else
            {
                $("#dis1").hide();
                $("#dis2").hide();
                $("#dis3").hide();
                $("#dis4").hide();
                $('#action').show();
            }

            if(data.app_accept == '1')
            {
                $("#acct_info").show();
                $("#acct_number").html(data.acct_number);
                $("#acct_name").html(data.acct_name);
                $("#acct_bankname").html(data.acct_bankname);
                $("#repayrow").show();
                $("#repaystatus").html('<span class="badge badge-primary">'+data.approvalDataStatus+'</span>');
            }
            else{
                $("#acct_info").hide();
                $("#repayrow").hide();
            }
           
            if(data.disbursed == '1'){
                 $("#disbursed").html('<span class="badge badge-success">Disbursed</span>');
                 
                 $("#caccept").hide();
                 if(data.category != 'Scholarship'){
                    $("#repay").show();
                 }
            }
             else {
                    $("#disbursed").html('<span class="badge badge-warning">Pending</span>');
                    $("#repay").hide();
             }
                

            let role = data.initiator.role;

            if(role == 'agent')
               $("#initiator").html('<i class="badge badge-dark">'+
                 toTitleCase(data.initiator.role) + '</i>'
                 + "<br> <i class='fa fa-user'> </i> "+ data.initiator.first_name +"<br/><i class='fa fa-phone'> </i>"+
                 data.initiator.phone_number);
            else {
                $("#initiator").html('<i class="badge badge-dark">'+
                toTitleCase(data.initiator.role) + '</i>'
                + "<br> <i class='fa fa-phone'> </i>"+data.initiator.phone_number);
            }
            if (data.app_status != 'Open')
                $("#appstatus").html('<i class="badge badge-danger">'+data.app_status +'</i>');
            else
                 $("#appstatus").html('<i class="badge badge-success">'+data.app_status +'</i>');

            if(data.pay_status != 'Paid')
                 $("#paystatus").html('<span class="badge badge-warning"> '+data.pay_status +' </span>');
            else
                 $("#paystatus").html('<span class="badge badge-success"> '+data.pay_status +' </span>');
            
          


            if (data.dysabroad == 'Yes'){

                $('#dysabroad_div').show();
                $("#intl_phone").html(data.intl_phone);
                $("#intl_address").html(data.intl_address);
            }
            else 
                $('#dysabroad_div').hide();

        //Kin Info
        $("#kinname").html(data.kin.nok_title+
        ' ' +data.kin.nok_surname + 
        ' '+ data.kin.nok_middle_name+
        ' ' + data.kin.nok_firstname);  
        $("#kinrelation").html(data.kin.nok_relationship); 
        $("#kin_gender").html(data.kin.nok_gender); 
        $("#kin_dob").html(data.nok_dob); 
        $("#kin_phone").html(data.kin.nok_phone); 
        $("#kin_email").html(data.kin.nok_email); 
        $("#kin_state").html(data.kin_state.stateName); 
        $("#kin_lga").html(data.kin_lga.lgaName); 
        $("#kin_busstop").html(data.kin.nok_busstop); 
        $("#kin_address").html(data.kin.nok_address); 
        $("#schl_cat").html(data.edu.school_category); 
        $("#section").html(data.edu.school_section); 
        $("#schl_name").html(data.school.schl_name); 
        $("#course").html(data.edu.school_course);
        $("#no_years").html(data.edu.school_no_of_years+' Year'); 
        $("#ramt").html('&#8358; '+data.amount); 

        $("#gf_names").html(data.gua.gf_names);
        $("#gf_relationship").html(data.gua.gf_relationship);
        $("#gf_phone").html(data.gua.gf_phone);
        $("#gf_email").html(data.gua.gf_email);
        $("#gf_address").html(data.gua.gf_address);

        $("#gs_names").html(data.gua.gs_names);
        $("#gs_relationship").html(data.gua.gs_relationship);
        $("#gs_phone").html(data.gua.gs_phone);
        $("#gs_email").html(data.gua.gs_email);
        $("#gs_address").html(data.gua.gs_address);

        $("#hos_name").html(data.hos.name);
        $("#hos_phone").html(data.hos.phone);
        $("#hos_email").html(data.hos.email);
        $("#hos_state").html(data.hoss.stateName);
        $("#hos_city").html(data.hos.city);
        $("#hos_address").html(data.hos.address);

        $('#upload').attr('data', 'storage/'+data.upload.path);
        $('#downloadpdf').attr('href', 'storage/'+data.upload.path);

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
    
}); 

//Approve / reject application
$('#approve').click(function(evt) {

  $('#approve').prop("disabled", true); 
  
   var amt = $('#app_amount').val(); 
   var fee = $('#init_fee').val(); 
   var repay = $('#mrepay').val(); 
   var _token = $('#_token').val();   
   var appid = $('#appid').val(); 

   $('#approve').html("Processing ...");
   $.ajax({    //create an ajax request to get session data 
    type: "POST",
    url: "verify",   //expect json File to be returned  
    data: {appid:appid,_token,status:'approved',Initial_Fee:fee,Approve_Amount:amt,Monthly_Repayment:repay},		
    success: function(response){  
                    $(".bd-example-modal-xl").scrollTop(0);
                    $("#done_1").show();
                    $('#done_1').append('<strong>Application Approval Completed!.</strong>');
                    
                    setTimeout(function(){  
                       window.location.reload(); 
                    }, 3000);
        },
        error: function(data) {
            $(".bd-example-modal-xl").scrollTop(0);
            $("#err").show();
            $.each(data.responseJSON.errors, function (key, value) {
                $("#err").empty();
                $('#err').append('<strong>'+value+'</strong>');
            });
            $('#approve').html("Approve");
                setTimeout(function(){ 
                    $('#approve').prop("disabled", false);
                    $("#err").empty();
                    $("#err").hide();
                }, 3000);
        }
    });
 });


 //Reject application
$('#reject').click(function(evt) {

    $('#reject').prop("disabled", true); 

   var _token = $('#_token').val();   
   var appid = $('#appid').val(); 
   var reason = $('#comments').val(); 
   
   $('#reject').html("Processing ...");
   $.ajax({    //create an ajax request to get session data 
    type: "POST",
    url: "verify",   //expect json File to be returned  
    data: {appid:appid,_token,status:'rejected',reason},		
    success: function(response){  

                    $(".bd-example-modal-xl").scrollTop(0);
                    $("#done_1").show();
                    $('#done_1').append('<strong>Application Rejected !.</strong>');
                    
                    setTimeout(function(){  
                      window.location.reload(); 
                      $('#comments').val(null);
                    }, 4000);
        },
        error: function(data) {
            $(".bd-example-modal-xl").scrollTop(0);
            $("#err").show();
            $.each(data.responseJSON.errors, function (key, value) {
                $("#err").empty();
                $('#err').append('<strong>'+value+'</strong>');
            });
            $('#reject').html("Reject");
                setTimeout(function(){ 
                    $('#reject').prop("disabled", false);
                    $("#err").empty();
                    $("#err").hide();
                }, 5000);
        }
    });
    
    
 });
 
 $('#creason').hide();
 $('#cbutton').hide();
 $('#capprove').hide();
 $('#dapp').hide();

 $($("input[name=option]")).change(function(){

    var radioValue = $("input[name='option']:checked").val();
    

    if(radioValue == 'Approve'){
    
       $('#creason').hide();
       $('#cbutton').hide();

       $('#capprove').show();
       $('#dapp').show();
       
       
    }
    else{
        $('#capprove').hide();
        $('#dapp').hide();

      $('#creason').show();
      $('#cbutton').show();
       
    }
    

});


//Disburse and repayment details
$('#btnUpdate').click(function(evt) {
     $('#btnUpdate').prop("disabled", true);
    
    // Stop the button from submitting the form:
        evt.preventDefault();
        // Serialize the entire form:
        var data = new FormData(this.form);
        $.ajax({
            url: 'disburse',
            type: "POST",
            data,
            processData: false,
            contentType: false,
            cache: false,
            success: function(dataResult) {
                $(".disburseModal").scrollTop(0);
                        $("#done_2").show();
                        $('#done_2').append('<i class="fa fa-info-circle" aria-hidden="true"></i>'+'<strong>Disbursement Complete.</strong>');
                        $('#btnUpdate').html("Redirecting ...");
                        setTimeout(function(){  
                            $("#err2").hide();
                            window.location.reload(); 
                        }, 2000);
            },
            error: function(data) {
                $(".disburseModal").scrollTop(0);
                $("#err2").show();
                $.each(data.responseJSON.errors, function (key, value) {
                    $("#err2").empty();
                    $('#err2').append('<i class="fa fa-info-circle" aria-hidden="true"></i>'+'<strong>'+value+'</strong>');
                });
                
                    setTimeout(function(){ 
                        $(".disburseModal").scrollTop(0);
                        $('#btnUpdate').prop("disabled", false);
                        $("#err2").empty();
                        $("#err2").hide();
                    }, 5000);
            }
        });

    });
     
    
 
});
