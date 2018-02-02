$(document).ready(function(){

var chkinstancia_ag = $("[name='instancia_ag']").bootstrapSwitch();
chkinstancia_ag.on('switchChange.bootstrapSwitch', function(event, state) {
    $('#instancia-select-ag').toggle();
     if(state){
      $('#num-instancia_ag').val('1');
      $('#select_instancia_ag').val('');
      $('#select_instancia_ag').selectpicker("refresh");
     }

});

$('#select_instancia_ag').on('changed.bs.select',function(e){
  console.log();
  $('#num-instancia_ag').val(($(this).val()));
});

/* ==========================================================================================*/

var chkinstancia_re = $("[name='instancia_re']").bootstrapSwitch();
chkinstancia_re.on('switchChange.bootstrapSwitch', function(event, state) {
    $('#instancia-select-re').toggle();
     if(state){
      $('#num-instancia_re').val('1');
      $('#select_instancia_re').val('');
      $('#select_instancia_re').selectpicker("refresh");
     }

});

$('#select_instancia_re').on('changed.bs.select',function(e){
  $('#num-instancia_re').val(($(this).val()));
});


/* ==========================================================================================*/


var chkinstancia_conf = $("[name='instancia_conf']").bootstrapSwitch();
chkinstancia_conf.on('switchChange.bootstrapSwitch', function(event, state) {
    $('#instancia-select-conf').toggle();
     if(state){
      $('#num-instancia_conf').val('1');
      $('#select_instancia_conf').val('');
      $('#select_instancia_conf').selectpicker("refresh");
     }

});

$('#select_instancia_conf').on('changed.bs.select',function(e){
  console.log();
  $('#num-instancia_conf').val(($(this).val()));
});


/* ==========================================================================================*/

var chkinstancia_otr = $("[name='instancia_otr']").bootstrapSwitch();
chkinstancia_otr.on('switchChange.bootstrapSwitch', function(event, state) {
    $('#instancia-select-otr').toggle();
     if(state){
      $('#num-instancia_otr').val('1');
      $('#select_instancia_otr').val('');
      $('#select_instancia_otr').selectpicker("refresh");
     }

});

$('#select_instancia_otr').on('changed.bs.select',function(e){
  console.log();
  $('#num-instancia_otr').val(($(this).val()));
});


/* ==========================================================================================*/




             
   $('#myTab a').click(function(e) {
        e.preventDefault();
            $(this).tab('show');
        });



   $.validator.addMethod("sumConfirmaciones", function(value, element) { 
         var conf = Number($("#form_confirmaciones input[name=confirmadas]").val());
         var no_cont = Number($("#form_confirmaciones input[name=no_contestaron]").val());
         var rec_anula = Number($('#form_confirmaciones input[name=rechazos_anulaciones]').val());
         var rea = Number($('#form_confirmaciones input[name=reasignadas]').val());
         var err = Number($('#form_confirmaciones input[name=erroneos]').val());
         var pac = Number($('#form_confirmaciones input[name=pacientes]').val());
         var sum = conf + no_cont + rec_anula + rea + err;
         if(sum === pac){
            return true;
         } 
    return false;
                }, "La suma para el total de pacientes no es correcta");

   $.validator.addMethod("sumReasignaciones", function(value, element) { 
         var pac = Number($('#form_reasignaciones input[name=pacientes]').val());
         var pagen = Number($('#form_reasignaciones input[name=p_agendados]').val());
         var no_cont = Number($("#form_reasignaciones input[name=no_contestaron]").val());
         var rec_anula = Number($('#form_reasignaciones input[name=rechazos_anulaciones]').val());
         var hasig = Number($("#form_reasignaciones input[name=hora_ya_asignada]").val());
         var scupo = Number($('#form_reasignaciones input[name=sin_cupo]').val());
         var err = Number($('#form_reasignaciones input[name=erroneos]').val());

         var sum = pagen+ no_cont + rec_anula + hasig + scupo + err;
         if(sum === pac){
            return true;
         } 
    return false;
                }, "La suma para el total de pacientes no es correcta");

       $.validator.addMethod("sumOtros", function(value, element) { 
         var conf = Number($("#form_otros input[name=confirmadas]").val());
         var no_cont = Number($("#form_otros input[name=no_contestaron]").val());
         var rec_anula = Number($('#form_otros input[name=rechazos_anulaciones]').val());
         var rea = Number($('#form_otros input[name=reasignadas]').val());
         var err = Number($('#form_otros input[name=erroneos]').val());
         var pac = Number($('#form_otros input[name=pacientes]').val());
         var sum = conf + no_cont + rec_anula + rea + err;
         if(sum === pac){
            return true;
         } 
    return false;
                }, "La suma para el total de pacientes no es correcta");

       var form1 =  $('#form_agendamiento').validate();
	   var form2 = $('#form_reasignaciones').validate({
        rules:{
            pacientes : "sumReasignaciones"
        }
       });
	   var form3 = $('#form_confirmaciones').validate({
        rules:{
            pacientes : "sumConfirmaciones",
        }
       });
       var form4 = $('#form_otros').validate({
        rules:{
            pacientes : "sumOtros",
        }
       });
         $('#form_agendamiento,#form_reasignaciones,#form_confirmaciones,#form_otros').ajaxForm({
                beforeSubmit: function () {
					var form = $(this);
					form.find('.btn-submit').prop('value','Espeer');
				   
                },
                success: function(res) {
                            
                        
                            if(res.error == false){
                                toastr["success"]("GUARDADO CON EXITO!");
                                 setTimeout(function () { 
                                    location.reload();
                                    }, 1000);

                            }else{
                                toastr["error"]("SE PRODUJO UN ERROR, POR FAVOR INTENTELO MAS TARDE!");

                            }
                        }
          });

$('#select-especialidad-agendamiento,#select-especialidad-reasignaciones,#select-especialidad-confirmaciones,#select-especialidad-otros').on('changed.bs.select',function(e){
                 var form = $(this).parents('form:first');
var selector = $(this);
                        $.ajax({
                        url : BASE_URL +'/seleccion/profesionales',
                         data : {id : selector.val()},
                        type : 'POST',
                        dataType : 'html',
                          success : function(html) {
                            var id = selector.attr('id');
                            var element_id = '' ;
                             if(id == 'select-especialidad-agendamiento'){
                                
                               element_id = '#select-profesional-agendamiento';
                             }
                              if(id == 'select-especialidad-reasignaciones'){
                                
                               element_id = '#select-profesional-reasignaciones';
                             }

                            if(id == 'select-especialidad-confirmaciones'){
                                
                               element_id = '#select-profesional-confirmaciones';
                             }

                            if(id == 'select-especialidad-otros'){
                                
                               element_id = '#select-profesional-otros';
                             }



                              $(element_id).html('<option value="" ></option>');
                              $(element_id).append(html);
                              $(element_id).selectpicker('refresh');
                           
                        },
                           error : function(xhr, status) {
                              
                          },
                         complete : function(xhr, status) {
                            //alert('Petición realizada');
                            
                        }});
           
        
           });

});
