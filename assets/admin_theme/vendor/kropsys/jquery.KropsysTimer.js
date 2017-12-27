(function($){
	$.fn.extend({
		settimer : function(start,end){
			countdown.resetLabels();
				countdown.setLabels(
								' milisegundo| segundo| minuto| hora| dia| semana| mes| año| década| siglo | milénio',
								' milissegundos| segundos| minutos| horas| dias| semanas| meses| años| décadas| siglos | milenios',
								' y ',
								' , ',
								'ahora');
			return this.each(function(){
					$(this).text(countdown(moment($(start).val())).toString());

			});
		}
	});
})(jQuery)