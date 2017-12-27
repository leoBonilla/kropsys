$(document).ready(function(){

	
	$('#select-especialidad').on('changed.bs.select',function(e){
                 var form = $(this).parents('form:first');
                var selector = $(this);
                        $.ajax({
                        url : BASE_URL +'/seleccion/profesionales',
                         data : {id : selector.val()},
                        type : 'POST',
                        dataType : 'html',
                          success : function(html) {
							  $('#select-profesional').html('<option value="" ></option>');
                              $('#select-profesional').append(html);
                              $('#select-profesional').selectpicker('refresh');
                           
                        },
                           error : function(xhr, status) {
                              
                          },
                         complete : function(xhr, status) {
                            //alert('Petición realizada');
                            
                        }});
           
        
           });
		   
		   

			$('.datepicker').datepicker({
				        format: 'dd/mm/yyyy',
                language: 'es',
                autoclose:true,
                todayHighlight: true,
                title: 'Seleccione fecha',
                daysOfWeekDisabled: [0,6],
                weekStart: 1
			});
			
			$('#form').validate();
			$('#form').ajaxForm({beforeSubmit: function () {
                     $('#form').find('#submit-btn').val("Espere por favor...").click(function(e){
                        e.preventDefault();
                        return false;
                    });
                    return $("#form").valid(); // TRUE Cuando el formulario es valido
                },
                success: function(res) {
                            var form = this;
                            var result = res.error;
                            if(result == false){
                                toastr["success"]("OPERACIÓN REALIZADA CON ÉXITO!");
                                 setTimeout(function () { 
                                    location.reload();
                                    }, 3000);

                            }else{
                                toastr["error"]("SE PRODUJO UN ERROR, POR FAVOR INTENTELO MAS TARDE!");

                            }
                        }
			   });
});