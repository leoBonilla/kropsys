$(document).ready(function(){
// Toolbar extra buttons
var btnFinish = $('<button type="submit"></button>').html('Enviar <i class="fa fa-send"></i>')
                                 .addClass('btn btn-info disabled btn-finish')
                                 .on('click', function(e){ 
                                    e.preventDefault();
                                        if( !$(this).hasClass('disabled')){ 
                                            var elmForm = $("#form-sms");

                                            if(elmForm){
                                                elmForm.validator('validate'); 
                                                var elmErr = elmForm.find('.has-error');
                                                console.log(elmErr);
                                                if(elmErr && elmErr.length > 0){
                                                    toastr["warning"]("SE ENCONTRARON ERRORES!, POR FAVOR REVISE EL FORMULARIO");
                                                    console.log('error');
                                                    return false;    
                                                }else{
                                                     $.ajax( {
                                                          type: "POST",
                                                          url: elmForm.attr( 'action' ),
                                                          data: elmForm.serialize(),
                                                          success: function( response ) {
                                                            var result = response.result;
                                                                if(result == true){
                                                                    toastr["success"]("OPERACIÓN REALIZADA CON ÉXITO!");
                                                                     setTimeout(function () { 
                                                                         window.location.href = BASE_URL +'/sms/enviar';
                                                                        }, 6000);

                                                                }else{
                                                                    toastr["error"]("SE PRODUJO UN ERROR, POR FAVOR INTENTELO MAS TARDE!");
                                                                    //console.log(res);

                                                                }
                                                          }
                                                        } );
                                                     
                                                    return false;
                                                }
                                            }
                                        }
                                    });
var btnCancel = $('<button></button>').text('Cancelar')
                                 .addClass('btn btn-danger')
                                 .on('click', function(){ 
                                        $('#smartwizard').smartWizard("reset"); 
                                        //$('#myForm').find("input, textarea").val(""); 
                                        $('.selectpicker').val('');
                                        $('.selectpicker').selectpicker("refresh");
                                        $('#form-sms').resetForm();
                                    });                         
            
 $('#smartwizard').smartWizard({
    theme:'arrows',
    lang:{ next:'Siguiente', previous:'Anterior'},
    transitionEffect:'fade',
    toolbarSettings:{
        showNextButton: true,
        toolbarExtraButtons: [btnFinish, btnCancel]
    },
     anchorSettings: {
                                markDoneStep: true, // add done css
                                markAllPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
                                removeDoneStepOnNavigateBack: true, // While navigate back done step after active step will be cleared
                                enableAnchorOnDoneStep: true // Enable/Disable the done steps navigation
                            }
 });

                                                     $("#smartwizard").on("leaveStep", function(e, anchorObject, stepNumber, stepDirection) {
                                                            var elmForm = $("#form-step-" + stepNumber);
                                                            // stepDirection === 'forward' :- this condition allows to do the form validation 
                                                            // only on forward navigation, that makes easy navigation on backwards still do the validation when going next
                                                            if(stepDirection === 'forward' && elmForm){
                                                                elmForm.validator('validate'); 
                                                                var elmErr = elmForm.children('.has-error');
                                                                if(elmErr && elmErr.length > 0){
                                                                    // Form validation failed
                                                                    return false;    
                                                                }
                                                            }
                                                            return true;
                                                        });
            
            $("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection) {
                console.log(stepNumber);
                $('#item-1').html($('input[name="paciente"]').val());
                $('#item-2').html($('input[name="celular"]').val());
                $('#item-3').html($("#select-especialidad option:selected").text());
                $('#item-4').html($("#select-profesional option:selected").text());
                $('#item-5').html($('input[name="fecha"]').val()+' a las '+ $('input[name="hora"]').val() + ' Horas');
                $('#item-6').html($("#lugar option:selected").text());
                // Enable finish button only on last step
                if(stepNumber == 3){ 
                    $('.btn-finish').removeClass('disabled');  
                }else{
                    $('.btn-finish').addClass('disabled');
                }
            });  

$('#select-especialidad').on('changed.bs.select',function(e){
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


                              $('#select-profesional').html('');
                              $('#select-profesional').append(html);
                              $('#select-profesional').selectpicker('refresh');
                           
                        },
                           error : function(xhr, status) {
                              
                          },
                         complete : function(xhr, status) {
                            //alert('Petición realizada');
                             $('#loading-indicator').hide();
                        }});
            }); 
var tempPhone = '';
$('input[name="paciente"]').typeahead({
            source: function (query, result) {
                $.ajax({
                    url: BASE_URL + '/seleccion/pacientes',
                    data: 'query=' + query,            
                    dataType: "json",
                    type: "POST",
                    success: function (data) {
                        result($.map(data, function (item) {
                            //var array = item.split('-');
                           // $('input[name="celular"]').val(array[1]);
                           // return array[0];
                           return item.patient+ '<span style="display:none;">'+item.number+'</span>';
                        }));
                    }
                });
            },
            updater: function(item){
                 $('#loading-indicator').show();
               //console.log(item);
                var html = '<p>'+ item + '</p>';
                var element =$(html);
                numero = element.find('span').html();
                element.find('span').remove();
                var name = $.trim(element.html());
                $('input[name="celular"]').val('');
                setTimeout(function(){
                    $('#loading-indicator').hide();
                    $('input[name="celular"]').val($.trim(numero));
                },1000);
                return name;
            }
        });
$('input[name="paciente').on('keydown', function(e) {
    if( e.which == 8 || e.which == 46 ) 
        $('input[name="celular"]').val('');
        return true;
});
$('.datepicker').mask('00/00/0000');
$('.timepicker').mask('00:00');
$('.timepicker').clockpicker({
        default: 'now',
        donetext: 'OK',
        autoclose: true,
        placement: 'right',
    });

});