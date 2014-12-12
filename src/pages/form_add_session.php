<?php
    $title = "Admin - création de session";
    
    ob_start();
?>
        <!-- pour l'admin -->
        <link href="css/pages/admin.css" rel="stylesheet">
<?php
    $endHeader = ob_get_clean();
    $action = "create";
    
    if (isset($_GET['id']) || isset($_POST['submit'])){
        
        require_once (APPLICATION_PATH . '/services/SessionService.php');
        require_once (APPLICATION_PATH . '/mappers/SessionMapper.php');
        require_once (APPLICATION_PATH . '/Db.php');
        $db = new Db('mysql', 'localhost', 'project', 'project', '0000');
        $db->getConnexion();
        $sessionMapper = new SessionMapper($db);
        $sessionService = new SessionService($sessionMapper);
    }
    
    if (isset($_GET['id'])){
        
        $action = "update";
        $id = (int) $_GET['id'];
        $session = $sessionService->find($id);
        var_dump($session);
        // si la session définit par l'id existe et qu'on n'est pas en POST
        if (!isset($_POST['submit']) && !empty($session)){
            // on récupère les données de la session à mettre à jour
            // dans $titleF, $slug, $startDay, $startMonth, $startYear et compagnie
            /* @var $session Session */
            $titleF = $session->getTitle();
            $slug = $session->getSlug();
            list($startYear, $startMonth, $startDay) = explode('-', $session->getStartDate());
            list($endYear, $endMonth, $endDay) = explode('-', $session->getendDate());
            var_dump($titleF . ' '
                . $slug . ' '
                . $startDay . ' '
                . $startMonth . ' '
                . $startYear . ' '
                . $endDay . ' '
                . $endMonth . ' '
                . $endYear . ' '
            );
        } else {
        // sinon, on ne garde pas l'id
            unset($id);
            header("Location: list_sessions?err=1");
        } 
    }
    
    if (isset($_POST['submit']) && ($_POST['submit'] == 'register')) {
        var_dump($_POST);

        $result = $sessionService->clean($_POST);
        var_dump($result);
        // si les données du POST étaient correctes
        if ($result[0] != false) {
            // on les récupère, les sauvegarde en BDD
            $cleanData = $result[1]; 
            $sessionService->save($cleanData);
            var_dump($cleanData);
            // et on redirige vers la liste de sessions
            //header("Location: list_sessions");
        // si les données du POST n'étaient pas toutes correctes
        } else {
            // on récupère les erreurs 
            $errors = $result[1];
            $data = $result[2]; // (parmi les données du POST, celles correctes)
            
            // et les données qui étaient correctes dans $id, $titleF, $slug, $startDate et $endDate
            // ou bien celles du POST 
            var_dump($_POST);
            isset($data['id']) ? $id = $data['id'] : $id = $_POST['id'];
            isset($data['title']) ? $titleF = $data['title'] : $titleF = $_POST['title'];
            isset($data['slug']) ? $slug = $data['slug'] : $slug = $_POST['slug'];
            
            if (isset($data['startDate'])){
                list($startYear, $startMonth, $startDay) = explode('-', $data['startDate']);
            } else {
                $startDay = $_POST['startDay'];
                $startMonth = $_POST['startMonth'];
                $startYear = $_POST['startYear'];
            }
            
            if (isset($data['endDate'])){
                list($endYear, $endMonth, $endDay) = explode('-', $data['endDate']);
            } else {
                $endDay = $_POST['endDay'];
                $endMonth = $_POST['endMonth'];
                $endYear = $_POST['endYear'];
            }
        }
    }
?>

