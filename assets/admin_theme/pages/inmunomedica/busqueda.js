$(document).ready(function(){
$('input[name="search"]').typeahead(
{           
	        items: '15',
			source: function (query, result) {
                $.ajax({
                    url: BASE_URL + '/examenes/searching',
                    data: {query:query},            
                    dataType: "json",
                    type: "POST",
                    beforeSend: function(xhr){
                    	$('#html').html('<p>Cargando datos</p>');
                    },
                    success: function (data) {
                        result($.map(data, function (item) {
                            //var array = item.split('-');
                           // $('input[name="celular"]').val(array[1]);
                           // return array[0];
                           return item;
                        }));
                    }
                });
             },
            updater: function(item){
                 //$('#loading-indicator').show();
                $.post(BASE_URL+'/examenes/loadresults',{ query:item.id },function( data ) {
  							$( "#html" ).html( data );
					});

                return item;
            },
     //        ,

            displayText: function(item){
            	       console.log(item);
                     return item.examen + ' - ' + item.tipo_examen ;
            }
        });


});