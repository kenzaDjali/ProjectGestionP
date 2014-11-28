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
<div class="fun-cube"><i class="fa fa-cube"></i></div>
<h1>Connexion Rapide</h1>
<div class ="fond_ecran">
<!-- heirarchy: #cuboid > form > div*4(cuboid faces) -->
<div id="cuboid">
	<form>
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
			<input type="text" id="email" class="cuboid-text" placeholder="Your Email" autocomplete="off"/>
			<!-- hidden submit button -->
			<input type="submit" id="submit" />
		</div>
		<!-- #3 loading message -->
		<div>
			<p class="cuboid-text loader">Just a moment</p>
		</div>
		<!-- #4 success message -->
		<div>
			<!-- reset/retry button -->
			<span class="reset-icon"><i class="fa fa-refresh"></i></span>
			<p class="cuboid-text">Thankyou, we'll be in touch</p>
		</div>
	</form>
</div>
</div>
<!-- jQuery -->
<script src="http://thecodeplayer.com/u/js/jquery-1.9.1.min.js" type="text/javascript"></script>

    <script src="assets/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="assets/jquery/dist/jquery.min.js"></script>
	<script src="js/speed_login.js"></script>
</body>
</html>

