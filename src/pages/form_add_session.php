<?php
    $title = "Admin";
    
    ob_start();
?>
        <!-- pour l'admin -->
        <link href="css/pages/admin.css" rel="stylesheet">
<?php
    $endHeader = ob_get_clean();
    
    if (isset($_POST['submit']) && ($_POST['submit'] == 'register')) {
        require_once (APPLICATION_PATH . '/services/SessionService.php');
        require_once (APPLICATION_PATH . '/mappers/SessionMapper.php');
        require_once (APPLICATION_PATH . '/Db.php');
        $db = new Db('mysql', 'localhost', 'project', 'project', '0000');
        $db->getConnexion();
        $sessionMapper = new SessionMapper($db);
        $sessionService = new SessionService($sessionMapper);
        $data = $sessionService->clean($_POST);
        if ($data != FALSE) {
            $sessionService->save($data['title'], $data['slug'], $data['startDate'], $data['endDate']);
        }
    }
?>

<div class="container">
	<div class="contenu">
		<form class="form-horizontal" action="form_add_session" method="POST">
			<fieldset>
				<!-- Form Name -->
				<legend>Saisie d'une nouvelle session</legend>

				<!-- Text input-->
				<div class="control-group">
					<label class="control-label" for="title">Nom de la session</label>
					<div class="controls">
						<input id="title" name="title" type="text"
							placeholder="Entrez le nom de  la session" class="input-xlarge">
					</div>
				</div>
				
				<!-- Text input-->
				<div class="control-group">
					<label class="control-label" for="slug">Slug</label>
					<div class="controls">
						<input id="slug" name="slug" type="text"
							placeholder="Entrez le slug" class="input-xlarge">
					</div>
				</div>
				
				<!-- Select Basic -->
				<div class="control-group">
					<label class="control-label" for="startDay">Date de début</label>
					<div class="controls">
						<select id="startDay" name="startDay" class="input-mini">
							<option value="0">--</option>
                            <?php for($i=1;$i<32;$i++){echo "<option value=\"$i\">$i</option> ";}?>
                        </select> <select id="startMonth" name="startMonth" class="input-mini">
                            <option value="0">--</option>
                            <?php for($i=1;$i<13;$i++){echo "<option value=\"$i\">$i</option> ";}?>
                        </select>
                        <select id="startYear" name="startYear" class="input-mini">
                            <option value="0">----</option>
                            <?php for($i=2000;$i<2016;$i++){echo "<option value=\"$i\">$i</option> ";}?>
                        </select>
                    </div>
			    </div>
			    
				<!-- Select Basic -->
				<div class="control-group">
					<label class="control-label" for="endDay">Date de Fin</label>
					<div class="controls">
						<select id="endDay" name="endDay" class="input-mini">
                            <option value="0">--</option>
                            <?php for($i=1;$i<32;$i++){echo "<option value=\"$i\">$i</option> ";}?>
                        </select> 
                        <select id="endMonth" name="endMonth" class="input-mini">
                            <option value="0">--</option>
	                        <?php for($i=1;$i<13;$i++){echo "<option value=\"$i\">$i</option> ";}?>
                        </select> 
                        <select id="endYear" name="endYear" class="input-mini">
                            <option value="0">----</option>
	                        <?php for($i=2000;$i<2016;$i++){echo "<option value=\"$i\">$i</option> ";}?>
                        </select>
                    </div>
				</div>
				
				<!-- Button -->
				<div class="control-group double">
                    <div class="controls">
						<button id="submit" name="submit" class="btn btn-primary btn-lg"
							value="register">Enregistrer la session</button>
						<button id="reset" name="reset" class="btn btn-danger btn-lg"
							value="cancel">Réinitialiser</button>
                    </div>
				</div> 
				
			</fieldset>
		</form>
	</div>
</div>