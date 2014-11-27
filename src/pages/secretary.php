<?php ?>

<div class="container">
	<div class="contenu">
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<h4>Selon :</h4>
					<div class="row">
						<div class="col-md-12">
							<div class="btn-group" role="group">
								<button type="button" class="btn btn-default" name="session">Session</button>
								<button type="button" class="btn btn-primary" name="formateur">Formateur</button>
								<button type="button" class="btn btn-default" name="apprenant">Apprenant</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="contenu">
		<h4>Tous les apprenants</h4>
		<div class="row col-md-6 col-md-offset-2 custyle">
			<table class="table table-striped custab">
				<thead>
					<tr>
						<th>Photo</th>
						<th>Nom</th>
						<th>Prénom</th>
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<tr>
					<td>
						<div class="user-image">
							<img src="img/avatarH.png" class="img-circle">
						</div>
					</td>
					<td>Mister</td>
					<td>H</td>
					<td class="text-center"><a href="#"><i class="icon-plus-sign-alt"></i><span>Plus</span></a>
						<a href="#"><span class="icon-remove"></span> Supprimer </a></td>
				</tr>
				<tr>
					<td>
						<div class="user-image">
							<img src="img/avatarF.png" class="img-circle">
						</div>
					</td>
					<td>Lady</td>
					<td>Women</td>
					<td class="text-center"><a href="#"><i class="icon-plus-sign-alt"></i><span>Plus</span></a>
						<a href="#"><span class="icon-remove"></span> Supprimer </a></td>
				</tr>
				<tr>
					<td>
						<div class="user-image">
							<img src="img/avatarIronMan.png" class="img-circle">
						</div>
					</td>
					<td>Iron</td>
					<td>Man</td>
					<td class="text-center"><a href="#"><i class="icon-plus-sign-alt"></i><span>Plus</span></a>
						<a href="#"><span class="icon-remove"></span> Supprimer </a></td>
				</tr>
			</table>
		</div>
	</div>
</div>

