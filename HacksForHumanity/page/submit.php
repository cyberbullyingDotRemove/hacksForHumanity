<!DOCTYPE html>
<html lang="en">
<head>
<title>Submit Cyberbullying</title>
<?php
require_once ("link.php");
?>
<style>
	.body * {
		margin: 10px;
	}
	
	#post_label span {
		position: relative;
		bottom: 70px;
	}
</style>
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
					</label> <label id="post_label"><span>Post:</span> <textarea rows="5" cols="20" name="post"
							id="post"></textarea> <br>
					</label> <label> Screenshot/Image: <input type="file" name="image"
						id="image"><br>
					</label> <input type="image" src="../image/submit_button.png" value="Submit Cyberbullying"
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