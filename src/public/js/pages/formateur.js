$(function() {
	
	// chargement de la datatable
    $('#table_id').DataTable();
	
    $('[data-toggle="tooltip"]').tooltip();
    
    $('a[href="#list_all_students"]').on('click', function(event) {
        event.preventDefault();
        $('#all_students_list').modal('show');
        var all_students_table = $('#all_students_table').DataTable({
        	"order": [[ 1, "asc" ]]
        });
        var column = all_students_table.column(0);
        column.visible(false);
        var added_students_table = $('#added_students_table').DataTable();
        column = added_students_table.column(0);
        column.visible(false);
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
    	//if (value.)
    	
    	// value = student_n : arrivée d'un apprenant -> modification de son statut en BD et sur la page;
    	
    	// value = add_student_n : ajout d'un apprenant -> visualisation de cet apprenant sur la liste d'apprenants en cours;
    	var index = value.lastIndexOf('_');
    	var id = value.substring(index+1);
    	if (value.search('add_student') != -1){
    		//var id = 
    		$('#added_students_table').append($(this).parents('tr'));
    		console.log($(this));
    		$(this).val('del_student_'+ id);
    		$(this).text('Enlever');
    		$('#added_students_table').DataTable();
    	}
    	// value = del_student_n : ajout d'un apprenant -> visualisation de cet apprenant sur la liste d'apprenants en cours;
    	if (value.search('del_student') != -1){
    		//$(this).parents('tr').css('display','none');
    		$('#all_students_table').append($(this).parents('tr'));
    		console.log($(this));
    		$(this).val('add_student_'+ id);
    		$(this).text('Ajouter');
    		$('#all_students_table').DataTable();
    	}
    	
    	// value = add_students : pour ajouter des apprenants
    	
    	//value = remove_student : pour enlever un apprenant ajouté à la session
    });
    
});