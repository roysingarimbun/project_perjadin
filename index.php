<?php
$appurl = 'http://localhost/perjadin/';
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Perjadin UINSU</title>
	<meta name="description" content="">
	<meta name="author" content="pixelcave">
	<meta name="robots" content="noindex, nofollow">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0">

	<!-- Icons -->
	<!-- The following icons can be replaced with your own; they are used by desktop and mobile browsers -->
	<link rel="shortcut icon" href="img/favicon.png">
	<!-- END Icons -->

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/plugins.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/themes.css">
	<script src="js/vendor/modernizr-3.3.1.min.js"></script>
</head>

<body>
	<img src="assets/images/auth-one-bg.jpg" alt="Full Background" class="full-bg animation-pulseSlow">

	<div id="login-container">
		<!-- Login Header -->
		<h1 class="h3 text-black text-center push-top-bottom animation-pullDown">
			<i class="text-black-op"></i> <strong>Si-Perjadin</strong>
		</h1>
		<!-- END Login Header -->

		<!-- Login Block -->
		<div class="block animation-fadeInQuick">
			<!-- Login Title -->
			<div class="block-title">
				<h2>Silahkan Login</h2>
			</div>
			<!-- END Login Title -->

			<!-- Login Form -->
			<form id="form-login" action="auth_login.php" id="popup-validation" method="post" class="form-horizontal">
				<div class="form-group">
					<label for="username" class="col-xs-12">Username</label>
					<div class="col-xs-12">
						<input type="text" id="login-email" name="username" class="form-control" placeholder="Username">
					</div>
				</div>
				<div class="form-group">
					<label for="password" class="col-xs-12">Password</label>
					<div class="col-xs-12">
						<input type="password" id="password" name="password" class="form-control" placeholder="Password">
					</div>
				</div>


				<div class="form-group">
					<label for="tahun" class="col-xs-12">Tahun</label>
					<div class="col-xs-8">
						<select class='validate[required] form-control' name='tahunaktif' id='tahunaktif' placeholder="tahun">
							<?php
							include "config/library.php";
							?>
							<option>
								<script>
									document.write(new Date().getFullYear())
								</script>
							</option>
							<?php
							include "config/koneksi.php";
							$thn = mysql_query("SELECT * FROM tahunaktif order by id");
							while ($p = mysql_fetch_array($thn)) {

								echo "
							<option value=\"$p[thnaktif]\">$p[thnaktif]</option>\n";
							}
							echo "";

							?>
						</select>
					</div>
				</div>

				<div class="form-group form-actions">
					<div class="col-xs-12 text-right">
						<button type="submit" class="btn btn-rounded btn-info">Sign In</button>
					</div>
				</div>

			</form>
			<!-- END Login Form -->
		</div>
	</div>
	<!-- END Login Container -->
</body>

</html>