$(document).ready(function(){
	var table = $('#agendamientos_table').DataTable({
		'ajax': BASE_URL + '/webapi/agendamientos',
		"columns": [
            { "data": "especialidad" },
            { "data": "profesional" },
            { "data": "prestacion" },
            { "data": "fecha" },
            { "data": "pacientes_agendados" },
            { "data": "no_contestaron" },
            { "data": "rechazo_anulaciones" },
            { "data": "hora_ya_asignada" },
            { "data": "n_erroneo" },
            { "data": "observaciones" },
            { "data": "usuario"}
     
        ],        

        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal( {
                    header: function ( row ) {
                        var data = row.data();
                        return 'Detalles ';
                    }
                } ),
                renderer: function ( api, rowIdx, columns ) {
                    var data = $.map( columns, function ( col, i ) {
                        return '<tr>'+
                                '<td>'+col.title+'  :'+'</td> '+
                                '<td>'+col.data+'</td>'+
                            '</tr>';
                    } ).join('');
 
                    return $('<table/>').append( data );
                }
            }
        },

        columnDefs: [{
           "searchable": false,
           "orderable": false,
           "targets": 0
        },{
           "data": null,
           "defaultContent": "",
           "targets": 6
        }]
	});
$('#fecha_inicio,#fecha_limite').mask('00/00/0000');
$('#fecha_inicio,#fecha_limite').datepicker({
    format: 'dd/mm/yyyy',
    language: 'es',
    autoclose:true,
    todayHighlight: true,
    title: 'Seleccione fecha'
});
$('#btn-filter').on('click',function(){
    alert('okc');
});
});