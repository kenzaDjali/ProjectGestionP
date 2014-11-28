function give(element){
	
	var table1, table2, table_src, table_dest;
	var action;
	
	var table1 = $('#all_learners_table').DataTable();
	var table2 = $('#added_learners_table').DataTable();
	
	// si on n'est bien dans les cas prévus
	if ((element.hasClass('add')) | (element.hasClass('del'))){
		if (element.hasClass('add')){
			table_src = table1;
			table_dest = table2;
			action = 'add';
		}
		if (element.hasClass('del')){
			
			table_src = table2;
			table_dest = table1;
			action = 'del';
		}	
		
		// changement de la classe et du texte affiché sur le bouton
		if (action == 'add'){
			element.removeClass('add');
			element.addClass('del');
			element.text('Enlever');
		} else { // action == 'del'
			element.removeClass('del');
			element.addClass('add');
			element.text('Ajouter');
		}
		
		// création de la nouvelle ligne tr de datatable à partir de celle à supprimer 
		var cells = element.parents('tr').find('td');
		var length = cells.length;
		var row= [];
		// gestion de la première ligne
		var cell = cells.first();
		row.push(cell.html());
		// gestion des lignes suivantes
		for (var i = 0; i< length-1; i++){
			cells = cells.next();
			cell = cells.first();
			row.push(cell.html());
		}
	
		// modification des 2 datatables
		table_dest.row.add(row).draw();
		table_src.row(element.parents('tr')).remove().draw();
	}
}

$(function() {
	
	// chargement de la datatable
    $('#table_id').DataTable();
	
    $('[data-toggle="tooltip"]').tooltip();
    
    $('a[href="#list_all_learners"]').on('click', function(event) {
        event.preventDefault();
        $('#all_learners_list').modal('show');
        if ( $.fn.dataTable.isDataTable( '#all_learners_table' ) ) {
            var all_learners_table = $('#all_learners_table').DataTable();
            var column = all_learners_table.column(0);
            column.visible(false);
            var added_learners_table = $('#added_learners_table').DataTable();
            column = added_learners_table.column(0);
            column.visible(false);
        }
        else {
        	$('#all_learners_table').DataTable();
        	$('#added_learners_table').DataTable();
        }
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
    
    // choix d'une session -> affichage des apprenants de la session choisie;
    $('button.session').on('click', function(){
    	$('#learners_list').css('display','block');
    	$('#sessions_list').css('display','none');
    	
    	// et autres traitements de récupération des apprenants de la session en question 
    	// la value du bouton contient l'id de la session choisie 
    });
    
    // retour sur le choix de la session
    //<button class="change_session">Changer de session</button>
    $('button.change_session').on('click', function(){
    	$('#sessions_list').css('display','block');
    	$('#learners_list').css('display','none');
    });
    
    
	// acceptation ou refus des apprenants en retard et notification à la secrétaire
    $('button.choice').on('click', function(){

    	// cas où le formateur fait un choix
    	if ($(this).val() == 'choice'){
	    	
	    	var choice = $('input[type="radio"][name="choice"]').val();
	    	
	    	if (choice == 1){
	    		$('#choice_done p').text("Vous acceptez les retardataires.")
	    	} else {
	    		$('#choice_done p').text("Vous n'acceptez pas les retardataires.")
	    	} 
	    		
	    	$('#choice_done').css('display','block');
	    	$('#choice_to_do').css('display','none');
	    	
	    	// notification à la secrétaire
    	}
    	
    	// cas où le formateur souhaite revenir sur son choix
    	if ($(this).val() == 'rechoice'){
	    	$('#choice_done').css('display','none');
	    	$('#choice_to_do').css('display','block');    		
    	}
    	
    })
    
    
    // arrivée d'un apprenant -> modification de son statut en BD et sur la page;
    $('button.arrival').on('click', function(){
    	var value = $(this).val();
    	alert('arrivée de l\étudiant ' +  value);
    
    	//value = n
    	// modification de son statut en BD à faire (modif sur champ state de la table présence) et sur cette page.
    });
    
    // suppression de la liste d'un apprenant ajouté d'une autre session
    $('button.remove_learner').on('click', function(){
    	var value = $(this).val();
    	alert('suppression de l\'étudiant ' +  value + ' ajouté d\'une autre session');
    	$(this).parents('li.list-group-item').remove();

    	// modification de son statut en BD à faire (suppression table presences)
    });
    
    // ajout d'un apprenant à la liste d'apprenants à ajouter à la liste de la session actuelle 
    $('#all_learners_table').delegate('button.add', 'click', function(){
    	give($(this));
    });
    
    // suppression d'un apprenant ajouté à la liste d'apprenants à ajouter à la liste de la session actuelle
    $('#added_learners_table').delegate('button.del', 'click', function(){
    	give($(this));
    });
    
//	$(this).bind('click', function(){
//		alert('heho ');
//		test($(this).val(), $(this));
//	});    		
//	$(this).bind('click', test($(this).val(),$(this)));

    		
//    		for (var i = 0; i < j; i++){
//    			rows.push(cells[i])
//    		} 		
//    		
//    		var cell;
//    		for (cell in cells){
//    			console.log(cell);
//    		}
//    		    		cells.each(function(i, value){
//    			console.log("valeur de cellule");
//    			console.log(value.html());
//    			rows.push(value);
//    		});
  
});