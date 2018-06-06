  var m1 = $('#optgroup').multiSelect({ selectableOptgroup: true,
       selectableHeader: "<span class='label label-primary'>previsiones disponibles</span>",
       selectionHeader: "<span class='label label-primary'>previsiones agregadas</span>" ,afterSelect: function(values){
      //console.log(alert("Select value: "+values));
  },
  afterDeselect: function(values){
    //console.log(alert("Select value: "+values));
   }});

  $('#convenios_creation_first').ajaxForm({

      success: function(res, status, xhr, form) {
              $('#html').html(res);
              $('#html').find('#confirm_convenio').ajaxForm();
    }
  }
    );

  // var m2 = $('#optgroup1').multiSelect({ selectableOptgroup: true,
  //      selectableHeader: "<span class='label label-primary'>Permisos disponibles</span>",
  //      selectionHeader: "<span class='label label-primary'>Permisos actuales</span>", afterSelect: function(values){


  //     $.each(values,function(index,value){
  //       console.log(value);
  //     });
  //     sendAjaxPostRequest(ADMIN_BASE_URL + '/users/updateroles',{data : values, id: $('#identifier').data('identifier')},{smsg:'PERMISOS AGREGADOS CON ÉXITO',fmsg:''});

  // },
  // afterDeselect: function(values){
  //  // alert("Deselect value: "+values);
  //   sendAjaxPostRequest(ADMIN_BASE_URL + '/users/updateroles',{data : values, id: $('#identifier').data('identifier')},{smsg:'PERMISOS REMOVIDOS CON ÉXITO',fmsg:''});
  // } });