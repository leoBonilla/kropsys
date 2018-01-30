$(document).ready(function(){
     var rangepicker = $('#date-filter').daterangepicker({
     ranges: {
                'hoy': [moment(), moment()],
                'Ayer': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Ultimos 7 días': [moment().subtract(6, 'days'), moment()],
                'Ultimos 15 días': [moment().subtract(14, 'days'), moment()],                       
                'Este mes': [moment().startOf('month'), moment().endOf('month')]                   
            },

     "locale": {
        "format": "DD/MM/YYYY",
        "separator": " - ",
        "applyLabel": "Aplicar",
        "cancelLabel": "Cancelar",
        "fromLabel": "Desde",
        "toLabel": "Hasta",
        "customRangeLabel": "Personalizado",
        "daysOfWeek": [
            "Dom",
            "Lun",
            "Mar",
            "Mie",
            "Jue",
            "Vie",
            "Sab"
        ],
        "monthNames": [
            "Enero",
            "Febrero",
            "Marzo",
            "Abril",
            "Mayo",
            "Junio",
            "Julio",
            "Agosto",
            "Septiembre",
            "Octubre",
            "Noviembre",
            "Diciembre"
        ],
        "firstDay": 1
    }
 });
    var row_count = $("#row_count").val();
    var table = $('#agendamientos_table').DataTable({

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        "lengthMenu": [[25, 100, row_count], [25, 100, "Todos"]],
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "listar_agendamientos",
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
          // var rangepicker = $(this);
          // var dates = rangepicker.val().split(' - '); 
       
          // console.log(dates);
          table.ajax.reload();

});

// $('#fecha_inicio,#fecha_limite').mask('00/00/0000');
// $('#fecha_inicio,#fecha_limite').datepicker({
//     format: 'dd/mm/yyyy',
//                 language: 'es',
//                 autoclose:true,
//                 todayHighlight: true,
//                 title: 'Seleccione fecha',
//                 daysOfWeekDisabled: [0,6],
//                 weekStart: 1
// }).on('changeDate',function(){
//     table.ajax.reload();
// });

// $('#fecha_inicio,#fecha_limite').datepicker('update', new Date());
// $('#userId').on('change',function(){
//     table.ajax.reload();
// });
});