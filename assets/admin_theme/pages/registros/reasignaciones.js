$(document).ready(function(){
     var rangepicker = $('#date-filter').daterangepicker(rangeOptions);
    var row_count = $("#row_count").val();
	var table = $('#reasignaciones_table').DataTable({

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
         "lengthMenu": [[25, 100, row_count], [25, 100, "Todos"]],
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "listar_reasignaciones",
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

console.log($('#userId'));
$('#userId').on('change', function(){
    table.ajax.reload();

});
});