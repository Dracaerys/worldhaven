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
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,900&subset=latin,greek' rel='stylesheet' type='text/css'>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="js/outside.js"></script>
		<style>
		body {
			font-family: 'Roboto', sans-serif;
			margin: 0;
			padding: 0;
		}
		
		.noselect {
			-webkit-touch-callout: none;
			-webkit-user-select: none;
			-khtml-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
		}
		
		.center {
			margin-left: auto;
			margin-right: auto;
		}
		
		#header {
			width: 100%;
			height: 75px;
			background-color: #f1f0f1;
			box-shadow: 0px 2px 5px grey;
			position: fixed;
			top: 0px;
			z-index: 1;
			background-image: url("img/worldhaven.png");
			background-position: center;
			background-size: 600px 70px;
			background-repeat: no-repeat;
		}
		
		#mainContainer {
			width: 1200px;
			height: 1000px;
			background-color: white;
			box-shadow: 0px 2px 5px grey;
			margin: 100px auto 25px;
			overflow: hidden;
			padding: 10px;
		}
		
		.headerBtn {
			width: 50px;
			height: 50px;
			position: absolute;
			top: 10px;
			background-color: white;
			border-radius: 50px;
			background-repeat: no-repeat;
			background-position: center;
			background-size: 40px 40px;
			transition: box-shadow 0.3s;
			cursor:pointer;
		}
		
		#home {
			left: 10px;
			background-image: url("img/home.png");
		}
		
		#login {
			right: 10px;
			background-image: url("img/user.png");
		}
		
		.headerBtn:hover {
			box-shadow: 0px 1px 1px grey;
		}
		
		#welcomeImg {
			width: 650px;
			height: 300px;
			margin-top: 5%;
			font-weight: 700;
			background-color: white;
			box-shadow: 0px 2px 3px grey;
			border-radius: 5px 5px 0px 0px;
			color: white;
			text-align: center;
			font-size: 80px;
			line-height: 1.8em;
			text-shadow: 1px 1px grey;
		}
		
		#welcomeText {
			width: 630px;
			height: 80px;
			background-color: white;
			box-shadow: 0px 2px 3px grey;
			padding: 10px;
			border-radius: 0px 0px 5px 5px;
			color: #333;
			font-size: 18px;
		}
		
		#centerCol {
			width: 700px;
			height: 100%;
			background-color: #f1f0f1;
			box-shadow: 0px 2px 5px grey;
			overflow: hidden;
		}
		
		#leftCol {
			position: absolute;
			width: 205px;
			height: 980px;
			background-color: #f1f0f1;
			box-shadow: 0px 2px 5px grey;
			overflow: hidden;
			z-index: 0;
			padding: 10px;
		}
		
		.featuredWorlds {
			position: relative;
			height: 30%;
			background-color: white;
			box-shadow: 0px 4px 5px grey;
		}
		
		.worldHeader {
			height: 15%;
			color: #3498db;
			font-weight: 700;
			/*border-bottom: 5px solid #f1f0f1;*/
			text-align: center;
			line-height: 3em;
			box-shadow: 0px 1px 3px grey;
			margin-bottom: 3px;
		}
		
		#latestHeader {
			margin-top: 20px;
		}
		
		.test {
			position: relative;
			height: calc(16% - 8px);
			background-color: white;
			border-bottom: 3px solid #3498db;
			padding: 4px;
			transition: background-color 0.3s, box-shadow 0.3s;
			cursor:pointer;
			line-height: 0.9em;
		}
		
		.test:hover {
			box-shadow: 0px 2px 5px grey;
			z-index: 5;
		}
		
		dl {
			margin: 0;
			overflow: hidden;
			color: grey;
			font-size: 12px;
		}
		
		dt, dd {
			margin: 0;
		}
		
		#loginModal {
			width: 380px;
			height: 280px;
			background-color: blue;
			opacity: 0;
			position: fixed;
			top: 300px;
			left: calc(50% - 200px);
			background-color: white;
			box-shadow: 0px 2px 5px grey;
			border-radius: 3px;
			padding: 10px;
			font-size: 20px;
			text-align: center;
			background-image: url("img/worldhaven.png");
			background-position: 50% 25%;
			background-size: 250px 30px;
			background-repeat: no-repeat;
		}
		
		input {
			margin: 2% 10%;
			position: relative;
			height: 30px;
			width: 80%;
			font-size: 20px;
		}
		
		input:focus, textarea:focus {
			outline-color: #3498db;
		}
		
		form {
			margin-top: calc(25%);
		}
		
		span {
			position:absolute; 
			width:100%;
			height:100%;
			top:0;
			left: 0;
		}
		
		button {
			background-color: #3498db;
			border: none;
			color: white;
			width: 80px;
			height: 25px;
			box-shadow: 0px 2px 3px grey;
			margin-top: 10px;
		}
		
		button:hover, button:focus {
			outline: none;
			box-shadow: 0px 3px 3px grey;
		}
		
		</style>
		
	</head>
	
	<body>
	
		<div id="header">
		
			<div id="home" class="headerBtn">
				<a href="/worldhaven/"><span></span></a>
			</div>
			
			<div id="login" class="headerBtn">
			</div>
			
		</div>
		
		<div id="mainContainer">
		
			<div id="leftCol">
				<!--<div class="featuredWorlds">
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
				</div>-->
				
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