$(document).ready(function(){
    var rangepicker = $('#date-filter').daterangepicker(rangeOptions);
    var row_count = $("#row_count").val();
    var table = $('#sms_table').DataTable({

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order. 
        "createdRow": function ( row, data, index ) {
            // if ( data[5].replace(/[\$,]/g, '') * 1 > 150000 ) {
            //     $('td', row).eq(5).addClass('highlight');
            // }

        },
          responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal( {
                    header: function ( row ) {
                        var data = row.data();
                        return 'Detalles del SMS  ' + '+56'+data[5];
                    }
                } ),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
                    tableClass: 'table table-striped table-condensed'
                })
            }
        },
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "listar_sms",
            "type": "POST",
             "data" : function(d){
                var dates = rangepicker.val().split(' - '); 
                d.inicio = dates[0].replace("/g", "-");
                d.fin = dates[1].replace("/g", "-");
                d.userId = $('#userId').val();
             }
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
            "createdCell": function (td, cellData, rowData, row, col) {
                console.log(rowData);

                $.get(BASE_URL+"/api/messagestate/"+rowData[10], function(response){
                    $.each(response,function(i,v){
                        var label = 'label-default';
                         if(v == 'RECIBIDO'){
                           $(td).html("<span class='label label-success'>"+v+"</span>");
                         }
                         if(v == 'ENVIADO'){
                            $(td).html("<span class='label label-primary'>"+v+"</span>");
                         }
                         if(v == 'PENDIENTE'){
                              $(td).html("<span class='label label-warning'>"+v+"</span>");
                         } 

                         if(v == 'CONFIRMACION PENDIENTE'){
                              $(td).html("<span class='label label-warning'>"+v+"</span>");
                         }                          
                        rowData[0] =$(td).html();
                    });
                    //console.log(response.value);
                    
                })
       // if ( cellData == 1 ) {
       // $(td).css('color', 'red')
     // }
    }
        }
        ]
    });


 rangepicker.on('cancel.daterangepicker', function(ev, picker) {
 
});
 //cuando se envia una fecha valida
  rangepicker.on('apply.daterangepicker', function(ev, picker) {
          table.ajax.reload();

});
$('#userId').on('change',function(){
    table.ajax.reload();
});


});