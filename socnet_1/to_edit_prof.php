<?php  
	$uri = "?error";
	if(isset($_POST['fname']) and isset($_POST['lname']) and isset($_POST['email'])){
		$uri = "?id=".$_POST['id']."&error";
		require_once 'db.php';
		if($_POST['oldpassword']==$_SESSION['user']['password']){
			if(changeProfile($_POST['id'], $_POST['email'], $_POST['newpassword'], $_POST['fname'], $_POST['lname'])){
				$uri="?success";
			}
		}
	}
	header("Location: change_profile.php$uri");
?>