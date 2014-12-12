<?php
    $title = "Admin - création de session";
    
    ob_start();
?>
        <!-- pour l'admin -->
        <link href="css/pages/admin.css" rel="stylesheet">
<?php
    $endHeader = ob_get_clean();
    
    if (isset($_POST['submit']) && ($_POST['submit'] == 'register')) {
        var_dump($_POST);
        require_once (APPLICATION_PATH . '/services/SessionService.php');
        require_once (APPLICATION_PATH . '/mappers/SessionMapper.php');
        require_once (APPLICATION_PATH . '/Db.php');
        $db = new Db('mysql', 'localhost', 'project', 'project', '0000');
        $db->getConnexion();
        $sessionMapper = new SessionMapper($db);
        $sessionService = new SessionService($sessionMapper);
        $result = $sessionService->clean($_POST);
        var_dump($result);
        if ($result[0] != false) {
            $cleanData = $result[1]; 
            var_dump($cleanData);
            $sessionService->save($cleanData);
            var_dump("fin");
            //header("Location: list_sessions");
        } else {
            $errors = $result[1];
            $someCleanData = $result[2];
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
                            <?php if (!empty($_POST) && $_POST['submit'] == 'register'){ ?>
						          value="<?= isset($errors['title'])? $_POST['title']: $someCleanData['title']; ?>"
						    <?php } else { ?>
						          placeholder="Entrez le nom de  la session"
						    <?php }?>
						    class="input-xlarge">
					</div>
					<div class="controls error"> 
					   <?php if (isset($errors) && isset($errors['title'])){
					       echo $errors['title'];
					   } 
					   ?>
					</div>
				</div>
				
				<!-- Text input-->
				<div class="control-group">
					<label class="control-label" for="slug">Slug</label>
					<div class="controls">
						<input id="slug" name="slug" type="text"
						    <?php if (!empty($_POST) && $_POST['submit'] == 'register'){ ?>
						          value="<?= isset($errors['slug'])? $_POST['slug']: $someCleanData['slug']; ?>"
						    <?php } else { ?>
						          placeholder="Entrez le slug de  la session"
						    <?php }?>						
                            class="input-xlarge">
					</div>
					<div class="controls error"> 
					   <?php if (isset($errors) && isset($errors['slug'])){
					       echo $errors['slug'];
					   } 
					   ?>
					</div>					
				</div>
				
				<!-- Select Basic -->
				<div class="control-group">
					<label class="control-label" for="startDay">Date de début</label>
					<div class="controls">
						<select id="startDay" name="startDay" class="input-mini">
							<option value="0">--</option>
                            <?php 
                                if (!empty($_POST) && $_POST['submit'] == 'register'){
                                    $startDay = (int) $_POST['startDay'];
                                } else {
                                    $startDay = 0;
                                }
                                for($i=1;$i<32;$i++){
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
                                if (!empty($_POST) && $_POST['submit'] == 'register'){
                                    $startMonth = (int) $_POST['startMonth'];
                                } else {
                                    $startMonth = 0;
                                }
                                for($i=1;$i<13;$i++){
                                    if ($startMonth == $i){
                                       echo "<option value=\"$i\" selected>$i</option> ";
                                    } else {
                                        echo "<option value=\"$i\">$i</option> ";
                                    }
                                }
                            ?>                            
                        </select>
                        <select id="startYear" name="startYear" class="input-mini">
                            <option value="0">----</option>
                            <?php 
                                if (!empty($_POST) && $_POST['submit'] == 'register'){
                                    $startYear = (int) $_POST['startYear'];
                                } else {
                                    $startYear = 0;
                                }
                                for($i=2000;$i<2016;$i++){
                                    if ($startYear == $i){
                                       echo "<option value=\"$i\" selected>$i</option> ";
                                    } else {
                                        echo "<option value=\"$i\">$i</option> ";
                                    }
                                }
                            ?>                            
                        </select>
                    </div>
                    <div class="controls error"> 
					   <?php if (isset($errors) && isset($errors['startDate'])){
					       echo $errors['startDate'];
					   } 
					   ?>
					</div>
			    </div>
			    
				<!-- Select Basic -->
				<div class="control-group">
					<label class="control-label" for="endDay">Date de Fin</label>
					<div class="controls">
						<select id="endDay" name="endDay" class="input-mini">
                            <option value="0">--</option>
                            <?php 
                                if (isset($_POST) && $_POST['submit'] == 'register'){
                                    $endDay = (int) $_POST['endDay'];
                                } else {
                                    $endDay = 0;
                                }
                                for($i=1;$i<32;$i++){
                                    if ($endDay == $i){
                                       echo "<option value=\"$i\" selected>$i</option> ";
                                    } else {
                                        echo "<option value=\"$i\">$i</option> ";
                                    }
                                }
                            ?>
                        </select> 
                        <select id="endMonth" name="endMonth" class="input-mini">
                            <option value="0">--</option>
                            <?php 
                                if (isset($_POST) && $_POST['submit'] == 'register'){
                                    $endMonth = (int) $_POST['endMonth'];
                                } else {
                                    $endMonth = 0;
                                }
                                for($i=1;$i<13;$i++){
                                    if ($endMonth == $i){
                                       echo "<option value=\"$i\" selected>$i</option> ";
                                    } else {
                                        echo "<option value=\"$i\">$i</option> ";
                                    }
                                }
                            ?>          
                        </select> 
                        <select id="endYear" name="endYear" class="input-mini">
                            <option value="0">----</option>
                            <?php 
                                if (isset($_POST) && $_POST['submit'] == 'register'){
                                    $endYear = (int) $_POST['endYear'];
                                } else {
                                    $endYear = 0;
                                }
                                for($i=2000;$i<2016;$i++){
                                    if ($endYear == $i){
                                       echo "<option value=\"$i\" selected>$i</option> ";
                                    } else {
                                        echo "<option value=\"$i\">$i</option> ";
                                    }
                                }
                            ?>          
                        </select>
                    </div>
					<div class="controls error"> 
                        <?php if (isset($errors) && isset($errors['endDate'])){
					       echo $errors['endDate'];
					     } 
                        ?>
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