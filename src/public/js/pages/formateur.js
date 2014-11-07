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
        alert('Fenêtre d\'ajout d\'aprpenant à faire !');
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
    	
    	// value = sessionn : choix d'une session -> affichage des apprenants de la session choisie;
    	
    	// value = choix : acceptation ou refus des apprenants en retard et notification à la secrétaire
    	
    	// value = apprenantn : arrivée d'un apprenant -> modification de son statut en BD et sur la page;
    	
    	// value = ajoutApprenants : pour ajouter des apprenants
    });
    
});