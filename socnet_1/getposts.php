<?php 
include('db.php');
if($_SERVER['REQUEST_METHOD']=="GET"){
	$result=getAllPosts();
	
	echo json_encode($result);
}
?>