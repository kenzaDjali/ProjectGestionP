$(function() {
	
	// chargement de la datatable
    $('#table_id').DataTable({
        //"paging": false,
    	//"ordering": false,
    	//"info": false
    });
	
    $('[data-toggle="tooltip"]').tooltip();
    
    $('a[href="#to-do"]').on('click', function(event) {
        event.preventDefault();
        $('#all_students_list').modal('show');
        $('#all_students_table').DataTable();
        //$('#to-do').modal('show');
    });
    
    $('[data-command="toggle-search"]').on('click', function(event) {
        event.preventDefault();
        $(this).toggleClass('hide-search');
        
        if ($(this).hasClass('hide-search')) {        
            $('.c-search').closest('.row').slideUp(100);
        }else{   
            $('.c-search').closest('.row').slideDown(100);
        }
    });
    
    $('#contact-list').searchable({
        searchField: '#contact-list-search',
        selector: 'li',
        childSelector: '.col-xs-12',
        show: function( elem ) {
            elem.slideDown(100);
        },
        hide: function( elem ) {
            elem.slideUp( 100 );
        }
    });
    
    $('button').on('click', function(){
    	var value = $(this).val();
    	alert(value);
    	// switch suivant les valeurs des boutons
    	
    	// value = session_n : choix d'une session -> affichage des apprenants de la session choisie;
    	if (value.search('session') != -1){
    		$('#students_list').css('display','block');
    		$('#sessions_list').css('display','none');
    	}
    	
    	// value = choice : acceptation ou refus des apprenants en retard et notification à la secrétaire
    	
    	// value = student_n : arrivée d'un apprenant -> modification de son statut en BD et sur la page;
    	
    	// value = add_student_n : ajout d'un apprenant -> visualisation de cet apprenant sur la liste d'apprenants en cours;
    	if (value.search('add_student') != -1){
    		$(this).parents("tr").css('display','none');
    	}
    	
    	// value = add_students : pour ajouter des apprenants
    	
    	//value = remove_student : pour enlever un apprenant ajouté à la session
    });
    
});