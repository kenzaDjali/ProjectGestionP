$(document).ready(function(){
	$('#myTableSessions').dataTable({
		ajax: 'ajax?object=session&action=loadSessions'
	});
	
	$('table').delegate('button', 'click', function(){
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
        	
        	// rechargement de la liste de sessions
        	var table = new $.fn.dataTable.Api('#myTableSessions');
			table.ajax.reload();
        	
        });
	});	
}); 

