<!DOCTYPE html>
<html lang="en">
<head>
<title>Submit Cyberbullying</title>
<?php
	require_once("link.php");
?>
</head>
<body>
	<?php
		$url = $_POST['url'];
		$body = $_POST['body'];
		$image = $_POST['image'];
		
		$dbc = mysqli_connect("localhost", "root", "", "anti_cyber") or die("Could not load database");
		$query = "INSERT INTO submissions (user_id, url, body, image)"
				. "VALUES ('0', '$url', '$body', '$image')";
		$result = myslqli_query($dbc, $query);
		$mysqli_close($dbc);
	?>
</body>
</html>