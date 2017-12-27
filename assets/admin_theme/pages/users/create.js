  $(document).ready(function(){
            $('#form').validate({
                 onkeyup: false,
                 rules:{
                     email:{
						 email:true,
					 }
                 }
            });
           
             $('#form').ajaxForm({
                beforeSubmit: function () {
                     $('#form').find('#submit-btn').val("Espere por favor...").click(function(e){
                        e.preventDefault();
                        return false;
                    });
                    return $("#form").valid(); // TRUE Cuando el formulario es valido
                },
                success: function(res) {
                            var form = this;
                            
                            if(res.error == false){
                                toastr["success"]("USUARIO CREADO CON ÉXITO!");
                                 setTimeout(function () { 
                                     location.reload();
                                    }, 6000);

                            }else{
								//swal ( "Se produjo un error" ,  "Something went wrong!" ,  "error" );
								swal({
										  title: '<i>HUBO UN ERROR</u>',
										  type: 'error',
										  text : '' + res.data.errors,
										  html: true,
										  showCloseButton: true,
										  //showCancelButton: true,
										  focusConfirm: false
										  //confirmButtonText:'<i class="fa fa-thumbs-up"></i> Great!',
										 // confirmButtonAriaLabel: 'Thumbs up, great!',
										 // cancelButtonText: '<i class="fa fa-thumbs-down"></i>',
										  //cancelButtonAriaLabel: 'Thumbs down',
										})
								console.log(res.data.errors);
                                toastr["error"]("SE PRODUJO UN ERROR, POR FAVOR INTENTELO MAS TARDE!");

                            }
                        }
             });


        });
		
		$('#password_button').on('click',function(){
			$('#password_field').val(randomPassword(8));
		});
        
        
        
            jQuery.extend(jQuery.validator.messages, {
                required: "Este campo es obligatorio.",
                remote: "Por favor, rellena este campo.",
                email: "Por favor, escribe una dirección de correo válida",
                url: "Por favor, escribe una URL válida.",
                date: "Por favor, escribe una fecha válida.",
                dateISO: "Por favor, escribe una fecha (ISO) válida.",
                number: "Por favor, escribe un número entero válido.",
                digits: "Por favor, escribe sólo dígitos.",
                creditcard: "Por favor, escribe un número de tarjeta válido.",
                equalTo: "Por favor, escribe el mismo valor de nuevo.",
                accept: "Por favor, escribe un valor con una extensión aceptada.",
                maxlength: jQuery.validator.format("Por favor, no escribas más de {0} digitos."),
                minlength: jQuery.validator.format("Por favor, no escribas menos de {0} digitos."),
                rangelength: jQuery.validator.format("Por favor, escribe un valor entre {0} y {1} caracteres."),
                range: jQuery.validator.format("Por favor, escribe un valor entre {0} y {1}."),
                max: jQuery.validator.format("Por favor, escribe un valor menor o igual a {0}."),
                min: jQuery.validator.format("Por favor, escribe un valor mayor o igual a {0}.")
});

  