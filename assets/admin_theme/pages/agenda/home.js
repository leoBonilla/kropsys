(function($) {
$('#calendar').fullCalendar({
	defaultDate: $('#calendar').fullCalendar('today'),
    lang:'es',
    views: {
    month: { // name of view
     // titleFormat: 'YYYY, MM, DD'
      // other view-specific options here
    }
  }
  })

})(jQuery);