$(document).ready(function(){

 var rangepicker = $('#date-picker').daterangepicker(rangeOptions);

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