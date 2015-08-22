<?php
	$server = "localhost";
	$user = "WorldHaven";
	$password = "12345";
	$dbname = "WorldHaven";
	
	// Create connection
	$conn = mysqli_connect($server, $user, $password, $dbname);
	
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
	$ID = $_GET["ID"];
	$sql_commandWorld = 'SELECT * FROM worlds WHERE worldID=' . $ID;
	$resultWorld = mysqli_query($conn, $sql_commandWorld);
	
	$rowWorld = mysqli_fetch_assoc($resultWorld);
	
	mysqli_close($conn);	
?>

			<?php include("inc/header.html") ?>
			<div id="mainContainer">
				<div id="leftCol">
					<div class="worldInfo">
						<h2><?php echo $rowWorld["worldName"]; ?></h2>
						<p>Author: </p><?php echo $rowWorld["worldAuthor"]; ?><br>
						<p>Created: </p><?php echo $rowWorld["worldDate"]; ?><br>
						<p>Likes: </p><?php echo $rowWorld["worldLikes"]; ?>
					</div>
					<div class="featuredWorlds">
						<div id="popularHeader" class="worldHeader">
							Most Popular
						</div>
					</div>
					
					<div class="featuredWorlds">
						<div id="latestHeader" class="worldHeader">
							
						</div>
					</div>
				</div>
				
				<div id="centerCol" class="center">
					
					<img src=img/<?php echo $rowWorld["worldImage"]; ?> id="welcomeImg" class="noselect center">
					
					<div id="welcomeText" class="center">
					</div>
					
				</div>
			</div>
		</body>
	</html>					