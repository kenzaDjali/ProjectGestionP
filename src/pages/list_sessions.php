<?php
    $title = "Admin";
    
    ob_start();
?>
<!-- pour l'admin -->
<link href="assets/datatables/media/css/jquery.dataTables.min.css"
	rel="stylesheet">
<?php
    $endHeader = ob_get_clean();
    require_once (APPLICATION_PATH . '/services/SessionService.php');
    require_once (APPLICATION_PATH . '/mappers/SessionMapper.php');
    require_once (APPLICATION_PATH . '/Db.php');
    $db = new Db('mysql', 'localhost', 'project', 'project', '0000');
    $db->getConnexion();
    $sessionMapper = new SessionMapper($db);
    $sessionService = new SessionService($sessionMapper);
    $sessions = $sessionService->fetchAll();
    
?>

        <div class="container">
        	<div class="contenu">
        		<hr>
        		<h2>Liste des sessions</h2><br><br>
        		<!-- 
        		<div><a class="btn btn-success" href="form_add_session">Créer une nouvelle session</a></div><br>
        		<div id="errors">
        		<?php /*if (isset($_GET['err'])){
        		    if ($_GET['err'] == 1){
        		        echo "L'identifiant de session choisi n'est pas valide.";
        		    }
        		}*/?>
        		</div> -->
        		<table id="myTableSessions" class="display">
                    <thead>
                        <tr>
                            <th>Id</th>
        				    <th>Titre</th>
        					<th>Slug</th>
        					<th>Date de début</th>
        					<th>Date de fin</th>
        					<th></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id</th>
        				    <th>Titre</th>
        					<th>Slug</th>
        					<th>Date de début</th>
        					<th>Date de fin</th>
        					<th></th>        					
                        </tr>
                    </tfoot>                    
                    <tbody>
                    <?php foreach($sessions as $session) {?>
                        <tr>
                            <td><?= $session->getId();?></td>
        				    <td><?= $session->getTitle();?></td>
        					<td><?= $session->getSlug();?></td>
        					<td><?= $session->getStartDate();?></td>
        					<td><?= $session->getEndDate();?></td>
        					<td>
        					   <a class="btn btn-primary" href="form_add_session?id=<?= $session->getId(); ?>">Editer</a>
        					   <button class="btn btn-danger" name="" id="">Supprimer</button>
        					</td>
                        </tr>
                    <?php }?>
                    </tbody>
                </table>
            </div>
        </div>


<?php
    ob_start();
?>
<script type="text/javascript"
	src="assets/datatables/media/js/jquery.dataTables.min.js"></script>
<script>
        $(document).ready(function(){
            $('#myTableSessions').DataTable();
        }); 
    </script>

<?php 
    $endFooter = ob_get_clean();
?>


