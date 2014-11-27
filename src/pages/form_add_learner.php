<?php 
   
    if (isset($_POST['submit']) && $_POST['submit'] == "register"){
        var_dump($_POST);
    }
?>

        <div class="container">
        <div class="contenu">
            <form class="form-horizontal" action="" method="POST">
                <fieldset>
                
                    <!-- Form Name -->
                    <legend>Formulaire de saisie d'un apprenant</legend>
                    
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
                    <div class="control-group">
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