<div class="container">
	<div class="contenu">
		<form class="form-horizontal" action="form_add_session" method="POST">
			<fieldset>
				<!-- Nom du formulaire -->
				<legend>Saisie d'une nouvelle session</legend>

				<!-- Champ caché pour l'éventuel identifiant  -->
				<input type="hidden" value="<?= isset($id) ? $id : ''; ?>">
				
				<!-- Saisie de texte pour le titre -->
				<div class="control-group">
					<label class="control-label" for="title">Nom de la session</label>
					<div class="controls">
						<input id="title" name="title" type="text"
						    <?= (isset($titleF)) ? 'value="' . $titleF . '"' : 
						          'placeholder="Entrez le nom de  la session"'; ?>
						    class="input-xlarge">
					</div>
					<div class="controls error"> 
					   <?= (isset($errors['title'])) ? $errors['title'] : ''; ?>
					</div>
				</div>
				
				<!-- Saisie de texte pour le slug -->
				<div class="control-group">
					<label class="control-label" for="slug">Slug</label>
					<div class="controls">
						<input id="slug" name="slug" type="text"
						    <?= (isset($slug)) ? 'value="' . $slug . '"' : 
						          'placeholder="Entrez le slug de la session"'; ?>
						    class="input-xlarge">						
					</div>
					<div class="controls error"> 
					   <?= (isset($errors['slug'])) ? $errors['slug'] : ''; ?>
					</div>					
				</div>
				
				<!-- Sélecteurs pour la date de début -->
				<div class="control-group">
					<label class="control-label" for="startDay">Date de début</label>
					<div class="controls">
						<select id="startDay" name="startDay" class="input-mini">
							<option value="0">--</option>
                            <?php 
                                if (!isset($startDay)) { $startDay = 0; }
                                for($i = 1; $i < 32; $i++){
                                    if ($startDay == $i){
                                       echo "<option value=\"$i\" selected>$i</option> ";
                                    } else {
                                        echo "<option value=\"$i\">$i</option> ";
                                    }
                                }
                            ?>
                        </select> <select id="startMonth" name="startMonth" class="input-mini">
                            <option value="0">--</option>
                            <?php 
                                if (!isset($startMonth)) { $startMonth = 0; }
                                for($i = 1; $i < 13; $i++){
                                    if ($startMonth == $i){
                                       echo "<option value=\"$i\" selected>$i</option>";
                                    } else {
                                        echo "<option value=\"$i\">$i</option>";
                                    }
                                }
                            ?>                            
                        </select>
                        <select id="startYear" name="startYear" class="input-mini">
                            <option value="0">----</option>
                            <?php 
                                if (!isset($startYear)) { $startYear = 0; }
                                $year1 = date('Y') - 5;
                                $year2 = date('Y') + 5;
                                for($i = $year1; $i < $year2; $i++){
                                    if ($startYear == $i){
                                       echo "<option value=\"$i\" selected>$i</option>";
                                    } else {
                                        echo "<option value=\"$i\">$i</option>";
                                    }
                                }
                            ?>                            
                        </select>
                    </div>
                    <div class="controls error"> 
					   <?= (isset($errors['startDate'])) ? $errors['startDate'] : ''; ?>
					</div>
			    </div>
			    
				<!-- Sélecteurs pour la date de fin -->
				<div class="control-group">
					<label class="control-label" for="endDay">Date de Fin</label>
					<div class="controls">
						<select id="endDay" name="endDay" class="input-mini">
                            <option value="0">--</option>
                            <?php 
                                if (!isset($endDay)) { $endDay = 0; }
                                for($i = 1;$i<32;$i++){
                                    if ($endDay == $i){
                                       echo "<option value=\"$i\" selected>$i</option>";
                                    } else {
                                        echo "<option value=\"$i\">$i</option>";
                                    }
                                }
                            ?>
                        </select> 
                        <select id="endMonth" name="endMonth" class="input-mini">
                            <option value="0">--</option>
                            <?php 
                                if (!isset($endMonth)) { $endMonth = 0; }
                                for($i=1 ; $i < 13 ; $i++){
                                    if ($endMonth == $i){
                                       echo "<option value=\"$i\" selected>$i</option>";
                                    } else {
                                        echo "<option value=\"$i\">$i</option>";
                                    }
                                }
                            ?>          
                        </select> 
                        <select id="endYear" name="endYear" class="input-mini">
                            <option value="0">----</option>
                            <?php 
                                if (!isset($endYear)) { $endYear = 0; }
                                for($i = $year1; $i < $year2; $i++){                                
                                    if ($endYear == $i){
                                       echo "<option value=\"$i\" selected>$i</option>";
                                    } else {
                                        echo "<option value=\"$i\">$i</option>";
                                    }
                                }
                            ?>          
                        </select>
                    </div>
					<div class="controls error"> 
                        <?= (isset($errors['endDate'])) ? $errors['endDate'] : ''; ?>
					</div>                    
				</div>
				
				<!-- Boutons -->
				<div class="control-group double">
                    <div class="controls">
						<button id="submit" name="submit" class="btn btn-primary btn-lg"
							value="register">
							Enregistrer la session</button>
						<button id="reset" name="reset" class="btn btn-danger btn-lg"
							value="cancel">Réinitialiser</button>
                    </div>
				</div> 
				
			</fieldset>
		</form>
	</div>
</div>