<?php
	/////Model/////
	
	function login() {
		include("dbconn.php");
		
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		// Query the table
		$sql_command = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
		$result = mysqli_query($conn, $sql_command) or die(mysqli_error($conn));
		
		$check = mysqli_num_rows($result);
		if ($check == 1) {
			echo "Logged In";
			session_start();
			$_SESSION["loginStatus"] = "true";
			//redirect the user back to where he came from
			//$referer = '/mydioptra/index.php'; //. $_GET['comefrom'];
			//header("Location: $referer");
			} elseif ($check == 0) {
			echo "No such user found. Please try again.";
			} else {
			echo "Hacker Detected";
		}
		
		mysqli_close($conn);
	}
?>


<?php
	//////Controller/////
	if (isset($_POST["submit"])) {
		login();
	}
?>


<!-----View----->
<form action="" method="POST">
	<input type="text" name="username" placeholder="Username">
	<br>
	<input type="password" name="password" placeholder="Password">
	<br>
	<input type="submit" name="submit" value="Log In">
</form>
