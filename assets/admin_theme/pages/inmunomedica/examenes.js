$(document).ready(function(){
	  var examenes_table = $('#examenes_table').DataTable({
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
            "url": "listar_examenes",
            "type": "POST",
             "data" : function(d){

             }
        }
	  });
});