<?php

	if($_SERVER['REQUEST_METHOD']=='POST'){
		if(isset($_POST['id'])){
			require_once 'db.php';
			deletePost($_POST['id']);
		}
	}
?>