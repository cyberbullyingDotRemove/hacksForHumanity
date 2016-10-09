<!--Address: goo.gl/g0D4oO-->
<!DOCTYPE html>
<html>
<head>
<title>cyber_go(ne) -- Home</title>
<?php
	include_once("link.php");
?>
<style>
	#about img {
		width: 25%;
		height: 25%;
		border: medium solid rgb(37, 94, 105);
		margin: 10px;
	}
	
	div.body h3 {
		font-style: oblique;
	}
</style>
</head>
<body>
	<div class="wrapper">
	<?php
		include_once("header.php");
	?>
		<!--Body of the home page-->
		<div class="body">
			<div id="about">
				<h3>Report cyberbullying, with a purpose!</h3>
				<img src="../image/about.png" alt="END CYBERBULLYING NOW">
			</div>
			<div id="register_button">
				<a href="register.php">
					<img src="../image/register_button.png" alt="Don't have a profile? Create one here!">
				</a>
			</div>
		</div>
		<!--End of home body-->
		<?php
			include_once("footer.php");
		?>
	</div>
</body>
</html>