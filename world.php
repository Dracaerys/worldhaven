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

<?php include("inc/header.php") ?>
<div id="mainContainer">
	<div id="leftCol"  class="box">
		<div class="worldInfo">
			<div class="worldHeader">
				<?php echo $rowWorld["worldName"]; ?>
			</div>
			<p>Author: </p><?php echo $rowWorld["worldAuthor"]; ?><br>
			<p>Created: </p><?php echo $rowWorld["worldDate"]; ?><br>
			<p>Likes: </p><?php echo $rowWorld["worldLikes"]; ?>
		</div>

	</div>

	<div id="centerCol" class="center box">

		<img src=img/<?php echo $rowWorld["worldName"]; ?>.png id="welcomeImg" class="noselect center">

		<?php if ($rowWorld["worldDesc"] != "") {
			echo "<div id='welcomeText' class='center'>"
			.$rowWorld["worldDesc"]."
		</div>";
		} ?>
		

	</div>
</div>
</body>
</html>					