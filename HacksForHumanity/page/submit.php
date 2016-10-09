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
	<form action="submit_confirm.php" method="post" id="submit_form">
		<div>
			<label>
				URL: <input type="text" size="256" name="url" id="url"><br>
			</label>
			<label>
				Post: <textarea rows="10" cols="20" name="post" id="post"></textarea><br>
			</label>
			<label>
				Screenshot/Image: <input type="file" name="image" id="image"><br>
			</label>
			<input type="submit" value="Submit Cyberbullying" id="submit">
		</div>
	</form>
</body>
</html>