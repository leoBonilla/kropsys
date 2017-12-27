$(document).ready(function(){
    var row_count = $("#row_count").val();
    var table = $('#otros_table').DataTable({

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
         "lengthMenu": [[25, 100, row_count], [25, 100, "Todos"]],
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "listar_otros",
            "type": "POST",
             "data" : function(d){
                d.inicio = $('#fecha_inicio').val();
                d.fin = $('#fecha_limite').val();
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



$('#fecha_inicio,#fecha_limite').mask('00/00/0000');
$('#fecha_inicio,#fecha_limite').datepicker({
    format: 'dd/mm/yyyy',
                language: 'es',
                autoclose:true,
                todayHighlight: true,
                title: 'Seleccione fecha',
                daysOfWeekDisabled: [0,6],
                weekStart: 1
}).on('changeDate',function(){
    table.ajax.reload();
});

$('#fecha_inicio,#fecha_limite').datepicker('update', new Date());
$('#userId').on('change',function(){
    table.ajax.reload();
});
});