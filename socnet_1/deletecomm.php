<?php  
$res=array();
$res['mes']="ERROR - could't delete comment";
$res['status']="ERROR";
	if($_SERVER['REQUEST_METHOD']=='POST'){
		if(isset($_POST['id'])){
			require_once 'db.php';
			$comm = getComment($_POST['id']);
			if($comm['userid']!=$_SESSION['user']['id']){
				$res['mes'] = "You can't delete it";
			}
			else{
				deleteComment($_POST['id']);
				$res['mes'] = "Deleted";
				$res['status'] = "OK";
			}
		}
	}
	echo json_encode($res);
?>