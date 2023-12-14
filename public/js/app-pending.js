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

 //Pay Modal
 $('.bd-example-modal-xl').on('shown.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    let id = button.data('id') 
     
  
    //app_id =  $("#app_id").val(id);

    $.ajax({
        url: 'get-application',
        type: "GET",
        data:{id},
        success: function(data) {
            //populate form
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

            $("#cat").html(data.category);
            $("#amount").html('&#8358; '+data.amount);
           

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
        
     
                    // $("#success").show();
                    // $('#success').append('<strong>Application Submitted Succesfully!</strong>');
                    // $('#submit').html("Redirecting ...");
                    // setTimeout(function(){  
                    //     $("#error").hide();
                    //     $('form').trigger("reset");
                    //   window.location.reload(); 
                    // }, 2000);
        },
        error: function(data) {
            // window.scrollTo(0, 0);
            // $("#error").show();
            // $.each(data.responseJSON.errors, function (key, value) {
            //     $("#error").empty();
            //     $('#error').append('<strong>'+value+'</strong>');
            // });
            
            //     setTimeout(function(){ 
            //         window.scrollTo(0, 0); 
            //         $('#submit').prop("disabled", false);
            //         $("#error").empty();
            //         $("#error").hide();
            //     }, 5000);
        }
    });
    
});   
});
