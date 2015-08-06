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
	<head>
		<title>WorldHaven</title>
		<meta charset="UTF-8">
	</head>
	<body style="margin:0; padding:0">
		
		<div id="main" class="center">
				<?php echo $rowWorld["worldName"]; ?>
				<?php echo $rowWorld["worldAuthor"]; ?>
				<?php echo $rowWorld["worldLikes"]; ?>
				<?php echo $rowWorld["worldDate"]; ?>
		</div>

	</body>
</html>