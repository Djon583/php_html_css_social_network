<?php  
	$res=array(); $res['status'] = "ERROR"; 
$res['message'] = "Couldn't disable";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(isset($_POST['id'])){
		require_once 'db.php';
		$user = getUser($_SESSION['user']['email']);
		$res['status'] = "OK";
		if($user['status'] == 1){
			deactivate($_POST['id'], 0);
			$res['message'] = "Status is changed to disabled";
		}
		else{
			deactivate($_POST['id'], 1);
			$res['message'] = "Status is changed to enabled";
		}
	}
}
echo json_encode($res);
?>