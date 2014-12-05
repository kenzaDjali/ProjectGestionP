<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title><?=$title;?></title>
<link href="assets/bootstrap/dist/css/bootstrap.min.css"
	rel="stylesheet">
<link href="assets/fontawesome/css/font-awesome.min.css" rel="stylesheet">
<link href="css/pages/speed_login.css" rel="stylesheet">
</head>
<body>
<div class="fun-cube"></div>
<!-- heirarchy: #cuboid > form > div*4(cuboid faces) -->
<div id="cuboid">
	<form id ="form1" method ="POST" action ="">
		<!-- #1 hover button -->
		<div>
			<p class="cuboid-text">Connexion Rapide</p>
		</div>
		<!-- #2 text input -->
		<div>
			<!-- Label to trigger #submit -->
			<label for="submit" class="submit-icon">
				<i class="fa fa-chevron-right"></i>
			</label>
			<input type="text" id="password" name ="code" class="cuboid-text" placeholder="Votre code secret" autocomplete="off"/>
			<!-- hidden submit button -->
			<button  type="submit" id="submit"></button>
		</div>
		<!-- #3 loading message -->
		<div>
			<p class="cuboid-text loader">Veuillez patienter un moment</p>
		</div>
		<!-- #4 success message -->
		<div>
			<!-- reset/retry button -->
			<span class="reset-icon"><i class="fa fa-refresh"></i></span>
			<p class="cuboid-text">Vous etes arrivé</p>
		</div>
	</form>
</div>

    <!-- jQuery -->
    <script src="http://thecodeplayer.com/u/js/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="assets/jquery/dist/jquery.min.js"></script>
	<script src="assets/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="js/speed_login.js"></script>
</body>
</html>

