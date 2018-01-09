$(document).ready(function(){
	$('#adjuntos_table').DataTable({
		responsive : true,
		 "order": [[ 0, "desc" ]]
	});
  
  



});

$(document).on("click", ".btn-history", function () {
         	var modal =  $('#historyModal');
        	modal.modal('show');
            var body = modal.find('.modal-body');
     		body.load("../ajaxhistory",{id: $(this).data('id') }, function(){
      		      var table = $('#history_table').DataTable();
                $('.time-td').each(function(i, e){
                    var start = $(e).find('input.inicio');
                    var end = $(e).find('input.fin');
                    var span = $(e).find('span.time');
                    // setInterval(function(){
                    //   span.settimer(start,end);
                    // },1000);
                });

               var  bvalidate = $('#btn-validate').bootstrapSwitch();
               var  bcellvalidate = $('.btn-cell-validate').bootstrapSwitch();
              bcellvalidate.on('switchChange.bootstrapSwitch', function(event, state) {
                      $('#revision').toggle();
                    });
               bvalidate.on('switchChange.bootstrapSwitch', function(event, state) {
                      $('#obs').toggle();
                    });
               var form = $('#form-validate'); 
               form.validate();

              form.ajaxForm({
                 beforeSubmit : function(arr, $form, options){
             if($form.valid())
                       {
                          $form.find('#btn-submit').prop('disabled', true);
                          return true; //it will continue your submission.
                       }
                       else
                       {
                           
                                         return false; //ti will stop your submission.
                       }

                    },

                    success: function(data){
                      if(data.result == true){
                         toastr["success"]("ESTADO GUARDADO");
                                 setTimeout(function () { 
                                     //location.reload();
                                    }, 6000);
                      }else{
                         toastr["error"]("ALGO SALIO MAL, POR FAVOR INTENTELO MAS TARDE, " + data.mensaje);
                                 setTimeout(function () { 
                                     //location.reload();
                                    }, 6000);
                      }
                    }
              });   
                

      		});
      

});


$(document).on("click", ".btn-calls", function () {
          var modal =  $('#historyModal');
          modal.modal('show');
            var body = modal.find('.modal-body');
              body.load("../ajaxcalls",{id: $(this).data('id') }, function(){
                var table = $('#calls_table').DataTable();
         
                
                

          });
      

});


$(document).on("click", ".btn-despachar", function () {
          var modal =  $('#modalDespachar');
          modal.modal('show');
            var body = modal.find('.modal-body');
              body.load("../ajaxdespachar",{id: $(this).data('id') }, function(){
                var form = $('#form-send');
                $('textarea').froalaEditor({
                              // Set maximum number of characters.
                              iframe: true,
                              toolbarButtons: ['undo', 'redo' , '|', 'bold', 'italic', 'underline', 'strikeThrough','indent', 'clearFormatting', 'insertTable','fontFamily', 'fontSize','inlineStyle', 'paragraphStyle','paragraphFormat', 'align', 'formatOL', 'formatUL', 'outdent', 'indent'],
                              charCounterMax: 2000,
                               language: 'es',
                                placeholderText: 'Comience a escribir algo...'

                               });
                form.ajaxForm({
                  beforeSubmit: function(form){
                    $('#btn-send-email').attr('disabled', true);
                  },
                  success: function(data){
                     if(data.result == true){
                         toastr["success"]("EMAIL ENVIADO CORRECTAMENTE");
                     }else{
                         toastr["error"]("HA OCURRIDO UN ERROR INESPERADO, CONTACTAR CON EL ADMINISTRADOR");
                     }
                  }
                });
            

          });
      

});