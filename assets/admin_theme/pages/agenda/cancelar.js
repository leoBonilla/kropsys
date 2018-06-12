$(document).ready(function(){
	var daterange = $('#fechas').daterangepicker();
	daterange.on('apply.daterangepicker', function(ev, picker) {
	var inicio = picker.startDate.format('YYYY-MM-DD');
	var fin = picker.endDate.format('YYYY-MM-DD');
	var idmedico = $('#medico').val();

	$.post(BASE_URL + '/agenda/buscar_horas', {inicio: inicio, fin : fin, idmedico : idmedico}, function(data){
		$('#result').html(data);
	})
       
});
});