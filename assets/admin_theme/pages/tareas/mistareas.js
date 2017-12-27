// var table = $('#mistareas_table').DataTable({

//   "processing": true,
//   "serverSide": true,
// 	"ajax": {
//             url : BASE_URL+ '/webapi/tareasporusuario',
//             type: "POST",
//             data:  function ( d ) {
               
               
//             }
//        }, 


      
// });
// 
var table = $('#mistareas_table').DataTable({

 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "listar_mis_tareas",
            "type": "POST"
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
 
    });
 
