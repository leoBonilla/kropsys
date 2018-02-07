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

    if($("input[name=tipo]").val()== 'confirmaciones' || $("input[name=tipo]").val()== 'otros'){
      $.validator.addMethod("sumaPacientes", function(value, element) { 
         var conf = Number($("input[name=confirmadas]").val());
         var no_cont = Number($("input[name=no_contestaron]").val());
         var rec_anula = Number($('input[name=rechazos]').val());
         var rea = Number($('input[name=reasignadas]').val());
         var err = Number($('input[name=erroneos]').val());
         var pac = Number($('input[name=pacientes]').val());
         var sum = conf + no_cont + rec_anula + rea + err;
         if(sum === pac){
            return true;
         } 
    return false;
                }, "La suma para el total de pacientes no es correcta");  
    }

     if($("input[name=tipo]").val()== 'reasignaciones'){
       $.validator.addMethod("sumaPacientes", function(value, element) { 
         var pac = Number($('input[name=pacientes]').val());
         var pagen = Number($('input[name=agendados]').val());
         var no_cont = Number($("input[name=no_contestaron]").val());
         var rec_anula = Number($('input[name=rechazos]').val());
         var hasig = Number($("input[name=h_y_asignadas]").val());
         var scupo = Number($('input[name=sin_cupo]').val());
         var err = Number($('input[name=erroneos]').val());

         var sum = pagen+ no_cont + rec_anula + hasig + scupo + err;
         if(sum === pac){
            return true;
         } 
    return false;
                }, "La suma para el total de pacientes no es correcta");
    }
   

var form =  $('#edit-form').validate({ rules:{
            pacientes : "sumaPacientes",
        }});
	$('#edit-form').ajaxForm({
		  beforeSubmit: function () {
            return form.valid(); // TRUE when form is valid, FALSE will cancel submit
        },
 		 success: function(res){
   		 if(res.result == true){

            toastr["success"](res.message);
                                 setTimeout(function () { 
                                     location.reload();
                                    }, 3000);
    	}

 }
	});

$('.datepicker').datepicker({
        format: 'dd/mm/yyyy',
        language: 'es',
        autoclose: true,
        todayHighlight: true,
        title: 'Seleccione fecha',
        daysOfWeekDisabled: [0, 6],
        weekStart: 1
    });

});