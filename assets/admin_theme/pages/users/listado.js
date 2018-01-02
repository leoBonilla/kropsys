$(document).ready(function(){
     var row_count = $("#row_count").val();
        var table = $('#users_table').DataTable({

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
         "lengthMenu": [[25, 100, row_count], [25, 100, "Todos"]],
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "listar_usuarios",
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



});



$(document).on("click", ".btn-edit", function () {
          var modal =  $('#editModal');
          modal.modal('show');
            var body = modal.find('.modal-body');
              body.load("../adfa",{id: $(this).data('user-id') }, function(){
               
                
                

          });
});