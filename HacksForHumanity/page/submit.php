<!DOCTYPE html>
<html lang="en">
<head>
<title>Submit Cyberbullying</title>
<?php
require_once ("link.php");
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
		require_once ("header.php");
		?>
		<div class="body">
			<form action="submit_confirm.php" method="post" id="submit_form">
				<div>
					<label> URL: <input type="text" size="32" name="url" id="url"><br>
					</label> <label> Post: <textarea rows="5" cols="30" name="post"
							id="post"></textarea><br>
					</label> <label> Screenshot/Image: <input type="file" name="image"
						id="image"><br>
					</label> <input type="submit" value="Submit Cyberbullying"
						id="submit">
				</div>
			</form>
		</div>
		<?php
		require_once ("footer.php");
		?>
	</div>
</body>
</html>