<?php
?>
        <div class="container">
            <div id="liste_session">
                <h2>Liste des sessions</h2>
                <table>
                    <thead>
                        <tr>
                            <th>nom de la session</th>
                            <th>dates</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tfoot>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td>session 1</td>
                            <td>JJ/MM/AAAA - JJ/MM/AAAA</td>
                            <td><button value="session1" onclick="affiche(this.value)">Choisir</button></td>
                        </tr>
                        <tr>
                            <td>session 2</td>
                            <td>JJ/MM/AAAA - JJ/MM/AAAA</td>
                            <td><button value="session2" onclick="affiche(this.value)">Choisir</button></td>
                        </tr>
                        <tr>
                            <td>session 3</td>
                            <td>JJ/MM/AAAA - JJ/MM/AAAA</td>
                            <td><button value="session3" onclick="affiche(this.value)">Choisir</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div id="liste_apprenants">
                <h2>Liste des apprenants</h2>
                <h3>Session A</h3>
                <p>
                  <label><input type="radio" name="choix" value="1" onclick="choisir(this.value)">J'accepte les retardataires</label><br>
                  <label><input type="radio" name="choix" value="0" onclick="choisir(this.value)">Je n'accepte pas les retardataires</label>
                </p>   
            </div>
        </div>
        <div class="container">       
                <div class="row">
                    <div class="col-xs-12 col-sm-offset-3 col-sm-6">
                        <div class="panel panel-default">
                            <div class="panel-heading c-list">
                                <span class="title">Contacts</span>
                                <ul class="pull-right c-controls">
                                    <li><a href="#cant-do-all-the-work-for-you" data-toggle="tooltip" data-placement="top" title="Add Contact"><i class="glyphicon glyphicon-plus"></i></a></li>
                                    <li><a href="#" class="hide-search" data-command="toggle-search" data-toggle="tooltip" data-placement="top" title="Toggle Search"><i class="fa fa-ellipsis-v"></i></a></li>
                                </ul>
                            </div>
                            
                            <div class="row" style="display: none;">
                                <div class="col-xs-12">
                                    <div class="input-group c-search">
                                        <input type="text" class="form-control" id="contact-list-search">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search text-muted"></span></button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            
                            <ul class="list-group" id="contact-list">
                                <li class="list-group-item">
                                    <div class="col-xs-12 col-sm-3">
                                        <img src="http://api.randomuser.me/portraits/men/49.jpg" alt="Scott Stevens" class="img-responsive img-circle" />
                                    </div>
                                    <div class="col-xs-12 col-sm-9">
                                        <span class="name">Scott Stevens</span><br/>
                                        <span class="glyphicon glyphicon-map-marker text-muted c-info" data-toggle="tooltip" title="5842 Hillcrest Rd"></span>
                                        <span class="visible-xs"> <span class="text-muted">5842 Hillcrest Rd</span><br/></span>
                                        <span class="glyphicon glyphicon-earphone text-muted c-info" data-toggle="tooltip" title="(870) 288-4149"></span>
                                        <span class="visible-xs"> <span class="text-muted">(870) 288-4149</span><br/></span>
                                        <span class="fa fa-comments text-muted c-info" data-toggle="tooltip" title="scott.stevens@example.com"></span>
                                        <span class="visible-xs"> <span class="text-muted">scott.stevens@example.com</span><br/></span>
                                    </div>
                                    <div class="clearfix"></div>
                                </li>
                                <li class="list-group-item">
                                    <div class="col-xs-12 col-sm-3">
                                        <img src="http://api.randomuser.me/portraits/men/97.jpg" alt="Seth Frazier" class="img-responsive img-circle" />
                                    </div>
                                    <div class="col-xs-12 col-sm-9">
                                        <span class="name">Seth Frazier</span><br/>
                                        <span class="glyphicon glyphicon-map-marker text-muted c-info" data-toggle="tooltip" title="7396 E North St"></span>
                                        <span class="visible-xs"> <span class="text-muted">7396 E North St</span><br/></span>
                                        <span class="glyphicon glyphicon-earphone text-muted c-info" data-toggle="tooltip" title="(560) 180-4143"></span>
                                        <span class="visible-xs"> <span class="text-muted">(560) 180-4143</span><br/></span>
                                        <span class="fa fa-comments text-muted c-info" data-toggle="tooltip" title="seth.frazier@example.com"></span>
                                        <span class="visible-xs"> <span class="text-muted">seth.frazier@example.com</span><br/></span>
                                    </div>
                                    <div class="clearfix"></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>                    

                <table>
                    <thead>
                        <tr>
                            <th>photo</th>
                            <th>prénom</th>
                            <th>nom</th>
                            <th></th><!-- pour icône : présent -->
                            <th></th><!-- pour icône : retard -->
                            <th></th><!-- pour icône : absent -->
                            <th></th><!-- pour bouton "arrivée" -->
                        </tr>
                    </thead>
                    <tfoot>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td>photo 1</td>
                            <td>prénom 1</td>
                            <td>nom 1</td>
                            <td>présent</td>
                            <td>en retard</td>
                            <td>absent</td>
                            <td><button value="apprenant1" onclick="arrive(this.value)">Arrivé(e)</button></td>
                        </tr>
                        <tr>
                            <td>photo 2</td>
                            <td>prénom 2</td>
                            <td>nom 2</td>
                            <td>présent</td>
                            <td>en retard</td>
                            <td>absent</td>
                            <td><button value="apprenant2" onclick="arrive(this.value)">Arrivé(e)</button></td>
                        </tr>
                        <tr>
                            <td>photo 3</td>
                            <td>prénom 3</td>
                            <td>nom 3</td>
                            <td>présent</td>
                            <td>en retard</td>
                            <td>absent</td>
                            <td><button value="apprenant3" onclick="arrive(this.value)">Arrivé(e)</button></td>
                        </tr>
                    </tbody>
                </table>
                <button onclick="choisirApp()">Ajouter des apprenants</button>
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
        </div>
        
        <script>
            // pour afficher la deuxième partie de la page : liste des apprenants de la session choisie 
            function affiche(id_session){     
            }    

            // pour signifier à la secrétaire (mais comment ??) si le formateur accepte ou non les retardataires
            function choisir(choix){
            }

            // pour signaler l'arrivée d'un apprenant
            function arrive(id_apprenant){
            }

            // pour afficher la zone de la page permettant le choix d'un apprenant
            // le form suivant
            function choisirApp(){
            }
        </script>
        <script>
        </script>
         