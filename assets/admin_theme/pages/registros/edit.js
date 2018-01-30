$(document).ready(function(){
	$('#especialidad').on('changed.bs.select',function(e){
		      var id = $(this).val();

                        $.ajax({
                        url : BASE_URL +'/seleccion/profesionales',
                         data : {id : id},
                        type : 'POST',
                        dataType : 'html',
                          success : function(html) {
                            
                              $('#profesionales').html('');
                              $('#profesionales').append(html);
                              $('#profesionales').selectpicker('refresh');
                           
                        },
                           error : function(xhr, status) {
                              
                          },
                         complete : function(xhr, status) {
                            //alert('Petición realizada');
                            
                        }});
           
        
           });

	$('#edit-form').ajaxForm({
		  beforeSubmit: function () {
		 		var form =	$('#edit-form').validate();
            return form.valid(); // TRUE when form is valid, FALSE will cancel submit
        },
 		 success: function(res){
   		 if(res.result == true){

            toastr["success"](res.message);
                                 setTimeout(function () { 
                                    // location.reload();
                                    }, 3000);
    	}

 }
	});

});