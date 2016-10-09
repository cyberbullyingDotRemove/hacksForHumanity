<!--Address: goo.gl/g0D4oO-->
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>cyber_go(ne) -- Home</title>
<link rel="stylesheet" href="../style/style.css">
<link type="image/png" rel="icon" href="../image/logo.png">
</head>
<body>
	<div class="wrapper">
		<header>
			<img src="../image/logo.png" alt="Could not load logo" class="logo">
			<h1>cyber_go(ne)</h1>
			<nav>
				<ul>
					<li>Home</li>
					<li>About</li>
					<li>Advice Column</li>
					<li>Stats</li>
				</ul>
			</nav>
			<img src="../image/profile_picture.png"
				alt="Your profile picture did not load!" class="profile_pic">
		</header>
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
		<footer>
			<span class="copyright">&copy; inc.</span> <span class="contact_info">
				cyber_gone@gmail.com<br> 480.555.4444
			</span>
		</footer>
	</div>
</body>
</html>