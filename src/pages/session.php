<?php
    $title = "Liste des sessions";
    
    ob_start();
?>
        <!-- pour l'admin -->
        <link href="assets/datatables/media/css/jquery.dataTables.min.css"
        	rel="stylesheet">
<?php
    $endHeader = ob_get_clean();
?>

        <div class="container">
        	<div class="contenu">
        		<hr>
        		<h2>Liste des sessions</h2><br><br>
        		
        		<div><a class="btn btn-success" href="form_add_session">Créer une nouvelle session</a></div><br>
        		<div id="errors">
<?php 
    if (isset($_GET['err'])){
        if ((int)$_GET['err'] === 1){
            echo "L'identifiant de session choisi n'est pas valide.";
        }
    }
?>
        		</div><br><br>
        		<table id="myTableSessions" class="display">
                    <thead>
                        <tr>
                            <th>Id</th>
        				    <th>Titre</th>
        					<th>Slug</th>
        					<th>Date de début</th>
        					<th>Date de fin</th>
        					<th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id</th>
        				    <th>Titre</th>
        					<th>Slug</th>
        					<th>Date de début</th>
        					<th>Date de fin</th>
        					<th>Actions</th>        					
                        </tr>
                    </tfoot>                    
                </table>
            </div>
        </div>


<?php
    ob_start();
?>
        <script type="text/javascript"
	       src="assets/datatables/media/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="js/pages/list_sessions.js"></script>

<?php 
    $endFooter = ob_get_clean();
?>
