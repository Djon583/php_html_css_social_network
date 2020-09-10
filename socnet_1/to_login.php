<?php
require_once 'db.php';
$log=array();
$log['mes']="ERROR";
$log['status']="ERROR";
if($_SERVER['REQUEST_METHOD']=='GET'){
	if(isset($_GET['emaillog'])&&$_GET['emaillog']!=""&&isset($_GET['passwordlog'])&&$_GET['passwordlog']!=""){
		$user=getUser($_GET['emaillog']);
			if($user!=null){
				if($user['password']==$_GET['passwordlog']){
					$_SESSION['user']=$user;
					$log['status']="OK";
					$log['mes']="Login successfully!";
				}else{
					$log['mes']="Password incorrect!";
        			$log['status']="ERROR";
				}
			}
			else{
				$log['mes']="User not found!";
				$log['status']="ERROR";
			}
		}
}
echo json_encode($log);



?>