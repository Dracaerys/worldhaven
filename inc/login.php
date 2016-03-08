<?php
	/////Model/////
	
	function login() {
		include("dbconn.php");
		
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		// Query the table
		$sql_command = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
		$sql_command2 = "SELECT * FROM users WHERE username = '$username'";
		$result = mysqli_query($conn, $sql_command) or die(mysqli_error($conn));
		$result2 = mysqli_query($conn, $sql_command2) or die(mysqli_error($conn));
		
		$check = mysqli_num_rows($result);
		$check2 = mysqli_num_rows($result2);
		if ($check == 1) {
			echo "Logged In";
			session_start();
			$_SESSION["user"] = $username;
			$_SESSION["loginStatus"] = "true";
			//Redirect the user back to where he came from + set toast
			$_SESSION["toast"] = "Logged in";
			$referer = '/worldhaven/';
			header("Location: $referer");
			} elseif ($check == 0) {
				if ($check2 == 1) {
					echo "<p>Incorrect password. Please try again.</p>";
				} else {
					echo "<p>No such user found. Please try again.</p>";
				}
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
	<input type="text" name="username" placeholder="Username" class="inpt" required pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{2,15}$">
	<br>
	<input type="password" name="password" placeholder="Password" class="inpt" required pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{2,24}$">
	<br>
	<button type="submit" name="submit" class="btn">Log in</button>
</form>
<p id="registerLink">Don't have an account? <a href="/worldhaven/register">Register here.</a></p>