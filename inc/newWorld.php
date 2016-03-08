<?php

function createWorld() {
	include("dbconn.php");

	$worldName = $_POST['worldName'];
	$worldDesc = $_POST['worldDesc'];
	//$user = $_SESSION['username'];

	$target_dir = "/worldhaven/worldImg";
	if (isset($_FILES["worldImg"])) {
		$target_file = $target_dir . basename($_FILES["worldImg"]["name"]);
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

		$check = getimagesize($_FILES["worldImg"]["tmp_name"]);
		if($check !== false) {
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			echo "File is not an image.";
			$uploadOk = 0;
		}

		if ($_FILES["worldImg"]["size"] > 500000) {
			echo "Sorry, your file is too large.";
		}

		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
			echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		}

		if (file_exists($target_file)) {
			//delete file
}
	}

}

if (isset($_POST["submit"])) {
	createWorld();
}
?>
<form action="" method="POST" enctype="multipart/form-data">
	<input type="text" name="worldName" placeholder="World name" class="inpt" required pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,15}$">
	<br>
	<textarea name="worldDesc" placeholder="World description" class="inpt" id="desc" maxlength="320"></textarea>
	<br>
	<input type="file" name="worldImg" placeholder="World image" class="inpt" id="worldImg">
	<br>
	<button type="submit" name="submit" class="btn">Create world</button>
</form>