$(document).ready(function(){
	$('#date-filter').datepicker( {
    format: "mm-yyyy",
    startView: "months", 
    minViewMode: "months",
    immediateUpdates:true,
    autoclose:true,
    language: 'es'
});

$('#date-filter').on('changeDate', function() {
   if ($(this).val() != '') {
   	var url = 'http://192.168.0.205/aplicaciones/index.php/reportes/getdatabymonth/'+ $(this).val();
	 $('#html').html('<i class="fa fa-circle-o-notch fa-spin" style="font-size:48px"></i>');
   $('#html').load(url, function(){
      var offset = 0;
      plot();
   var dayOfWeek = ["Sun", "Mon", "Tue", "Wed", "Thr", "Fri", "Sat"];
    function plot() {
       var options = {
            series: {
                lines: {
                    show: true
                },
                points: {
                    show: true
                }
            },
            grid: {
                hoverable: true //IMPORTANT! this is needed for tooltip to work
            },
            yaxis: {
                min: 0,
                max: 1500
            },
            xaxis: {
                 min: 0,
                 max: 31,
                 show:true,
                
                tickDecimals: 0
            },
            tooltip: true,
            tooltipOpts: {
                content: "Las llamadas %s del dia %x son %y",
                shifts: {
                    x: -60,
                    y: 25
                }
            }
        };

        var plotObj = $.plot($("#flot-line-chart"), [{
                data: terminadas,
                label: "Terminadas"
            }, {
                data: abandonadas,
                label: "Abandonadas"
            },
            {
                data: totales,
                label: "Totales"
            }

            ],
            options);
    }
   });
   }
	
});

 

});


