$(document).ready(function(){
	 var row_count = $("#row_count").val();
    var table = $('#table_emails').DataTable({

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        "lengthMenu": [[25, 100, row_count], [25, 100, "Todos"]],
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": BASE_URL+"/gestor/listar_emails",
            "type": "POST",
             "data" : function(d){
                //var dates = rangepicker.val().split(' - '); 
                //d.inicio = dates[0].replace("/g", "-");
                //d.fin = dates[1].replace("/g", "-");
                //d.userId = $('#userId').val();
             }
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],

    });


setInterval(function() {
  $.get(BASE_URL + '/gestor/lookNewEmails', function(){
  });
}, 60 * 1000); // 60 * 1000 milsec

    var channel = pusher.subscribe('new-msg');
    channel.bind('nuevo-correo', function(data){
    	     table.ajax.reload();
           
             toastr["success"]("SE HAN ENCONTRADO NUEVOS CORREOS");
                                     setTimeout(function () { 
                                          //location.reload();
                                        }, 3000);
        });



});