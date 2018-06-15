$(document).ready(function(){
	var rangepicker = $('#date-filter').daterangepicker(rangeOptions);
	  rangepicker.on('apply.daterangepicker', function(ev, picker) {
        var dates = rangepicker.val().split(' - '); 
        var inicio = dates[0].replace("/g", "-");
        var fin = dates[1].replace("/g", "-");
        var data = { inicio: inicio, fin:fin };
        post(BASE_URL+ '/inmunomedica/reporte_motivos_p', data);
      });

      rangepicker.trigger( "apply.daterangepicker" );
});


function post(url , data){
	$.ajax({
	  type: "POST",
	  url: url,
	  data: data,
	  beforeSend: function () {
                        $("#html").html("<i class='fa fa-refresh fa-spin fa-3x' style='color:#2F78B6;'></i><br/><br /><p>Obteniendo datos...</p>");
                },
	  success: function(response){
	  		 $("#html").html(response);
	  }
});
}