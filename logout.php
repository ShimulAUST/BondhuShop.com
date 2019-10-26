<?php 
	session_start();
	
	if($_SESSION['user']['id']){
		$_SESSION['user']['id'] = NULL;
		header("location:home.php");
	}
	
	?>