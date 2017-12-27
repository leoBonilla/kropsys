$(function(){

  $('input.llamada').keyup(function() {
     var button = $(this).closest('div').find('button');

        if($(this).val().length == 9) {
          button.prop("disabled", false);

        }else{
          button.prop("disabled", true);
        }
     });

$('.datepicker').datepicker({
    format: 'dd/mm/yyyy',
    language: 'es',
    autoclose:true,

    todayHighlight: true,
    title: 'Seleccione fecha',
});

$('[data-toggle=confirmation]').confirmation({
  rootSelector: '[data-toggle=confirmation]',
  btnOkLabel: 'Si',
  btnCancellLabel : 'No'
});

var call_form = $('#call_form');
var main_form = $('#main_form');
call_form.ajaxForm({
  success: function(res){
      toastr["success"]("OPERACIÓN REALIZADA CON ÉXITO!");
                                 setTimeout(function () { 
                                      location.reload();
                                    }, 3000);
  }
});

main_form.ajaxForm({
  success: function(res){
      toastr["success"]("OPERACIÓN REALIZADA CON ÉXITO!");
                                 setTimeout(function () { 
                                     location.reload();
                                    }, 3000);
  }
});

$('.timepicker').mask('00:00');
$('.timepicker').clockpicker({
        default: 'now',
        donetext: 'OK',
        autoclose: true,
        placement: 'top',
    });

$('#estado_select').change(function(){
 $('#btn-state').prop('disabled',false);
 if($("#estado_select option:selected").text() ==='OTRO'){
   $('#confirmar_div').hide();
   $('#otro_wrapper').show();

 }else{
   $('#otro_wrapper').hide();
   console.log($("#estado_select option:selected").text());
   if($("#estado_select option:selected").text() ==='CONTACTADO'){

       $('#confirmar_div').show();
       $('#btn-state').prop('disabled', true);
       //desabilitar el boton o escondereolo coandaod dkf
   }else{
     $('#confirmar_div').hide();
   }
    
 }
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
  var btnCall = $('.btn-call');
  btnCall.on('click', function(){

    var numero = $(this).closest('div').find('input').val();
    var intento =  $(this).closest('div').find('input').attr('name');
    var subtask_id = $('#sub_id').val();
    var anexo = $('#anexo').val();
    var task_id = $('#task_id').val();

    $.ajax({
        url: BASE_URL+'/apicall/call',
        dataType: 'json',
            type: 'post',
            //data: {numero: numero, anexo: 4021},
            data: {numero: numero, anexo: anexo},
        success: function (data) {

             if(data.respuestaOk === true){
              var uniqueId = data.uniqueId;
              console.log(uniqueId);
              $('#numero_form, #numt').val(numero);
              $('#numero_telef').html(numero);
              $('#call_id_form, #uqid').val(uniqueId);
              $('#callModal').modal({
                  backdrop: 'static',
                  keyboard: false
                  });
              }else{
                toastr["error"]("ALGO SALIO MAL, POR FAVOR INTENTELO MAS TARDE, " + data.mensaje);
                                 setTimeout(function () { 
                                     //location.reload();
                                    }, 6000);
              }
             if(data.respuestaOk === false){
              //alert(data.mensaje);
             } 
         }
});


  });
});



