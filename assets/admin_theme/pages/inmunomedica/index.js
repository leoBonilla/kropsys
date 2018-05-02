$(document).ready(function(){

  

   var table = $('#inmunomedica_table').DataTable( {
        "ajax": {
           url: BASE_URL+"/inmunomedica/listar",
           method: 'post',
           data: function(d){
                d.fecha = $('#date-filter').val(),
                d.state = 1
           },
           beforeSend: function(){
               toastr['info']("OBTENIENDO DATOS...");
           },
         
          
        },
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal( {
                    header: function ( row ) {
                        var data = row.data();
                        return 'Detalles ';
                    }
                } ),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
                    tableClass: 'table table-striped'
                } )
            }
        },

        "columns": [
                 {"data": "FOLIO"},
                    
                 {"data": "FECHA"},
                 {"data": "HORA"},
                {"data": "RUT_PRESTADOR"},
                {"data": "PRESTADOR"},
                {"data": "SUCURSAL"},
                {"data": "PACIENTE"},
                {"data": "TELEFONO"},
                {"data": "EMAIL"},
                {"data": "EJECUTIVO"},
                {"data": "FECHA_REALIZACION"},
                {"data": "CELULAR"},
                {"data": "PREVISION"},
                {
                "mData": "ACCIONES",
                "mRender": function (data, type, row) {
                   // return '<input type="checkbox" class="state-checkbox" '+"data-id='"+row.FOLIO+"'"+' data-fecha= "'+row.FECHA+'"checked>';
                   return '<button type="button" data-toggle="confirmation" class="btn btn-xs btn-primary btn-confirm" data-id="'+row.FOLIO+'" data-fecha="'+row.FECHA+'  "checked"><i class="fa  fa-arrow-right"></i></button>';
                }
            }
             
               
        ],

         "columnDefs": [
        { responsivePriority: 1, targets: 0 },
        { responsivePriority: 2, targets: -1 }
    ],

       "fnDrawCallback": function() {
                     
                            $(".state-checkbox").bootstrapSwitch({size: "mini", onColor:"success", offColor:"danger"});
                        }
    } );

      var table2 = $('#inmunomedica_confirmados_table').DataTable( {
        "ajax": {
           url: BASE_URL+"/inmunomedica/listar",
           method: 'post',
           data: function(d){
                d.fecha = $('#date-filter').val(),
                d.state = 2
           },
           beforeSend: function(){
               //toastr['info']("OBTENIENDO DATOS...");
           },
         
          
        },
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal( {
                    header: function ( row ) {
                        var data = row.data();
                        return 'Detalles ';
                    }
                } ),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
                    tableClass: 'table table-striped'
                } )
            }
        },

        "columns": [
                 {"data": "folio"},
                 {"data": "fecha"},
                 {"data": "hora"},
                {"data": "rut_prestador"},
                {"data": "prestador"},
                {"data": "lugar"},
                {"data": "paciente"},
                {"data": "telefono"},
                {"data": "email"},
                {"data": "ejecutivo"},
                {"data": "fecha_realizacion"},
                {"data": "celular"},
                {"data": "prevision"},
                {"data": "fecha_confirmacion"},
                {"data": "confirmado_por_str"}
             
               
        ]
    } );
     var picker = $('#date-filter').datepicker({
        format: 'dd/mm/yyyy',
        startDate: '-0d',
        autoclose: true,
        weekStart: 1,
        language:"es"
    }
        ).datepicker("setDate",'now');

    picker.on('changeDate',function(e){
        updateTable(); 
    });


   $('#inmunomedica_table tbody').on('click','.btn-confirm', function () {
         sendpost($(this).data('id'),$(this).data('fecha'));
    } );


   var sendpost = function(id, fecha) {

     

          var __modal = $('#call-modal').modal('show');

          __modal.find('.modal-body').html('<div style="height:200px"><span id="searching_spinner_center" style="position: absolute;display: block;top: 50%;left: 50%;"><i class="fa fa-refresh fa-spin" style="font-size:46px"></i></span></div>');
          __modal.find('.modal-body').load(BASE_URL+'/inmunomedica/preparamodal',{fecha:fecha, id:id}, function(){
          __modal.find('.btn-close').confirmation();
          __modal.find('#observaciones').summernote({
                    lang: 'es-ES' 
              });
          var form = __modal.find('#confirmar_form');
                                   __modal.find('#btn-save').on('click', function(){
                                    var boton = $(this);
                                    boton.children().removeClass('fa-phone').addClass('fa-spinner fa-spin');
                                     $.post(BASE_URL + "/inmunomedica/markconfirmed", {id : id, fecha: fecha, uniqueId : $('#unique_id').val(), estado : $('#estado').val(), observaciones: $('#observaciones').val()  }, function(data){
                                           if(data.result== true){
                                              updateTable();
                                              __modal.modal('hide');
                                           }
                                          }).always(function(){
                            //  alert('done');
                              boton.children().removeClass('fa-spinner fa-spin').addClass('fa-save');
                             });
;
                                    
                                   });
          __modal.find('#btn-call').on('click', function(){
                        var boton = $(this);
                          boton.children().removeClass('fa-phone').addClass('fa-spinner fa-spin');
                          toastr['success']("GENERANDO LLAMADA, POR FAVOR ACEPTE PARA CONTINUAR...");
                        $.post(BASE_URL + "/inmunomedica/confirm", {id : id, fecha: fecha, number: $('#tocall').val() }, function(data){

                             if(data.respuestaOk == true){
                              toastr['info']("CONECTANDO CON NUMERO DE DESTINO...");
                                   __modal.find('#unique_id').val(data.uniqueId);
                                   __modal.find('#unique_id').val(data.uniqueId);

                                    // __modal.find('#btn-confirm').toggle().bootstrapSwitch().on('switchChange.bootstrapSwitch', function(event, state) {
                                    //     if(state == true){
                                          
                                    //       $.post(BASE_URL + "/inmunomedica/markconfirmed", {id : id, fecha: fecha }, function(data){
                                    //        if(data.result== true){
                                    //           updateTable();
                                    //           __modal.modal('hide');
                                    //        }
                                    //       });
                                    //     }
                                    //   });

                                }else{
                                   toastr['error']("PROBLEMAS GENERANDO LA LLAMADA...");
                                }
                             }).always(function(){
                            //  alert('done');
                              boton.children().removeClass('fa-spinner fa-spin').addClass('fa-phone');
                             });

          });

      });
   }

    var updateTable =function (){
         table.clear().draw();
         table2.clear().draw();
        table.ajax.reload();   
        table2.ajax.reload();     
    }

    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
  var target = $(e.target).attr("href") // activated tab
  $( $.fn.dataTable.tables(true) ).DataTable().responsive.recalc();
});

    ///
});


