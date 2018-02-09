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
            "targets": [ 9 ], //first column / numbering column
            "orderable": false, //set not orderable
            "createdCell": function (td, cellData, rowData, row, col) {
                $.get(BASE_URL+"/api/messagestate/"+cellData, function(response){
                    $.each(response,function(i,v){
                        console.log(v);
                        $(td).html(''+v);
                    });
                    //console.log(response.value);
                    
                })
      if ( cellData == 1 ) {
       // $(td).css('color', 'red')
      }
    }
        }
        ],

         responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal( {
                    header: function ( row ) {
                        var data = row.data();
                        return 'Detalles ';
                    }
                } ),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
                    tableClass: 'table table-striped'
                } )
            }
        },
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