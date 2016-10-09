<!--Address: goo.gl/g0D4oO-->
<!DOCTYPE html>
<html>
<head>
<title>cyber_go(ne) -- Home</title>
<?php
	include_once("link.php");
?>
</head>
<body>
	<div class="wrapper">
	<?php
		include_once("header.php");
	?>
		<!--Body of the home page-->
		<div class="body">
			<div id="about">
				<img src="../image/about.png" alt="END CYBERBULLYING NOW">
			</div>
			<div id="home_register">
				<h2>Register for an account</h2>
				<form id="home_register_form" action="register.php" method="post">
					<div>
						<label> Username: <input type="text" name="username" id="username">
						</label> <label> Password: <input type="password" name="password"
							id="password">
						</label> <label> Confirm Password: <input type="password"
							name="password_confirm" id="password_confirm">
						</label> <label> Email: <input type="text" name="email" id="email">
						</label> <input type="submit" value="Sign up!">
					</div>
				</form>
				<a id="log_in" href="login.php"> Already have an account?<br> Sign
					in here.
				</a>
			</div>
		</div>
		<!--End of home body-->
	</div>
</body>
</html>