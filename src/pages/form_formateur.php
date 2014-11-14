<?php
?>
        <div class="container">
            <div class="row" id="liste_session">
                <div class="col-xs-12 col-sm-offset-1 col-sm-10">
                    <h2>Liste des sessions</h2>
                    <table id="table_id" class="display">
                        <thead>
                            <tr>
                                <th>nom de la session</th>
                                <th>dates</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tfoot>
                                <th>nom de la session</th>
                                <th>dates</th>
                                <th></th>                    
                        </tfoot>
                        <tbody>
                            <tr>
                                <td>session 1</td>
                                <td>JJ/MM/AAAA - JJ/MM/AAAA</td>
                                <td><button type="button" class="btn btn-primary" value="session1">Choisir</button></td>
                            </tr>
                            <tr>
                                <td>session 2</td>
                                <td>JJ/MM/AAAA - JJ/MM/AAAA</td>
                                <td><button type="button" class="btn btn-primary" value="session2">Choisir</button></td>
                            </tr>
                            <tr>
                                <td>session 3</td>
                                <td>JJ/MM/AAAA - JJ/MM/AAAA</td>
                                <td><button type="button" class="btn btn-primary" value="session3">Choisir</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div><br><br>
            
            <!--   faire une div liste_apprenants englobante ? -->
            <div class="row">
                <div class="col-xs-12 col-sm-offset-1 col-sm-10">
                    <h2>Liste des apprenants</h2>
                    <h4>Session 1</h4>
                    <div class="row">
                        <div class="col-xs-12 col-sm-8">
                            <label class="radio"><input type="radio" name="choix" value="1" checked>J'accepte les retardataires</label>
                            <label class="radio"><input type="radio" name="choix" value="0">Je n'accepte pas les retardataires</label>
                        </div>
                        <div class="col-xs-12 col-sm-4">
                            <button type="button" class="btn btn-primary" value="choix">Valider</button>
                        </div>
                    </div>                    
                </div>  
            </div><br>
  
            <div class="row">
                <div class="col-xs-12 col-sm-offset-1 col-sm-10 panel panel-default">
                        <div class="row panel-heading c-list">
                            <span class="title">Apprenants</span>
                            <ul class="pull-right c-controls">
                                <li><a href="#to-do" data-toggle="tooltip" data-placement="top" title="Ajout Apprenant"><i class="glyphicon glyphicon-plus"></i></a></li>
                                <li><a href="#" class="hide-search" data-command="toggle-search" data-toggle="tooltip" data-placement="top" title="Recherche"><i class="fa fa-ellipsis-v"></i></a></li>
                            </ul>
                        </div>
                        
                        <div class="row" style="display: none;">
                            <div class="col-xs-12 col-sm-12">
                                <div class="input-group c-search">
                                    <input type="text" class="form-control" id="contact-list-search">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search text-muted"></span></button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        
                        <ul class="row list-group" id="contact-list">
                            <li class="col-xs-12 col-sm-12 list-group-item">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-3">
                                        <img src="img/pages/formateur/profil.png" alt="Scott Stevens" class="img-responsive img-circle" />
                                    </div>
                                    <div class="col-xs-12 col-sm-9">
                                        <div class="row">
                                            <!-- <div class="col-xs-12 col-sm-8"> -->
                                                <span class="name">Prénom1 Nom1</span>
                                            <!-- </div> -->
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-8">
                                                <span class="glyphicon glyphicon-question-sign text-muted c-info" data-toggle="tooltip" title="En attente"></span>
                                                <span class="visible-xs"> <span class="text-muted">En attente</span><br/></span>                                            
                                                <span class="glyphicon glyphicon glyphicon-ok text-muted c-info" data-toggle="tooltip" title="Présent"></span>
                                                <span class="visible-xs"> <span class="text-muted">Présent</span><br/></span>
                                                <span class="glyphicon glyphicon-time text-muted c-info" data-toggle="tooltip" title="En retard"></span>
                                                <span class="visible-xs"> <span class="text-muted">En retard</span><br/></span>
                                                <span class="glyphicon glyphicon-remove text-muted c-info" data-toggle="tooltip" title="Absent"></span>
                                                <span class="visible-xs"> <span class="text-muted">Absent</span><br/></span>
                                           </div>
                                           <div class="col-xs-12 col-sm-4">
                                                <button type="button" class="btn btn-primary" value="apprenant1">Arrivé(e)</button>
                                           </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="col-xs-12 col-sm-12 list-group-item">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-3">
                                        <img src="img/pages/formateur/profil.png" alt="Seth Frazier" class="img-responsive img-circle" />
                                    </div>
                                    <div class="col-xs-12 col-sm-9">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-8">
                                                <span class="name">Prénom2 Nom2</span>
                                                <span class="glyphicon glyphicon-plus text-muted c-info" data-toggle="tooltip" title="session 2"></span>
                                                <span class="visible-xs"> <span class="text-muted">Session 2</span></span><br/>
                                            </div>
                                            <div class="col-xs-12 col-sm-4">
                                                <button type="button" class="btn btn-danger">Enlever de la liste</button>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-8">
                                                <span class="glyphicon glyphicon-question-sign text-muted c-info" data-toggle="tooltip" title="En attente"></span>
                                                <span class="visible-xs"> <span class="text-muted">En attente</span><br/></span>
                                                <span class="glyphicon glyphicon-ok text-muted c-info" data-toggle="tooltip" title="Présent"></span>
                                                <span class="visible-xs"> <span class="text-muted">Présent</span><br/></span>
                                                <span class="glyphicon glyphicon-time text-muted c-info" data-toggle="tooltip" title="En retard"></span>
                                                <span class="visible-xs"> <span class="text-muted">En retard</span><br/></span>
                                                <span class="glyphicon glyphicon-remove text-muted c-info" data-toggle="tooltip" title="Absent"></span>
                                                <span class="visible-xs"> <span class="text-muted">Absent</span><br/></span>
                                            </div>
                                            <div class="col-xs-12 col-sm-4">
                                                <button type="button" class="btn btn-primary" value="apprenant2">Arrivé(e)</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                        </ul>
                </div>
            </div><br><br>                    
                            
            <div class="row">
                <div class="col-xs-12 col-sm-offset-1 col-sm-10">                
                    <h2>Chercher des apprenants</h2>
                    <button type="button" class="btn btn-primary" value="ajoutApprenants" onclick="choisirApp()">Ajouter des apprenants</button>
                </div>
            </div>
                <!--
                <form>
                    <select>
                        <option>Session 1</option>
                        <option>Session 2</option>
                        <option>Session 3</option>
                    </select>
                    <button>Voir les apprenants de la session</button>
                </form>
                -->
                
            <!-- <div id="to-do" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title" id="mySmallModalLabel">A faire !!</h4>
                        </div>
                        <div class="modal-body">
                            <p>A faire la fenêtre de recherche d'apprenants.</p><br/>
                            <p><strong>Sorry<br/>
                            LB</strong></p>
                        </div>
                    </div>
                </div>
            </div>     -->            
                
        </div>