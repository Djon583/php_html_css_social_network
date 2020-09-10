<?php  
	$res=array(); $res['status'] = "ERROR"; 
$res['mes'] = "Couldn't edit";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
$res['mes'] = "Couldn't edit ss";
	if(isset($_POST['id'])&&isset($_POST['title'])&&isset($_POST['description'])){
		require_once 'db.php';
		editpost($_POST['id'], $_POST['title'], $_POST['description']);
		$res['status'] = "OK";
		$res['mes'] = "Success";
	}
}
echo json_encode($res);
?>