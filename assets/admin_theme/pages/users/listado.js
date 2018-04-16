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

        initComplete: function(settings,json){
            //alert('ok');
            // $('.btn-edit').click(function(){
            //   alert('ok');
            // });

            table.on('click', '.btn-edit',function(){
               $(".modal:visible").modal('toggle');
          var modal =  $('#editModal');
          modal.modal('show');
            var body = modal.find('.modal-body');
              body.load(BASE_URL+ "/users/edituserhtml",{id: $(this).data('user-id') }, function(){
               
                //$('.selectpicker').selectpicker();
                $('.xeditable').editable({
                  mode: 'inline',
                  
                  success: function(response, newValue) {
                              if(response.status == 'error') return response.msg; //msg will be shown in editable form
                              table.ajax.reload();
                        }
                });

         
      $('.editable-active').editable({
         mode: 'inline',
         tpl: '<select style="width:150px;">',
          source: [
              {id: '0', text: 'Activo'},
              {id: '1', text: 'Inactivo'}
           ],
          success : function(response, newValue){
            table.ajax.reload();
          }
      });


      $('.xeditablext').editable({
         mode: 'inline',
        select2: {
            ajax: {
                dataType: 'json',
                data :{ q: '40' },
                url: BASE_URL + '/users/extensions',
                processResults: function (data, page) {
                    //console.log(data);
                    return {
                        results: data
                    };
                }
            }
        },
        tpl: '<select style="width:150px;">',
        type: 'select2',
        success: function(response, newValue) {
            //console.log('success');
            console.log(response);
                var editable = $(this).data('editable');
                console.log(editable);
                var option = editable.input.$input.find('option[value="VALUE"]'.replace('VALUE',newValue));
                var newText = option.text(); 
                $(this).text(newText);
                $(this).attr('data-text', newText);
                $(this).attr('data-value', newValue);   
                table.ajax.reload();
        },
        display: function(value, sourceData ) {
           $(this).val(value);

           // alert('display');
           console.log(sourceData);  
          // console.log(value);       
            //set new text for xeditable field from php response 
          // $(this).text(sourceData);  
        }
    });
          });
            });

           // $('#')
        }
    });


});


