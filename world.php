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

<!DOCTYPE html>
<html>
	<html>
		<head>
			<meta charset="UTF-8">
			<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,900&subset=latin,greek' rel='stylesheet' type='text/css'>
			<link href='css/worldhaven.css' rel='stylesheet' type='text/css'>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
			<script src="js/outside.js"></script>
			
		</head>
		
		<body>
			
			<?php include("inc/header.html") ?>
			<div id="mainContainer">
				<div id="leftCol">
					<div class="worldInfo">
						<h2><?php echo $rowWorld["worldName"]; ?></h2>
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
					
					<div id="welcomeImg" class="noselect center">
					</div>
					
					<div id="welcomeText" class="center">
						<?php echo $rowWorld["worldAuthor"]; ?>
						<?php echo $rowWorld["worldLikes"]; ?>
						<?php echo $rowWorld["worldDate"]; ?>
					</div>
					
				</div>
			</div>
		</body>
	</html>					