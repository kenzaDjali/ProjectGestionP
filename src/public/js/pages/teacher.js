$(function() {
	
	$('#list_classes').css('display','none');
	
	// au clic sur choisir un groupe déjà défini
	$('#same_class').click(function(){
		$('#list_classes').css('display','block');
		$('#redo').css('display','none');
		$('#same_class').css('display','none');
	});

    // au clic sur le bouton pour sélectionner une date
    $('form').submit(function(event){
    	
    	event.preventDefault();
    	// redirection vers la page teacher_session.php avec la date choisie (en session ou par get/post ?)
    	// passage de la date à faire ? comment par js à part en get ?
    	// redirection
    	$(location).attr('href',"/teacher_session?id=3");
    });	
	
	// au clic sur bouton retour
	$('#cancel').on('click',function(){
		$('#same_class').css('display','block');
		$('#redo').css('display','block');
		$('#list_classes').css('display','none');
	});
	   
});