$(document).ready(function(){
	var table = $('#documentos_table').DataTable();
	
});


$('#documentos_table tbody').on( 'click', 'button', function () {
       // console.log($(this).data('id'));
       var id  = $(this).data('id');
       $.post(BASE_URL+'/notification/seen', { id : id }, function(resp){

       });
    } );


$(document).on("click", ".btn-modal", function () {
        var modal = $('#modal');
        var btn = $(this);
        modal.modal('show');
        var body = modal.find('.modal-body');
        var id = btn.data('id');
        var id_email = btn.data('id_email');

      body.load(BASE_URL+"/documentos/loadmodal", { id: id, id_email : id_email },function(){
      		$("[name='chk-gestion']").bootstrapSwitch();
          $("[name='chk-file']").bootstrapSwitch();
      		//$("#form_gestionar").fileupload();
          $('input[name="chk-file"]').on('switchChange.bootstrapSwitch',  function(event, state) {
            $('.file-control-div').toggle();
            var required = $('#file_required').val();
            if(required == '1' ){
              $('#file_required').val('0');
              $('input[name="userfile"]').removeAttr('required');
            }else{
              $('#file_required').val('1');
              $('input[name="userfile"]').prop('required',true);
            }
          });
	$('input[name="chk-gestion"]').on('switchChange.bootstrapSwitch',  function(event, state) {
			 if(state){
			 	$('#div-archivo').show();
			      var posting = $.post( BASE_URL+'/documentos/changestate', { state:2, id: id, id_email : $('#id_email').val() }, function(data){
		      		if(data.result == false){
		      			toastr["error"]("SE PRODUJO UN PROBLEMA...");
		                                 setTimeout(function () { 
		                                      //location.reload();
		                                    }, 3000);

		      		}else{
		      			toastr["success"]("SE HA INICIADO LA GESTION DEL ARCHIVO");
		                                 setTimeout(function () { 
		                                      //location.reload();
		                                    }, 3000);
		      		}
		      } );
			 }

		});


      	});

});


$(document).on("click", ".btn-call", function () {
        var modal = $('#modalCall');
        var btn = $(this);
        modal.modal('show');
       
        var body = modal.find('.modal-body');
        var id = btn.data('id');

        var btncall = $('#btn-make-call');

         btncall.prop('disabled', false);
         $('#numero').prop('readonly', false);
         $('#uniqueId').val('');
         $('#call-options').css('display','none');
       
        btncallf =  function(){
          if($('#numero').val() != ''){
              $.post(BASE_URL+'/apicall/callV2',{ anexo: $('input[name="anexo"]').val(), numero: $('#numero').val(), documento: $('input[name="doc_id"]').val()}, function(result){

            
             if(result.result == true){
              toastr["success"]("GENERANDO LLAMADA");
                                     setTimeout(function () { 
                                          //location.reload();
                                        }, 3000);
              $('#call-options').toggle();
              btncall.prop('disabled', true);
              $('#numero').prop('readonly', true);
              $('#uniqueId').val(result.uniqueId);
              $('#form-save').ajaxForm({

                beforeSubmit:  function(data, $form, opts){
                  $form.find('#btn_save_call').val("Por favor espere...").click(function(e){
                        e.preventDefault();
                        return false;
                    });
                },
                success: function(res, status, xhr, form) {
                       if(res.result == true){
                        toastr["success"]("LLAMADA REGISTRADA");
                            modal.modal('toggle');
                                     setTimeout(function () { 
                                          //location.reload();
                                        }, 3000);
                       }
                    }
              });

             
             }else{
              toastr["error"]("PROBLEMA AL GENERAR LA LLAMADA");
                                     setTimeout(function () { 
                                          //location.reload();
                                        }, 3000);
             }
          });

            }else{
              toastr["error"]("DEBE INGRESAR UN NUMERO TELEFONICO");
            }

        };

         btncall.unbind().bind('click', btncallf);


});

$('#modalCall').on('show.bs.modal', function(e) {
   
    //get data-id attribute of the clicked element
    var id = $(e.relatedTarget).data('id');
    $(e.currentTarget).find('input[name="doc_id"]').val(id);
    $(this).off('show.bs.modal');

});


$(document).on("click", ".btn-history", function () {
    var modal = $('#modalHistory');
       var btn = $(this);
        modal.modal('show');
        var body = modal.find('.modal-body');
        var id = btn.data('id');

          body.load(BASE_URL+"/documentos/documenthistory", { id: id },function(){
            var table = $('#history_table').DataTable(); 

            table.rows().every( function ( rowIdx, tableLoop, rowLoop ) {
                var data = this.data();
            } );
            var table2 = $('#calls_table').DataTable(); 
          });
});

