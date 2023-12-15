$(document).ready(function() {


//Ftech Pending list    
var table = $('#pendinglist').DataTable({
    processing: true,
    serverSide: true,
    ajax: "staff-applications",
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


$('#verified-tab').click(function(evt) {
  
//Ftech Verified list    
var table2 = $('#verifiedlist').DataTable({
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


 //Pay Modal
 $('.bd-example-modal-xl').on('shown.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    let id = button.data('id') ;

    $.ajax({
        url: 'get-application',
        type: "GET",
        data:{id},
        dataType: "json",
        success: function(data) {
            $("#appid").val(data.id);

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
            

                if(data.app_accept == '1')
                    $("#app_accept").html('<span class="badge badge-success">Accepted</span>');
                else
                    $("#app_accept").html('<span class="badge badge-warning">Pending</span>');
            }else
            {
                $("#dis1").hide();
                $("#dis2").hide();
                $("#dis3").hide();
                $("#dis4").hide();
            }

            if(data.app_accept == '1')
            {

                $("#acct_info").show();
                $("#acct_number").html(data.acct_number);
                $("#acct_name").html(data.acct_name);
                $("#acct_bankname").html(data.acct_bankname);
              
            }
            else{
                $("#acct_info").hide();
             
            }
           
            if(data.disbursed == '1')
                 $("#disbursed").html('<span class="badge badge-success">Disbursed</span>');
             else
                $("#disbursed").html('<span class="badge badge-warning">Pending</span>');

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
            
            if(data.verify_id != null) $('#action').hide();else $('#action').show()


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

   var reason = $('#comments').val(); 
   var _token = $('#_token').val();   
   var appid = $('#appid').val(); 

   $('#approve').html("Processing ...");
   $.ajax({    //create an ajax request to get session data 
    type: "POST",
    url: "verify",   //expect json File to be returned  
    data: {appid:appid,_token,status:'approved',reason},		
    success: function(response){  
                    $(".bd-example-modal-xl").scrollTop(0);
                    $("#done").show();
                    $('#done').append('<strong>Application Verification Completed!.</strong>');
                    
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
                    $("#done").show();
                    $('#done').append('<strong>Application Verification Completed!.</strong>');
                    
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
 
 
});
