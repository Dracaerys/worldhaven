<?php

	function createWorld() {
		include("dbconn.php");
		
		$worldName = $_POST['worldName'];
		$worldDesc = $_POST['worldDesc'];
		$user = $_SESSION['username'];


?>
<form action="" method="POST">
	<input type="text" name="worldName" placeholder="World name" class="inpt" required pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,15}$">
	<br>
	<textarea rows="5"> type="text" name="worldDesc" placeholder="World description" class="inpt" required></textarea>
	<br>
	<button type="submit" name="submit" class="btn">Register</button>
</form>