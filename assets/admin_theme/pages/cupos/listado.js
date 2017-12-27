$(document).ready(function(){

var datepicker = $('.datepicker').mask('00/00/0000');  
          $('.datepicker').datepicker({
                format: 'dd/mm/yyyy',
                language: 'es',
                autoclose:true,
                todayHighlight: true,
                title: 'Seleccione fecha',
                daysOfWeekDisabled: [0,6],
                weekStart: 1
        });
var ctable = $('#cupos_table').on('xhr.dt', function(e, settings, json, xhr){

       $('#header_1').text(json.data[0].fecha_1);
    $('#header_2').text(json.data[0].fecha_2);
    $('#header_3').text(json.data[0].fecha_3);
    $('#header_4').text(json.data[0].fecha_4);
    $('#header_5').text(json.data[0].fecha_5);
    $('#header_6').text(json.data[0].fecha_6);
    $('#header_7').text(json.data[0].fecha_7);

    $('#footer_1').text(json.data[0].fecha_1);
    $('#footer_2').text(json.data[0].fecha_2);
    $('#footer_3').text(json.data[0].fecha_3);
    $('#footer_4').text(json.data[0].fecha_4);
    $('#footer_5').text(json.data[0].fecha_5);
    $('#footer_6').text(json.data[0].fecha_6);
    $('#footer_7').text(json.data[0].fecha_7);
 



  
}).DataTable({
   	 	"ajax": {
            url : BASE_URL+ '/webapi/listarcupos',
            type: "POST",
            data:  function ( d ) {
                 //console.log('fecha actual : '+ moment().format("YYYY-MM-DD"));
                if(datepicker.val()==''){
                    d.fecha = moment().format("YYYY-MM-DD"); 

                }else{
                    var temp = datepicker.val();
                    var temp = temp.split('/');
                    var f = temp[2] + "-" +temp[1] + "-" +temp[0]; 
                    d.fecha = f;
                }
               
            },

            complete: function(data, type){
                 // console.log(data.data[0].fecha_1);
                
                }
        },
         // "dom" : '<"toolbar">frtip',
	 	 "columns": [
            { "data": "especialidad" },
            { "data": "cupo_1" ,
            "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                var _class = '';
                if(sData > 0){
                    _class = 'badge';
                }
            $(nTd).html("<a href='detalle/"+oData.id_especialidad+"/"+oData.fecha_1+ "'><span class='"+_class+"'>"+sData+"</a>");

        }},
            { "data": "cupo_2" ,

            "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                  var _class = '';
                if(sData > 0){
                    _class = 'badge';
                }
            $(nTd).html("<a href='detalle/"+oData.id_especialidad+"/"+oData.fecha_2+ "'><span class='"+_class+"'>"+sData+"</a>");
        }
        },
            { "data": "cupo_3" ,
            "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                  var _class = '';
                if(sData > 0){
                    _class = 'badge';
                }
           $(nTd).html("<a href='detalle/"+oData.id_especialidad+"/"+oData.fecha_3+ "'><span class='"+_class+"'>"+sData+"</a>");
        }
        },
            { "data": "cupo_4",
            "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                  var _class = '';
                if(sData > 0){
                    _class = 'badge';
                }
            $(nTd).html("<a href='detalle/"+oData.id_especialidad+"/"+oData.fecha_4+ "'><span class='"+_class+"'>"+sData+"</a>");
        }
          },
            { "data": "cupo_5" ,
            "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                  var _class = '';
                if(sData > 0){
                    _class = 'badge';
                }
           $(nTd).html("<a href='detalle/"+oData.id_especialidad+"/"+oData.fecha_5+ "'><span class='"+_class+"'>"+sData+"</a>");
        }
        },
            { "data": "cupo_6" ,
            "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                  var _class = '';
                if(sData > 0){
                    _class = 'badge';
                }
           $(nTd).html("<a href='detalle/"+oData.id_especialidad+"/"+oData.fecha_6+ "'><span class='"+_class+"'>"+sData+"</a>");
        }
        },
            { "data": "cupo_7",
            "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                  var _class = '';
                if(sData > 0){
                    _class = 'badge';
                }
            $(nTd).html("<a href='detalle/"+oData.id_especialidad+"/"+oData.fecha_7+ "'><span class='"+_class+"'>"+sData+"</a>");
        }

        },

          

        ],
//     initComplete: function(){
//       $("div.toolbar")
//          .html('<input type="text" id="date_field" class="form-control datepicker">'); 
//           $('.datepicker').mask('00/00/0000');  
//           $('.datepicker').datepicker({
//     format: 'dd/mm/yyyy',
//     language: 'es',
//     autoclose:true,
//     todayHighlight: true,
//     title: 'Seleccione fecha',
// });        
//    } 
       
	 });

     //$("div.toolbar").html('<b>Custom tool bar! Text/images etc.</b>');
    // console.log($("div.toolbar"));
     $('#date_filter_btn').on('click',function(){
        ctable.ajax.reload();
        
    });

});