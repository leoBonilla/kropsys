$(document).ready(function(){
	var rangepicker = $('#date-filter').daterangepicker(rangeOptions);
	  rangepicker.on('apply.daterangepicker', function(ev, picker) {
        var dates = rangepicker.val().split(' - '); 
        var inicio = dates[0].replace("/g", "-");
        var fin = dates[1].replace("/g", "-");
        var data = { inicio: inicio, fin:fin };
        post(BASE_URL+ '/inmunomedica/reporte_espera_p', data);
      });
});


function post(url , data){
	$.ajax({
	  type: "POST",
	  url: url,
	  data: data,
	  beforeSend: function () {
                        $("#html").html("Procesando, espere por favor...");
                },
	  success: function(response){
	  		 $("#html").html(response);
	  }
});
}