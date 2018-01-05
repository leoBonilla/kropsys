$(document).ready(function(){


    $.extend( true, $.fn.dataTable.defaults, {
		// dom: 'lBfrtip',
	        buttons: [
	            { "extend": 'excel', "text":'<i class="fa fa-download"></span>',"className": 'btn btn-warning btn-sm' }
	           //'excel'
	        ],
	 dom:"lBfrtip",
	 lengthChange: true,

        "language": {
                "url":BASE_URL+'/assets/admin_theme/vendor/datatables/languages/spanish.json',
            },
         stateSave: true,
         "paging": true

        
        
} );

});


