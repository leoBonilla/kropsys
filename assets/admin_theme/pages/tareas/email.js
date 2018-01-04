$(document).ready(function(){
	$('#email_table').DataTable({
		responsive : true,
		 "order": [[ 0, "desc" ]],
     "columnDefs": [
    { "width": "12%", "targets": 5 }
  ]
	});
});

// $(document).on("click", ".btn-modal", function () {
//     // var myBookId = $(this).data('id');
//      //$(".modal-body #bookId").val( myBookId );
//      // As pointed out in comments, 
//      // it is superfluous to have to manually call the modal.
//       $('#email').val($(this).data('sender'));
//       $('#subject').val($(this).data('subject'));
//       $('#message').html($(this).closest('tr').find('.td-msg').html());
//       $('#adjuntos').html($(this).closest('tr').find('.attachments').html())
//       $('#exampleModal').modal('show');

// });

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

