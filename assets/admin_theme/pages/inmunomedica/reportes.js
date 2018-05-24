$(document).ready(function(){
	$('#date-filter').datepicker( {
    format: "mm-yyyy",
    startView: "months", 
    minViewMode: "months",
    immediateUpdates:true,
    autoclose:true
});

$('#date-filter').on('changeDate', function() {
   if ($(this).val() != '') {
   	var url = 'http://192.168.0.205/aplicaciones/index.php/reportes/getdatabymonth/'+ $(this).val();
	 $('#html').html('<i class="fa fa-circle-o-notch fa-spin" style="font-size:48px"></i>');
   $('#html').load(url, function(){
   
   });
   }
	
});



});