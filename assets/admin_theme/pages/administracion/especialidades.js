$(document).ready(function(){
	var table = $('#especialidades_table').DataTable({
		'ajax': BASE_URL + '/webapi/especialidades',
		"columns": [
            { "data": "id" },
             { "data": "especialidad" },
        ],

        

	});
});