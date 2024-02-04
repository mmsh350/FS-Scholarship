var table3 = $('#transactions').DataTable({
    processing: true,
    serverSide: true,
    ajax: "transactions",
    pagingType: "full_numbers",
    language: { "processing": '<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>' },
    lengthMenu: [
        [10, 25, 50, -1],
        [10, 25, 50, 'All'],
    ],
    order: [[0, 'desc']],
    columns: [
        {data: 'id', name: 'id'},
        {data: 'created_at', name: 'created_at'},
        {data: 'referenceId', name: 'referenceId'},
        {data: 'gateway', name: 'gateway'},
        {data: 'service_description', name: 'service_description'},
        {data: 'paidby', name: 'paidby'},
        {data: 'amount', name: 'amount'},
    
    ],
    
    dom: 'Blfrtip',
    buttons: [
    {
        extend: 'print',
        exportOptions: {
            columns: [ 0, 1, 2, 3,4,5,6 ]
        },
        title: '- Transaction History -'
    },
    {
        extend: 'pdfHtml5',
        exportOptions: {
            columns: [ 0, 1, 2, 3,4,5,6 ]
        },
        title: '- Transaction History -'
    },],
    "fnRowCallback" : function(nRow, aData, iDisplayIndex){
        $("td:first", nRow).html(iDisplayIndex +1);
       return nRow;
    },
});
