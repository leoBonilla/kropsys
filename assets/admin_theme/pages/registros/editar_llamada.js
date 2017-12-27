$(document).ready(function(){

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


$('#estado_select').change(function(){
 $('#btn-state').prop('disabled',false);
 if($("#estado_select option:selected").text() ==='OTRO'){
   $('#confirmar_div').hide();
   $('#otro_wrapper').show();
 }else{
   $('#otro_wrapper').hide();
   if($("#estado_select option:selected").text() ==='CONTACTADO'){
       $('#confirmar_div').show();
       
   }else{
     $('#confirmar_div').hide();
   }
    
 }
});

$('#form_update').validate({ // initialize the plugin
        // any other options,
        onkeyup: false,
        rules: {
            id_estado :{
              required: true,
            },
        fecha_cita :{
              required: function(element){
                  return $("#estado_select").val()=="4";
            }
        } ,
        hora_cita :{
              required: function(element){
                  return $("#estado_select").val()=="4";
            }
          },
        especialidad :{
              required: function(element){
                  return $("#estado_select").val()=="4";
            }
        },
        profesional :{
              required: function(element){
                  return $("#estado_select").val()=="4";
            }
        },
        lugar :{
              required: function(element){
                  return $("#estado_select").val()=="4";
            }
        } ,

        otro :{
              required: function(element){
                  return $("#estado_select").val()=="3";
            }
        } ,         
        },
        messages: {
            //...
        }
    });

$('#form_update').ajaxForm({

  beforeSubmit: function () {
            return $("#form_update").valid(); // TRUE when form is valid, FALSE will cancel submit
        },
  success: function(res){
    if(res.result == true){

            toastr["success"]("OPERACIÓN REALIZADA CON ÉXITO!");
                                 setTimeout(function () { 
                                     location.reload();
                                    }, 3000);
    }

 }
});


        
});