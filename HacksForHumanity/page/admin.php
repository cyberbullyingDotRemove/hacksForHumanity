<!DOCTYPE html>
<html lang="en">
<head>
<title>Submit Cyberbullying</title>
<?php
	require_once("link.php");
?>
<script src="../script/submit_validate.js"></script>
<script>
	window.onload = function() {
		document.getElementById("submit_form").onsubmit = function() {
			var valid = true;
			if (!validateURL(document.getElementById("url").value)) {
				alert("Please enter a valid URL");
				valid = false;
			}

			if (!validateImage(document.getElementById("image").value)) {
				alert("Please enter an image file");
				valid = false;
			}

			return valid;
		};
	};
</script>
</head>
<body>
	<div class="wrapper">
		<?php
		require_once("header.php");
	?>
	<div class="body">
		<table>
		<tr>
			<th>Profile ID</th>
			<th>URL</th>
			<th>Body</th>
			<th>Image</th>
		</tr>
		<?php
			$dbc = mysqli_connect("localhost", "root", "", "anti_cyber") or die("Error connecting to database");
			$query = "SELECT * FROM submissions";
			$result = mysqli_query($dbc, $query) or die("Error executing query");
			
			while ($row = mysqli_fetch_array($result)) {
				echo "<td>" . $row['user_id'] . "</td>";
				echo "<td>" . $row['url'] . "</td>";
				echo "<td>" . $row['body'] . "</td>";
				echo "<td>" . $row['image'] . "</td>";
			}
			
			mysqli_close($dbc);
		?>
	</table>
	</div>
	<?php
		require_once("header.php");
	?>
	</div>
</body>
</html>