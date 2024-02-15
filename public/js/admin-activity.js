$(document).ready(function() {
    $.fn.dataTable.ext.errMode = 'none';
//Ftech agent list    
var table = $('#stafflist').DataTable({
    processing: true,
    serverSide: true,
    ajax: "staff-activity",
    pagingType: "full_numbers",
    language: { "processing": '<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>' },
    lengthMenu: [
        [10, 25, 50, -1],
        [10, 25, 50, 'All'],
    ],
    
    columns: [
        {data: 'id', name: 'id'},
        {data: 'full_name', name: 'full_name'},
        {data: 'phone_number', name: 'phone_number'},
        {data: 'appcount', name: 'appcount'},
        {data: 'approveCount', name: 'approveCount'},
        {data: 'rejectCount', name: 'rejCount'},

    ],
    
    dom: 'Blfrtip',
    buttons: [
    {
        extend: 'print',
        exportOptions: {
            columns: [ 0, 1, 2, 3,4,5, ]
        },
        title: '- Staff Activity List -'
    },
    {
        extend: 'pdfHtml5',
        exportOptions: {
            columns: [ 0, 1, 2, 3,4,5,]
        },
        title: '- Staff Activity List -'
    },
 
],
    "fnRowCallback" : function(nRow, aData, iDisplayIndex){
        $("td:first", nRow).html(iDisplayIndex +1);
       return nRow;
    },
 
});

//Ftech agent list    
$('#agent-tab').click(function(evt) {
 
var table2 = $('#agentlist').on( 'error.dt', function ( e, settings, techNote, message ) {
    // console.log( 'An error has been reported by DataTables: ', message );
}).DataTable({
    processing: true,
    serverSide: true,
    ajax: "agent-activity",
    pagingType: "full_numbers",
    destroy: true,
    language: { "processing": '<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>' },
    lengthMenu: [
        [10, 25, 50, -1],
        [10, 25, 50, 'All'],
    ],
    
    columns: [
        {data: 'id', name: 'id'},
        {data: 'full_name', name: 'full_name'},
        {data: 'phone_number', name: 'phone_number'},
        {data: 'appcount', name: 'appcount'},
        {data: 'approveCount', name: 'approveCount'},
        {data: 'rejectCount', name: 'rejCount'},
        

    ],
    
    dom: 'Blfrtip',
    buttons: [
    {
        extend: 'print',
        exportOptions: {
            columns: [ 0, 1, 2, 3,4,5, ]
        },
        title: '- Agent Activity List -'
    },
    {
        extend: 'pdfHtml5',
        exportOptions: {
            columns: [ 0, 1, 2, 3,4,5,]
        },
        title: '- Agent Activity List -'
    },
 
],
    "fnRowCallback" : function(nRow, aData, iDisplayIndex){
        $("td:first", nRow).html(iDisplayIndex +1);
       return nRow;
    },
});

});


 //Ftech School list    
$('#school-tab').click(function(evt) {
 
    var table3 = $('#schoollist').on( 'error.dt', function ( e, settings, techNote, message ) {
        // console.log( 'An error has been reported by DataTables: ', message );
    }).DataTable({
        processing: true,
        serverSide: true,
        ajax: "school-activity",
        pagingType: "full_numbers",
        destroy: true,
        language: { "processing": '<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>' },
        lengthMenu: [
            [10, 25, 50, -1],
            [10, 25, 50, 'All'],
        ],
        
        columns: [
            {data: 'id', name: 'id'},
            {data: 'schl_name', name: 'schl_name'},
            {data: 'appcount', name: 'appcount'},
            {data: 'approveCount', name: 'approveCount'},
            {data: 'rejectCount', name: 'rejCount'},
    
        ],
        
        dom: 'Blfrtip',
        buttons: [
        {
            extend: 'print',
            exportOptions: {
                columns: [ 0, 1, 2, 3,4 ]
            },
            title: '- School Activity List -'
        },
        {
            extend: 'pdfHtml5',
            exportOptions: {
                columns: [ 0, 1, 2, 3,4]
            },
            title: '- School Activity List -'
        },
     
    ],
        "fnRowCallback" : function(nRow, aData, iDisplayIndex){
            $("td:first", nRow).html(iDisplayIndex +1);
           return nRow;
        },
     
    });
    
    });

});
