<?php

	$res = array();
	$res['message'] = "ERROR - couldn't add user";
	$res['status'] = "ERROR";

	if($_SERVER['REQUEST_METHOD']=='POST'){
require_once 'db.php';
$user=getUser($_POST['email']);
		if(isset($_POST['fname'])&&$_POST['fname']!=""&&isset($_POST['lname'])&&$_POST['lname']!=""&&isset($_POST['email'])&&$_POST['email']!=""&&isset($_POST['password'])&&$_POST['password']!=""&&isset($_POST['passwordconfirm'])&&$_POST['passwordconfirm']!=""){

			if($user==null){
			if($_POST['password']==$_POST['passwordconfirm']){
				
				addUser(trim($_POST['fname']), trim($_POST['lname']), trim($_POST['email']), trim($_POST['password']));

				$res['message'] = "User added successfully";
				$res['status'] = "OK";
			}
			else{
				$res['message']="Passwords mismatched!";
				$res['status']="ERROR";
			}	
}
			else{
			$res['message']="Email is already exist";
			$res['status']="ERROR";
}
		}

	}

	echo json_encode($res);

?>