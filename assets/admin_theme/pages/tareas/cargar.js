  $(function () {
                // $('#datepicker').datepicker({
                // 	 language: 'es',
                // 	 todayHighlight: true,
                // });

$('#datepicker').mask('00/00/0000');
$('#timepicker').mask('00:00');
$('#timepicker').clockpicker({
        default: 'now',
        donetext: 'OK',
        autoclose: true,
        placement: 'bottom',
    });
$('#datepicker').datepicker({
    format: 'dd/mm/yyyy',
    language: 'es',
    autoclose:true,
    todayHighlight: true,
    title: 'Seleccione fecha',
});



});