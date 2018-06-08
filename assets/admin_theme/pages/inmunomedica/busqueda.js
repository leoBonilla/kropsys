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
  							var form = $('#file-send-form')
  							form.ajaxForm({
												beforeSubmit : function(arr, $form, options){
													          $form.find('button').prop('disabled', true);
													          return true;
												             // if("condition is true")
												             // {
												             //    return true; //it will continue your submission.
												             // }
												             // else
												             // {
												             //                   return false; //ti will stop your submission.
												             // }

												          },
												success : function(res, status, xhr,$form){
													        console.log(status);
													        $form.find('button').prop('disabled', false);
													        if(res.result == true){
													        	$('#email-info').toggle();
													        }else{
													        	alert('Algo ha salido mal');
													        }
																             // // endLoading();
																             //  if(data.result=="success")            
																             //  {
																             //      showSuccessNotification(data.notification);
																             //  } 
																             //  else
																             //  {
																             //      showErrorNotification(data.notification);
																             //  }
																           }
  							});
  							$('#toggle-email').on('click', function(){
  								$('#email-fields').toggle();
  							});
					});

                return item;
            },
     //        ,

            displayText: function(item){
            	      // console.log(item);
                     return item.examen + ' - ' + item.tipo_examen ;
            }
        });


});