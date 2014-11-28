<?php
    $title = "Apprenant";
    
    ob_start();
?>
		<!-- pour l'apprenant -->
        <link href="css/pages/profil.css" rel="stylesheet">    
<?php
    $endHeader = ob_get_clean();
?>

<div class="container">
	<div class="contenu">
		<div class="col-sm-4 col-md-4 user-details">
            <div class="user-image">
                <img src="img/profil.png" alt="Chemissi Ghassen" title="Chemissi Ghassen" class="img-circle">
            </div>
            <div class="user-info-block">
                <div class="user-heading">
                    <h3>Chemissi GHASSEN</h3>
                </div>
                <ul class="navigation">
                    <li class="active">
                        <a data-toggle="tab" href="#information">
                            <span class="icon-user"></span>
                        </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#settings">
                            <span class="icon-calendar"></span>
                        </a>
                   </li>
                   
          <!--      <li>
                        <a data-toggle="tab" href="#email">
                            <span class="icon-envelope"></span>
                        </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#events">
                            <span class="icon-calendar"></span>
                        </a>
                    </li>  -->
                </ul>
                <div class="user-body">
                    <div class="tab-content">
                         <div id="information" class="tab-pane active">
                              <legend>Informations</legend>
                              <div>
                                    <span>Nom : Ghassen</span><br>
                                    </div>
                                    <div>
                                    <span>Prénom : Chemissi</span><br>
                                     </div>
                                    <div>
                                    <span>Date : 31/10/2014</span><br>
                                     </div>
                                    <div>
                                    <span>Heure d'arrivée : 09h00</span>
                               </div>
                                <form class="form-horizontal">
                                  <fieldset>
                                       <!-- Form Name -->
                                        <legend>je suis arrivé à</legend>
                                        
                                       <!-- Button -->
                                        <div class="control-group">
                                        	<label class="control-label" for="singlebutton"></label>
                                        	<div class="controls">
                                        		<button id="singlebutton" name="singlebutton"
                                        			class="btn btn-success">Arrivée</button>
                                        	</div>
                                        </div>
                                   </fieldset>
                                </form>
                                      
                 </div>
                         <div id="settings" class="tab-pane">
                         <div class="tab-content">
                         <div id="information" class="tab-pane active">
                              <legend>Ponctualité</legend>
                                  <div>
                                    	<div class="row">
                                    		<div class="span3">
                                            	<ul class="unstyled">
                                            	    <li>4 absences<span class="pull-right strong"></span>
                                            	        <div class="progress progress-important">
                                            	            <div class="bar" style="width: 5%;"></div>
                                            	        </div>
                                            	    </li>
                                            	    <li>8 retards<span class="pull-right strong"></span>
                                            	        <div class="progress progress-danger active">
                                            	            <div class="bar" style="width: 10%;"></div>
                                            	        </div>
                                 <div class="container">
                                            	<div class="row">
                                        			<div class="col-md-6">
                                        				<div class="panel panel-primary">
                                        					<div class="panel-heading"></div>
                                        					
                                        					<table class="table table-hover" id="dev-table">
                                        						<thead>
                                        							<tr>
                                        								<th>#</th>
                                        								<th>Date</th>
                                        								<th>Demi-journée</th>
                                        								<th>Absence / Retard</th>
                                        								<th>Motif</th>
                                        							</tr>
                                        						</thead>
                                        						<tbody>
                                        							<tr>
                                        								<td>1</td>
                                        								<td>22/09/2014</td>
                                        								<td>matin</td>
                                        								<td>absent</td>
                                        								<td>RDV médecin</td>
                                        							</tr>
                                        							<tr>
                                        								<td>2</td>
                                        								<td>12/10/2014</td>
                                        								<td>après-midi</td>
                                        								<td>absent</td>
                                        								<td>Raison familiale grave</td>
                                        							</tr>
                                        							<tr>
                                        								<td>3</td>
                                        								<td>01/11/2014</td>
                                        								<td>matin</td>
                                        								<td>en retard</td>
                                        								<td>RDV assistante sociale</td>
                                        							</tr>
                                        						</tbody>
                                        					</table>
                                        				</div>
                                        			</div>
                                            </div>
                                    	</div>
                                    </div>
                               </div>
                       </div>
                </div>
            </div>
                    
        </div>
	</div>
</div>