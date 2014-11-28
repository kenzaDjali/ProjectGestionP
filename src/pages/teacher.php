<?php
    $title = "Formateur";
    
    ob_start();
?>   
        <script type="text/javascript" src="js/pages/teacher_session.js"></script>
<?php
    $endFooter = ob_get_clean();
?>   
        <div class="container">
            <div class="contenu">
                <button id="same_class" class="btn btn-primary">Choisir le même groupe d'apprenants que précédemment</button>
                <div id="list_classes">
                    <form role="form" class="form-horizontal" action="" method="POST">
                        <fieldset>
                            <!-- Form Name -->
                            <legend>Choisir la classe que vous souhaitez récupérer</legend>
                            <div class="form-group">
                                <label class="control-label" for="date">Dates</label>
                                <div class="controls">
                                    <select id="date" name="date">
                                        <option value="2014/10/13">Classe du 13/10/2014</option>
                                        <option value="2014/10/14">Classe du 14/10/2014</option>
                                        <option value="2014/10/15">Classe du 15/10/2014</option>
                                        <option value="2014/10/16">Classe du 16/10/2014</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <button id="choice_classe" class="btn btn-primary">Choisir cette classe</button>
                                <button id="cancel" class="btn btn-primary">Annuler</button>
                            </div>
                        </fieldset>
                    </form>
                </div><br><br>
                <div id="redo">
                    <a href="/teacher_session" class="btn btn-primary">Redéfinir le groupe d'apprenants</a>
                </div>
            </div>
        </div>