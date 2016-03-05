<?php
	/////Model/////
	
	function login() {
		include("dbconn.php");
		
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$password2 = $_POST['password2'];
		
		if ($password == $password2) {
			if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
				// Query the table
				$sql_command = "SELECT * FROM users WHERE username = '$username'";
				$sql_command2 = "SELECT * FROM users WHERE username = '$email'";
				$result = mysqli_query($conn, $sql_command) or die(mysqli_error($conn));
				$result2 = mysqli_query($conn, $sql_command2) or die(mysqli_error($conn));
			
				$check = mysqli_num_rows($result);
				$check2 = mysqli_num_rows($result2);
				if ($check == 1 AND $check2 == 1) {
					echo "<p>There is already an existing account with this username and email.</p>";
				} elseif ($check == 1) {
					echo "<p>There is already an existing account with this username.</p>";
				} elseif ($check2 == 1) {
					echo "<p>There is already an existing account with this email.</p>";
				} else {
					$sql_insert = "INSERT INTO users (username, password, email) VALUES ('".$username."','".$password."','".$email."')";
					if ($conn->query($sql_insert) === TRUE) {
						$_SESSION["toast"] = "Account created."; //Set toast
						$referer = '/worldhaven/';
						header("Location: $referer");
					} else {
						echo "Error: " . $sql_insert . "<br>" . $conn->error;
					}
				}
			} else {
				echo "<p>Invalid email.</p>";
			}
		} else {
			echo "<p>The passwords don't match.</p>";
		}
		/*if ($check == 1) {
			echo "Logged In";
			session_start();
			$_SESSION["user"] = $username;
			$_SESSION["loginStatus"] = "true";
			//redirect the user back to where he came from
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
		}*/
		
		mysqli_close($conn);
	}
?>


<?php
	//////Controller/////
	if (isset($_POST["submit"])) {
		login();
	}
?>

<form action="" method="POST">
	<input type="text" name="username" placeholder="Username" class="inpt" required pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{2,15}$">
	<br>
	<input type="email" name="email" placeholder="Email" class="inpt" required>
	<br>
	<input type="password" name="password" placeholder="Password" class="inpt" required pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{2,24}$">
	<br>
	<input type="password" name="password2" placeholder="Confirm password" class="inpt" required pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{2,24}$">
	<br>
	<button type="submit" name="submit" class="btn">Register</button>
</form>
