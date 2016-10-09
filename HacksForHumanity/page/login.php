<?php
session_start ();
?>
<form action="#" id="login_submit" method="post">
	<div>
		<?php
			if (isset($_SESSION['username'])) {
				echo "<h3>Logged in as " . $_SESSION['username'] . "</h3>";
				echo "<input type='submit' value='Log Out' name='logout'>";
			} else {
				echo "<label> Username: <input type=\"text\" name=\"username\" id=\"username\"><br>";
				echo "</label> <label> Password: <input type=\"password\" name=\"password\"";
				echo 		"id=\"password\"><br>";
				echo 		"</label>";
				echo 		"<input type=\"submit\" value=\"Log In\">";
			}
		?>
	</div>
	<div>
		<?php
			if (isset($_POST['username']) && isset($_POST['password'])) {
				$username = $_POST['username'];
				$password = $_POST['password'];
				
				$dbc = mysqli_connect("localhost", "root", "", "anti_cyber") or die("Error connecting to database");
				$query = "SELECT * FROM users WHERE username='$username' and password=SHA('$password')";
				$result = mysqli_query($dbc, $query) or die("Error executing query");
				
				if (!$row = mysqli_fetch_assoc($result)) {
					echo "<h3>Sorry! Your username and/or password is incorrect!";
				} else {
					$_SESSION['username'] = $row['username'];
				}
				
				mysqli_close($dbc);
			}
			
			if (isset($_POST['logout'])) {
				session_destroy();
			}
		?>
	</div>
</form>