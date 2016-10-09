<!--Address: goo.gl/g0D4oO-->
<!DOCTYPE html>
<html>
<head>
<title>cyber_go(ne) -- Create Profile</title>
<?php
	include_once("link.php");
?>
<script src="register_validate.js"></script>
<script>
	window.onload = function() {
		
	};
</script>
</head>
<body>
	<div class="wrapper">
		<form action="register_submit.php" method="post" id="register_submit">
			<div>
				<label> Username: <input type="text" name="username" id="username" value=<?php echo $_POST['username']?>><br>
				</label> <label> Password: <input type="password" name="password"
					id="password" value=<?php echo $_POST['password']?>><br>
				</label> <label> Confirm Password: <input type="password"
					name="password_confirm" id="password_confirm" value=<?php echo $_POST['password_confirm']?>><br>
				</label> <label> Email: <input type="text" name="email" id="email" value=<?php echo $_POST['email']?>>
				</label> <input type="submit" value="Sign up!"><br>
			</div>
		</form>
	</div>
</body>
</html>