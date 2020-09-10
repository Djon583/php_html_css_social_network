<?php  
	if(isset($_GET['id'])&&is_numeric($_GET['id'])){
		require_once 'db.php';
		$tasks = getAllPostsOfUser($_GET['id']);
		echo json_encode($tasks);
	}
?>