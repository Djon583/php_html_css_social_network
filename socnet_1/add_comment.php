<?php  
$res=array();
$res['mes']="ERROR - could't add command";
$res['status']="ERROR";
include('db.php');
// session_start();
if($_SERVER['REQUEST_METHOD']=="POST"){
	if(isset($_POST['comment'])&&$_POST['comment']!=""&&isset($_POST['postid'])&&isset($_POST['userid'])){
		addComment($_POST['comment'], $_POST['postid'], $_POST['userid'], $_POST['owner']);
		$res['status']="OK";
		$res['mes']="Added successfully";
	}
	else{
		$res['mes']="Add comment!";
$res['status']="ERROR";
	}
}


echo json_encode($res);
?>