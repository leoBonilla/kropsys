        $(document).ready(function(){
            $('#form').validate({
                 onkeyup: false,
                 rules:{
                     celular: {
                     required: true,
                     minlength: 9,
                     maxlength: 9,
                    },
                 hora:{
                    required: true,
                     time24: true
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
                            var result = res.result;
                            if(result == true){
                                toastr["success"]("OPERACIÓN REALIZADA CON ÉXITO!");
                                 setTimeout(function () { 
                                     location.reload();
                                    }, 6000);

                            }else{
                                toastr["error"]("SE PRODUJO UN ERROR, POR FAVOR INTENTELO MAS TARDE!");
                                console.log(res);

                            }
                        }
             });


        });
        
            $('#select-especialidad').on('changed.bs.select',function(e){
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

      $('.datepicker').mask('00/00/0000');
$('.timepicker').mask('00:00');
$('.timepicker').clockpicker({
        default: 'now',
        donetext: 'OK',
        autoclose: true,
        placement: 'left',
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


