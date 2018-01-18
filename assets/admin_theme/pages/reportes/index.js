$(document).ready(function(){
// $("#date-picker").datepicker( {
//     format: "mm-yyyy",
//     startView: "months", 
//     minViewMode: "months",
//     language:"es",
//     setDate: new Date(),
//     todayHighlight: true,
//     autoclose: true
// });
// 
 var rangepicker = $('#date-picker').daterangepicker({
     ranges: {
                'hoy': [moment(), moment()],
                'Ayer': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Ultimos 7 días': [moment().subtract(6, 'days'), moment()],
                'Ultimos 15 días': [moment().subtract(14, 'days'), moment()],                       
                'Este mes': [moment().startOf('month'), moment().endOf('month')]                   
            },

     "locale": {
        "format": "DD/MM/YYYY",
        "separator": " - ",
        "applyLabel": "Aplicar",
        "cancelLabel": "Cancelar",
        "fromLabel": "Desde",
        "toLabel": "Hasta",
        "customRangeLabel": "Personalizado",
        "daysOfWeek": [
            "Dom",
            "Lun",
            "Mar",
            "Mie",
            "Jue",
            "Vie",
            "Sab"
        ],
        "monthNames": [
            "Enero",
            "Febrero",
            "Marzo",
            "Abril",
            "Mayo",
            "Junio",
            "Julio",
            "Agosto",
            "Septiembre",
            "Octubre",
            "Noviembre",
            "Diciembre"
        ],
        "firstDay": 1
    }
 });

 rangepicker.on('cancel.daterangepicker', function(ev, picker) {
 
});
 //cuando se envia una fecha valida
  rangepicker.on('apply.daterangepicker', function(ev, picker) {
          var rangepicker = $(this);
          var dates = rangepicker.val().split(' - '); 
          $
          container = $('#container-load');
          container.html("<i class='fa fa-refresh fa-spin fa-3x '></i>");

          container.load(BASE_URL + "/reportes/load",{inicio: dates[0], fin: dates[1]}, function(){
            google.charts.load('current', {'packages':['corechart']});

      // Draw the pie chart and bar chart when Charts is loaded.
         google.charts.setOnLoadCallback(drawChart);

     
          });


});



});