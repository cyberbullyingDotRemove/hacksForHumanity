<!--Address: goo.gl/g0D4oO-->
<!DOCTYPE html>
<html>
<head>
<title>cyber_go(ne) -- Create Profile</title>
<?php
include_once ("link.php");
?>

<style>
	form#register_submit {
		margin: 10px;
	}
</style>

<script src="../script/register_validate.js"></script>
<script>
	window.onload = function() {
		document.getElementById("register_submit").onsubmit = function() {
			var userField = document.getElementById("register_username").value,
			passwordField = document.getElementById("register_password").value,
			confirmPwField = document.getElementById("register_password_confirm").value,
			emailField = document.getElementById("register_email").value;

			if (isEmpty(userField) || isEmpty(passwordField) || isEmpty(confirmPwField) || isEmpty(emailField)) {
				alert("Please fill out all of the fields!");
				return false;
			}

			if (!confirmPassword(passwordField, confirmPwField)) {
				alert("Please make sure your password is at least 8 characters long;\nand the two password fields must match!");
				return false;
			}

			if (!validateEmail(emailField)) {
				alert("Please enter a valid email address!");
				return false;
			}

			return true;
		};
	};
</script>
</head>
<body>
	<div class="wrapper">
	<?php
	require_once ("header.php");
	?>
	<div class="body">
		<h2>Create a profile so that you may submit evidence of cyberbullying online!</h2>
		<form action="register_confirm.php" method="post"
			id="register_submit">
			<div>
				<label> Username: <input type="text" name="register_username" id="register_username"><br>
				</label> <label> Password: <input type="password" name="register_password"
					id="register_password"><br>
				</label> <label> Confirm Password: <input type="password"
					name="register_password_confirm" id="register_password_confirm"><br>
				</label> <label> Email: <input type="text" name="register_email" id="register_email">
				</label> <input type="submit" value="Sign up!"><br>
			</div>
		</form>
		</div>
	<?php
	require_once ("footer.php");
	?>
	</div>
</body>
</html>