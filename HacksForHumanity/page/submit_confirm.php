<!DOCTYPE html>
<html lang="en">
<head>
<title>Submit Cyberbullying</title>
<?php
require_once ("link.php");
?>
</head>
<body>
	<div class="wrapper">
		<?php
		require_once ("header.php");
		
		$url = $_POST ['url'];
		$body = $_POST ['post'];
		$image = $_POST ['image'];
		
		$dbc = mysqli_connect ( "localhost", "root", "", "anti_cyber" ) or die ( "Could not load database" );
		$query = "INSERT INTO submissions (user_id, url, body, image)" . "VALUES ('" . $_SESSION ['id'] . "', '$url', '$body', '$image')";
		$result = mysqli_query ( $dbc, $query );
		mysqli_close ( $dbc );
		?>
		<div class="body">
			<h1>Thank you so much for your submission!</h1>
			<h2>Cyberbullying needs to be stopped and you just helped do that!</h2>
		</div>
	</div>
</body>
</html>