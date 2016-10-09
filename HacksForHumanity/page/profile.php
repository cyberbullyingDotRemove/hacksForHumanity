<!DOCTYPE html>
<html>
<head>
<title>cyber_go(ne) -- Profile</title>
<?php
include_once ("link.php");
?>
<style>
	.body {
		padding-bottom: 20px;
	}
	
	#point_stats, #recent_submissions {
		display: inline-block;
	}
	
	#point_stats {
		float: right;
		margin-right: 30px;
	}
	
	#recent_submissions {
	}

	table, tr, td {
		border: thin solid black;
	}
	
	table {
		border-collapse: collapse;
		margin-top: 10px;
	}
	
	.body ul {
		list-style-type: none;
	}
	
	a {
		text-decoration: none;
		color: black;
	}
	
	a:hover {
		color: red;
		font-weigth: bolder;
	}
	
	.body ul li {
		margin: 50px;
		font-weight: bold;
	}
	
	#point_stats input {
		background-color: yellow;
	}
</style>
</head>
<body>
	<div class="wrapper">
		<?php
		include_once ("header.php");
		function get_image($points) {
			if ($points < 5)
				return "../image/thumbs_up.png";
			else if ($points < 12)
				return "../image/thumbs_up.png";
			else if ($points < 25)
				return "../image/heart.png";
			else if ($points < 45)
				return "../image/heart.png";
			else if ($points < 70)
				return "../image/badge.png";
			else if ($points > 100) {
				return "../image/badge.png";
			}
		}
		function get_rank($points) {
			if ($points < 5)
				return "Rookie";
			else if ($points < 12)
				return "Proven Cyber Apprentice";
			else if ($points < 25)
				return "Upstanding Cyber Citizen";
			else if ($points < 45)
				return "Super Cyber Securer";
			else if ($points < 70)
				return "Extreme Bully Repellent";
			else if ($points > 100) {
				return "Grand Protecter Mach " . (($points - 100) / 30 + 1);
			}
		}
		?>
		<div class="body">
			<div id="recent_submissions">
				<h2>Recent Submissions:</h2>
				<table>
					<tr>
						<td>
							<ul id="url_list">
								<?php
								if (! isset ( $_SESSION ['id'] )) {
									echo "<h2>You must be logged in to see your profile!</h2>";
								} else {
									$dbc = mysqli_connect ( "localhost", "root", "", "anti_cyber" ) or die ( "Could not load database" );
									$id = $_SESSION ['id'];
									$query = "SELECT * FROM submissions WHERE user_id='$id'";
									$result = mysqli_query ( $dbc, $query ) or die ( "could not query" );
									
									$num_points = 0;
									while ( $row = mysqli_fetch_array ( $result ) ) {
										++ $num_points;
										
										echo "<li><a href=\"" . $row ['url'] . "\"> URL $num_points </a></li>";
									}
									
									mysqli_close ( $dbc );
								}
								?>
							</ul>
						</td>
						<td>
							<ul id="point_list">
								<?php
								if (isset ( $_SESSION ['id'] )) {
									for($i = 0; $i < $num_points; ++ $i) {
										echo "<li>1</li>";
									}
								}
								?>
							</ul>
						</td>
					</tr>
				</table>
			</div>
			<div id="point_stats">
				<?php
					if (isset ( $_SESSION ['id'] )) {
						echo "<h2>Total Points: $num_points</h2>";
						echo "<form action=\"\" method=\"post\" id=\"customize_avatar\">";
						echo "	<div>";
						echo "		<input type=\"submit\" value=\"Customize Avatar\">";
						echo "	</div>";
						echo "</form>";
						echo "<h2>";
						echo "	Rank: <em>" . get_rank($num_points) . "</em>";
						echo "</h2>";
						echo "<img src='" . get_image($num_points) . "'";
						echo "	alt='" . get_rank($num_points) . "'>";
					}
				?>
			</div>
		</div>
		<?php
		include_once ("footer.php");
		?>
	</div>
</body>
</html>