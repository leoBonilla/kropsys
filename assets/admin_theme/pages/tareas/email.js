$(document).ready(function(){
var	table =  $('#email_table').DataTable({
		responsive : true,
		 "order": [[ 0, "desc" ]],
     "columnDefs": [
    { "width": "12%", "targets": 5 }
  ]
	});
$('[data-toggle=confirmation]').confirmation({
  rootSelector: '[data-toggle=confirmation]',
  // other options
});
$('#email_table tbody').on("click", ".btn-discard", function () {
      var tr = $(this).parents('tr') ;
    $.post(BASE_URL+ "/tareas/descartaremail", {id : $(this).data('idmail')}, function(resp){
     if(resp.result == true){
       tr.addClass('animated fadeOutRight');
            setTimeout(function(){
               table.row(tr).remove().draw();
             }, 500);     
        toastr["success"]("EMAIL DESCARTADO");
     }else{
      toastr["error"]("SE PRODUJO UN PROBLEMA");
     }
    });

});
});



$(document).on("click", ".btn-asignar", function () {
	  var modal = $('#asignarModal');
      modal.modal('show');
      var body = modal.find('.modal-body');
      body.load("ajaxmodal", { id: $(this).data('idmail')},function(){
      		var form = $('#form-asignar');
          $('#usuarios').selectpicker({
            liveSearch: true
          });
      		form.validate();
      		var btn = form.find('#btn-asignar');
          form.find('#observaciones').summernote({
                   lang: 'es-ES' // default: 'en-US'
                  });;
      		btn.on('click', function(e){
      		form.ajaxForm({ // initialize the plugin
		        beforeSubmit: function () {
		        	if(form.valid()){
		        		btn.attr("disabled", true);
		        	}
		            return form.valid(); // TRUE when form is valid, FALSE will cancel submit
		        },
		        success: function (returnData) {
		           if(returnData.result == true){
		                 toastr["success"]("TAREA ASIGNADA A USUARIO");
		                                 setTimeout(function () { 
		                                      //location.reload();
		                                    }, 3000);
		           }
		        }
   			 });
      	   });
      	});
     });


$(document).on("click", ".btn-modal", function () {
      var modal = $('#infoModal');
      modal.modal('show');
      var body = modal.find('.modal-body');
        body.load("ajaxInfo", { id: $(this).data('idmail')},function(){
       
        });
  

});




