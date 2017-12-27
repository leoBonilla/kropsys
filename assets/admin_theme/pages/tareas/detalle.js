$(document).ready(function(){
var table = $('#detalle_table').DataTable({
	dom: 'Bfrtip',
	saveState : true,
      'columnDefs': [
         {
            'targets': 0,
             'data' : 1,
            'checkboxes': {
               'selectRow': true
            }
         }
      ],
      'select': {
         'style': 'multi'
      },

		'order': [[1, 'asc']],
		buttons: [
		            'excel',
		            {
		                text: 'Definir responsable',
		                action: function ( e, dt, node, conf ) {
		                    //var form = $('#table_form');
		                    var rows_selected = table.column(0).checkboxes.selected();
		                    if(rows_selected.count()> 0){
		                    	$('#asignarModal').modal('show');
		                        var form = 	$('#form_asignar');
		                       $.each(rows_selected, function(index, rowId){
		                       			$(form).append($('<input>').attr('type', 'hidden').attr('name', 'id[]').val(rowId)
         							  );
						    	 });
		                       form.find('#btn-enviar').unbind("click").on('click',function(){
		                       	form.ajaxForm({
		                       		success: function(json){

       												location.reload();
   											 },
   								      complete: function(xhr, theStatus) {
   								      	            $('#asignarModal').modal('toggle');
										           // alert(theStatus);
										          
        									}
		                       	});
		                       });
		                    }
		                      
		                }
		            }
		        ]


		});



  $('#table_form').on('submit', function(e){
      var form = this;

      var rows_selected = table.column(0).checkboxes.selected();

      // Iterate over all selected checkboxes
      $.each(rows_selected, function(index, rowId){
         // Create a hidden element
         $(form).append(
             $('<input>')
                .attr('type', 'hidden')
                .attr('name', 'id[]')
                .val(rowId)
         );
      });
   });
$('.btn-user').on('click',function(){
	var btn = $(this);
	$('#asignarModal').modal('show');
});

$('.btn-detail').on('click',function(){
	var btn = $(this);
	$('#detalleModal').modal('show');
});
});