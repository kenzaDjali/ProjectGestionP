<?php
if (isset($_POST['submit']) && ! empty($_POST)) {
    
    // si admin
    if (false) {
        $page = "/admin/accueil";
        header('Location:'.$page);
    }else {
        $page ='/accueil';
        header('Location:'.$page);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title><?=$title;?></title>
<link href="assets/bootstrap/dist/css/bootstrap.min.css"
	rel="stylesheet">
<link href="css/pages/login.css" rel="stylesheet">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-7">
				<div class="panel panel-default">
					<div class="panel-heading">
						<span class="glyphicon glyphicon-lock"></span> Login
					</div>
					<div class="panel-body">
						<form class="form-horizontal" role="form" method="post" action="">
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-3 control-label"> Email</label>
								<div class="col-sm-9">
									<input type="email" class="form-control" id="inputEmail3"
										placeholder="Email" required>
								</div>
							</div>
							<div class="form-group">
								<label for="inputPassword3" class="col-sm-3 control-label">
									Password</label>
								<div class="col-sm-9">
									<input type="password" class="form-control" id="inputPassword3"
										placeholder="Password" required>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-9">
									<div class="checkbox">
										<label> <input type="checkbox" /> Remember me
										</label>
									</div>
								</div>
							</div>
							<div class="form-group last">
								<div class="col-sm-offset-3 col-sm-9">
									<button type="submit" class="btn btn-success btn-sm"
										name="submit">Sign in</button>
									<button type="reset" class="btn btn-default btn-sm">Reset</button>
								</div>
							</div>
						</form>
					</div>
					<div class="panel-footer">
						Not Registred? <a href="http://www.jquery2dotnet.com">Register
							here</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="assets/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="assets/jquery/dist/jquery.min.js"></script>
</body>
</html>
