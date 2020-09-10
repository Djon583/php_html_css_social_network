<?php  
include('db.php');
// session_start();
if($_SERVER['REQUEST_METHOD']=="GET"){
	if(isset($_GET['postid'])&& is_numeric($_GET['postid'])){
		$result = getComments($_GET['postid']);
		echo json_encode($result);
	}
}
?>