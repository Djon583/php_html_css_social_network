<?php
	session_start();
	session_destroy();
	if(isset($_COOKIE['user'])){
		unset($_COOKIE['user']);
	}
	header('Location: ../app.php');
?>
