<div class="container">
	<div class="contenue">
		<form class="form-horizontal">
			<fieldset>
				<!-- Form Name -->
				<legend>Création d'une nouvelle session</legend>
				<!-- Text input-->
				<div class="control-group">
					<label class="control-label" for="nom">Nom session</label>
					<div class="controls">
						<input id="nom" name="nom" type="text"
							placeholder="Ecrire le nom de  la session.." class="input-xlarge">
					</div>
				</div>
				<!-- Text input-->
				<div class="control-group">
					<label class="control-label" for="tag">Slug</label>
					<div class="controls">
						<input id="tag" name="tag" type="text"
							placeholder="Ecrire le slug" class="input-xlarge">
					</div>
				</div>
				<!-- Select Basic -->
				<div class="control-group">
					<label class="control-label" for="jourD">Date de début</label>
					<div class="controls">
						<select id="jourD" name="jourD" class="input-mini">
							<option value="0">--</option>
		              <?php for($i=1;$i<32;$i++){echo "<option value=\"$i\">$i</option> ";}?>
                    </select> <select id="moisD" name="moisD"
							class="input-mini">
							<option value="0">--</option>
	                    <?php for($i=1;$i<13;$i++){echo "<option value=\"$i\">$i</option> ";}?>
                    </select> <select id="anneD" name="anneD"
							class="input-mini">
							<option value="0">----</option>
                        <?php for($i=2000;$i<2016;$i++){echo "<option value=\"$i\">$i</option> ";}?>
                    </select>
					</div>
				</div>
				<!-- Select Basic -->
				<div class="control-group">
					<label class="control-label" for="jourFin">Date de Fin</label>
					<div class="controls">
						<select id="jourFin" name="jourFin" class="input-mini">
							<option value="0">--</option>
		                      <?php for($i=1;$i<32;$i++){echo "<option value=\"$i\">$i</option> ";}?>
                        </select> 
                        <select id="moisFin" name="moisFin" class="input-mini">
							<option value="0">--</option>
	                        <?php for($i=1;$i<13;$i++){echo "<option value=\"$i\">$i</option> ";}?>
                        </select>
                        <select id="anneFin" name="anneFin" class="input-mini">
							<option value="0">----</option>
	                        <?php for($i=2000;$i<2016;$i++){echo "<option value=\"$i\">$i</option> ";}?>
                         </select>
					</div>
				</div>
				<!-- Button -->
				<div class="control-group">
					<div class="controls">
						<button id="submit" name="submit" class="btn btn-primary btn-lg"
							style="float: right;">Créer</button>
					</div>
				</div>
			</fieldset>
		</form>
	</div>
</div>