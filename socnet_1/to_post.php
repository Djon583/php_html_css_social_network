<?php
$res=array();
$res['mes']="ERROR - could't add the post";
$res['status']="ERROR";
include('db.php');
// session_start();
if($_SERVER['REQUEST_METHOD']=="POST"){
	if(isset($_POST['post'])&&$_POST['post']!=""&&isset($_POST['description'])){
		addPost($_SESSION['user']['fname'], $_SESSION['user']['lname'],$_POST['post'],$_POST['description'], $_SESSION['user']['id']);
		$res['status']="OK";
		$res['mes']="Added successfully";
	}
	else{
		$res['mes']="Add post!";
$res['status']="ERROR";
	}
}


echo json_encode($res);

?>