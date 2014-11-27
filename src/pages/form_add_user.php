<?php 
//TODO: Changer le type de téléphone,
//TODO:  Tester que la selection n'a pas dépsser 1->4
 require_once '../functions/user.php';
 
?>

        <div class="container">
        <div class="contenu">
            <form class="form-horizontal" action="" method="POST">
                <fieldset>
                    <hr />
                    <!-- Form Name -->
                    <h3>Formulaire de saisie d'un apprenant</h3>
                    <hr />
                   
                    <!-- Text input-->
                    <div class="control-group">
                        <label class="control-label" for="last_name">Nom</label>
                        <div class="controls">
                            <input id="last_name" name="last_name" type="text" placeholder="Entrez le nom" class="input-xlarge" required="">
                        </div>
                    </div>
                    
                    <!-- Text input-->
                    <div class="control-group">
                        <label class="control-label" for="first_name">Prénom</label>
                        <div class="controls">
                            <input id="first_name" name="first_name" type="text" placeholder="Entre le prénom" class="input-xlarge" required="">
                        </div>
                    </div>
                    
                    <!-- Text input-->
                    <div class="control-group">
                        <label class="control-label" for="email">Email</label>
                        <div class="controls">
                            <input id="email" name="email" type="text" placeholder="Entrez l'e-mail" class="input-xlarge" required="">
                        </div>
                    </div>
                    
                    <!-- Text input-->
                    <div class="control-group">
                        <label class="control-label" for="password">Mot de passe</label>
                        <div class="controls">
                            <input id="password" name="password" type="password"  class="input-xlarge" required="">
                        </div>
                    </div>
                    
                    <!-- Select Basic -->
                    <div class="control-group">
                          <label class="control-label" for="selectbasic">Role</label>
                          <div class="controls">
                            <select id="role_id" name="role_id" class="input-large">
                              <option value="1">Apprenant</option>
                              <option value="2">Formateur</option>
                              <option value="3">Secrétaire</option>
                              <option value="4">Administrateur</option>
                            </select>
                         </div>
                    </div>
                    
                    <!-- Text input-->
                    <div class="control-group">
                        <label class="control-label" for="cell_phone_number">Numéro de téléphone portable</label>
                        <div class="controls">
                            <input id="cell_phone_number" name="cell_phone_number" type="text" placeholder="Entrez un numéro de téléphone portable" class="input-xlarge">
                        </div>
                    </div>
                    
                    <!-- Text input-->
                    <div class="control-group">
                        <label class="control-label" for="phone_number">Numéro de téléphone</label>
                        <div class="controls">
                            <input id="phone_number" name="phone_number" type="text" placeholder="Entre un numéro de téléphone fixe" class="input-xlarge">
                        </div>
                    </div>
                
                    <!-- Button (Double) -->
                    <div class="control-group double">
                        <label class="control-label" for="submit"></label>
                        <div class="controls">
                            <button id="submit" name="submit" class="btn btn-success" value="register">Enregistrer l'apprenant</button>
                            <button id="reset" name="reset" class="btn btn-danger" value="cancel">Réinitialiser</button>
                        </div>
                    </div>
                
                
                </fieldset>
            </form>
            
        </div>
        </div>
        <!-- /container -->



