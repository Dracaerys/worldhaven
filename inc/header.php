<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<title>WorldHaven</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,500, 700,900&subset=latin,greek' rel='stylesheet' type='text/css'>
	<link href='/standard.css' rel='stylesheet' type='text/css'>
	<link href='/worldhaven/css/worldhaven.css' rel='stylesheet' type='text/css'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="/worldhaven/js/outside.js"></script>

</head>

<body>
	<div id="header">
		<a href="/worldhaven/" tabIndex="-1">
			<div id="home" class="headerBtn" tabIndex="-1">
			</div>
		</a>

		<div id="worlds" class="headerBtn" tabIndex="-1">
			<a href="#" tabIndex="-1"></a>
		</div>

		<div id="forums" class="headerBtn" tabIndex="-1">
			<a href="#" tabIndex="-1"></a>
		</div>

		<?php if (!isset($_SESSION["user"])) {
			echo "<a href='/worldhaven/login' tabIndex='-1'>"; } ?>
			<div id="login" class="headerBtn" tabIndex="-1">
			</div>
		</a>

	</div>		

		<?php 
		if (isset($_SESSION["user"])) { // Account box
			echo "
			<div id='account'>
				<div id='accountBox'>
					<img src='img/wb3.jpg' alt='avatar' height='80' width='80' id='avatar'>
					<div id='username'>
						" . $_SESSION["user"] . "
					</div>
				</div>
				<div id='accountOptions'>
					<button id='myAccount' class='btn'>My Account</button>
					<a href='/worldhaven/logout'>
						<button id='signOut' class='btn2'>Sign out</button>
					</a>
				</div>
			</div>";
		}
		
		if (isset($_SESSION["toast"])) { // Toast
			echo "
			<div id='toast'>
				".$_SESSION["toast"]."
			</div>";
			unset($_SESSION["toast"]); // Unsets var so that the toast only appears once
		} 
		?>

		

	<div id="nightMode">
		<div id="day" class="dayNight"></div>
		<div id="night" class="dayNight"></div>
	</div>
	