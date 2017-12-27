$(document).ready(function(){
  $('#especialidad').on('changed.bs.select',function(e){
                        $.ajax({
                        url : BASE_URL +'/seleccion/profesionales',
                         data : {id : $(this).val()},
                        type : 'POST',
                        dataType : 'html',
                          success : function(html) {
                         
                              $('#profesionales').html('<option value="" ></option>');
                              $('#profesionales').append(html);
                              $('#profesionales').selectpicker('refresh');
                           
                        },
                           error : function(xhr, status) {
                              
                          },
                         complete : function(xhr, status) {
                            //alert('Petición realizada');
                            
                        }});
           
        
           });


  var form = $('#form_edit');
  form.validate({

    rules : {
            p_agendados : {
              required: true,
              digit : true
            },
            no_contestaron:{
              required: true,
              digit : true
            },
            rechazos:{
              required: true,
              digit : true
            },
            ya_asignadas:{
              required: true,
              digit : true
            },
            erroneo:{
              required: true,
              digit : true
            }
    },

    submitHandler: function(form) {
        $.ajax({
            url: form.action,
            type: form.method,
            data: $(form).serialize(),
            success: function(response) {
                console.log(response);
            }            
        });
    }
});
});