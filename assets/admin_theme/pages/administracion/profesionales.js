$(document).ready(function(){
	var table = $('#profesionales_table').DataTable({
		'ajax': BASE_URL + '/webapi/profesionales',
		"columns": [
            { "data": "id" },
             { "data": "profesional" },
             { "data": "nombre_agenda" },
             { "data": "especialidad" },
        ],        

       
	});


});