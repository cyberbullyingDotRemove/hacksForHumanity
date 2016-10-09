<!--Address: goo.gl/g0D4oO-->
<!DOCTYPE html>
<html>
<head>
<title>cyber_go(ne) -- Create Profile</title>
<?php
include_once ("link.php");
?>
</head>
<body>
	<div class="wrapper">
		<?php
		$dbc = mysqli_connect ( "localhost", "root", "", "anti_cyber" ) or die ( "Failed connection to database" );
		$username = $_POST ['register_username'];
		$password = $_POST ['register_password'];
		$email = $_POST ['register_email'];
		
		$query = "INSERT INTO users (id, username, password, email, POINTS) VALUES ('0', '$username', SHA('$password'), '$email', '0')";
		
		$result = mysqli_query ( $dbc, $query ) or die ( "Error executing query to get profile to database" ) or die ( "Error querying to database" );
		mysqli_close ( $dbc );
		?>
		<div class="body">
			<h1>Account submitted! Get posting right away!</h1>
			<a href="index.php">Go back home and sign in</a>
		</div>
	</div>
</body>
</html>