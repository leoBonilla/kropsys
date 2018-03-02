;(function($, window, udefined){
		$.fn.phoneNumber = function(){
			    var input = this;
			    var max_length = 8;
				//console.log(this.attr('type'));
				if(input.attr('type') == 'text'){
					 input.keydown(function (e) {
					 	if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
	             		// Allow: Ctrl+A, Command+A
	            		(e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
	             		// Allow: home, end, left, right, down, up
	            		(e.keyCode >= 35 && e.keyCode <= 40)) {
	                	 // let it happen, don't do anything
	                    return;
	                }

		        		// Ensure that it is a number and stop the keypress
		        		if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105) || input.val().length > max_length) {
		        		    e.preventDefault();
		        		}
					});
				}
		};
})(jQuery, window);