<?php 
	session_start();
	session_unset(); 
	session_destroy();
		
	$referer = '/worldhaven/';
	header("Location: $referer");
?> 