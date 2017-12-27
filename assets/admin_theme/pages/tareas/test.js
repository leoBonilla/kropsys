$(document).ready(function(){
$('#email_table').DataTable({
	"ajax": BASE_URL +'/emailapi',
});
	$.post(BASE_URL + '/serverside/syncemail', function(){
		
	})
});