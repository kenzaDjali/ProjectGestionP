<?php
// Test quel utilisateur est ? apprenant, secretaire, formateur
?>
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
					<div class= "user-image">
					<img src="img/profil.png" alt="Chemissi Ghassen" title="Chemissi Ghassen" class="img-circle">
					</div>
					</td>
					<td>News</td>
					<td>News Cate</td>
					<td class="text-center"><a class='btn btn-info btn-xs' href="#"><span
							class="glyphicon glyphicon-edit"></span> Edit</a> <a href="#"
						class="btn btn-danger btn-xs"><span
							class="glyphicon glyphicon-remove"></span> Del</a></td>
				</tr>
				<tr>
					<td>2</td>
					<td>Products</td>
					<td>Main Products</td>
					<td class="text-center"><a class='btn btn-info btn-xs' href="#"><span
							class="glyphicon glyphicon-edit"></span> Edit</a> <a href="#"
						class="btn btn-danger btn-xs"><span
							class="glyphicon glyphicon-remove"></span> Del</a></td>
				</tr>
				<tr>
					<td>3</td>
					<td>Blogs</td>
					<td>Parent Blogs</td>
					<td class="text-center"><a class='btn btn-info btn-xs' href="#"><span
							class="glyphicon glyphicon-edit"></span> Edit</a> <a href="#"
						class="btn btn-danger btn-xs"><span
							class="glyphicon glyphicon-remove"></span> Del</a></td>
				</tr>
			</table>
		</div>
	</div>
</div>

