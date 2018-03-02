$(function(){

         $('#especialidad').on('changed.bs.select',function(e){
                 var selector = $(this);
                 
                 $.ajax({
                        url : BASE_URL +'/seleccion/profesionales',
                         data : {id : selector.val()},
                        type : 'POST',
                        dataType : 'html',
                          beforeSend: function(){
                            $('#loading-indicator').show();
                          },
                          success : function(html) {


                              $('#profesional').html('');
                              $('#profesional').append(html);
                              $('#profesional').selectpicker('refresh');
                           
                        },
                           error : function(xhr, status) {
                              
                          },
                         complete : function(xhr, status) {
                            //alert('Petición realizada');
                             $('#loading-indicator').hide();
                        }});
            }); 

         $('.selectpicker').selectpicker().change(function(){
        $(this).valid()
    });
         var form = $('#form-llamada'); 

         form.find('.btn-generate-call').on('click', function(){
            form.validate({
                rules:{
                    'telefono':{
                                    minlength: 9
                        }
                }
            });
            btn = $(this);
           // console.log(form.valid());
             if(form.valid()){

                $.ajax({
                    type: 'POST',
                url: form.attr('action'),
                data: form.serialize(),
                success: function(data,status){
                      
                      if(data.respuestaOk==true){
                        console.log('Generacion de llamada exitosa');
                      }else{
                        toastr['error']("NO SE PUDO COMPLETAR EL REQUERIMIENTO DE LLAMADA");
                      }
                },
                beforeSend:function(){
                      toastr['info']("GENERANDO REQUERIMIENTO DE LLAMADA");
                      btn.find('i').removeClass('fa-phone').addClass('fa-refresh');
                             btn.find('i').addClass('fa-spin');
                                     btn.prop('disabled', true)
                },
                complete: function(){
                    btn.find('i').removeClass('fa-spin');
                    btn.find('i').addClass('fa-phone');
                    btn.prop('disabled', false);
                }
                });
              
             }else{
                form.find('label.error').addClass('animated flash');
                console.log('invalid');
             }
         });

	//$('.btn-generate-call').on('click',function(){
		// var boton = $(this);
  //       boton.prop('disabled', true);
		//     boton.find('i').removeClass('fa-phone').addClass('fa-refresh');
		// 	boton.find('i').addClass('fa-spin');
		// $.post(BASE_URL+'/llamadas/generar' ,{numero: $('input[name="telefono"]').val(), extension: $('#extension option:selected').text() }, function(data, status){
			    
  //       		if(data.uniqueId.length>0){
  //       				toastr["success"]("GENERANDO LLAMADA");
  //       		}else{
  //       			toastr['error']('PROBLEMA AL GENERAR LA LLAMADA.' + data.message);
  //       		}
  //       		boton.find('i').removeClass('fa-spin');
  //       		boton.find('i').addClass('fa-phone');
  //               boton.prop('disabled', false);
  //   		});
	//});

});