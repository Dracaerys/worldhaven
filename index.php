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
	
	$sql_commandPopular = 'SELECT * FROM worlds order by worldLikes desc limit 5';
	$resultPopular = mysqli_query($conn, $sql_commandPopular);
	
	$sql_commandLatest = 'SELECT * FROM worlds order by worldDate desc limit 5';
	$resultLatest = mysqli_query($conn, $sql_commandLatest);
	
	mysqli_close($conn);	
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,900&subset=latin,greek' rel='stylesheet' type='text/css'>
		<link href='css/worldhaven.css' rel='stylesheet' type='text/css'>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="js/outside.js"></script>
		
	</head>
	
	<body>
	
		<?php include("inc/header.html") ?>
		
		<div id="mainContainer">
		
			<div id="leftCol">
				<div class="featuredWorlds">
					<div id="popularHeader" class="worldHeader">
						Most Popular
					</div>
					<?php while($rowPopular = mysqli_fetch_assoc($resultPopular)) { ?>
					<div class="test"><?php echo $rowPopular["worldName"]; ?>
						<a href="world.php?ID=<?php echo $rowPopular["worldID"] ?>"><span></span></a>
						<dl>
							<dt><?php echo $rowPopular["worldAuthor"]; ?>
							</dt>
							<dd><?php echo $rowPopular["worldLikes"];?> Likes
							</dd>
						</dl>
					</div>
					<?php } ?>
				</div>
				
				<div class="featuredWorlds">
					<div id="latestHeader" class="worldHeader">
						Latest
					</div>
					<?php while($rowLatest = mysqli_fetch_assoc($resultLatest)) { ?>
					<div class="test"><?php echo $rowLatest["worldName"]; ?>
						<a href="world.php?ID=<?php echo $rowLatest["worldID"] ?>"><span></span></a>
						<dl>
							<dt><?php echo $rowLatest["worldAuthor"]; ?>
							</dt>
							<dd><?php echo $rowLatest["worldLikes"];?> Likes
							</dd>
						</dl>
					</div>
					<?php } ?>
				</div>
			</div>
		
			<div id="centerCol" class="center">
			
				<div id="welcomeImg" class="noselect center">
					WELCOME TO<br> WORLDHAVEN
				</div>
			
				<div id="welcomeText" class="center">
					WorldHaven is a new site created to help worldbuilders manage, organize and share their worlds.
				</div>
				
			</div>
			
		</div>
		
		<div id="loginModal">
		<form>
		<input type="text" name="username" placeholder="Username">
		<br>
		<input type="password" name="password" placeholder="Password">
		</form>
		<button type="button">Log in</button>
		</div>
		<script>
		function randomImage() {
			var description = [
				"wb1",
				"wb2",
				"wb3",
				"wb4"
			];

			var size = description.length
			var x = Math.floor(size*Math.random())
			document.getElementById("welcomeImg").style.backgroundImage = 'url(img/'+description[x]+'.jpg)';
		}
		
		document.onload = randomImage();
		
		$("#login").click(function(){
			$('#loginModal').animate({opacity:'1'}, 300);
			$("#loginModal").on("clickoutside", function(event){
				if ($("#loginModal").css("opacity") == 1) {
					$(this).animate({opacity:'0'}, 300);
				}
			});
		});

		</script>
	</body>
</html>