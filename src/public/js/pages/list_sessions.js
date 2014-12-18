$(document).ready(function(){
	$('#myTableSessions').DataTable();
	
	$('button').on('click', function(){
		var id = $(this).attr('id');
        $.ajax('ajax?object=session&action=delete&id=' + id)
        .done(function(result){
        // traitement des données renvoyées par la requête ajax
        	var obj = JSON.parse(result);
        	// récupération du code (fonctionnement ou échec)
        	switch(obj.code) {
            case 1:
                color = 'green';
                break;
            case 2:
                color = 'orange';
                break;
            case 3:
            	color = 'red';
                break;
            default :
            	color = 'black';
            	break;
        	} 
        	// récupération du message
        	$('#errors').text(obj.message)
        				.css('color', color);
        	$('#myTableSessions').DataTable();
        });
	});	
}); 

