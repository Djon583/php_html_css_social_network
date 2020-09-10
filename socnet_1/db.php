<?php
	session_start();
	try {
		$connection=new PDO('mysql:host=localhost;dbname=socnet2', 'root', 'Laptop123456789$');
	} catch (PDOException $e) {
		echo $e->getMessage();
	  }

function addUser($fname,$lname,$email,$password){
	global $connection;
		$query=$connection->prepare("INSERT INTO users (id, fname, lname, email, password)
			VALUES(NULL,:fname, :lname, :email,:password)");
		$rows=$query->execute(array("fname"=>$fname, "lname"=>$lname, "email"=>$email, "password"=>$password));
		return $rows>0;
}
function changeProfile($id, $email, $password, $fname, $lname){
	global $connection;
	$query = $connection->prepare("UPDATE users
		SET email=:email,
			password=:password,
			fname=:fname,
			lname=:lname
			WHERE id=:id");
	$rows = $query->execute(array("email"=>$email, "password"=>$password, "fname"=>$fname, "lname"=>$lname, "id"=>$id));
	return $rows>0;
}

function getUser($email){
	global $connection;
		$query=$connection->prepare("SELECT * FROM users where email=:email");
		$query->execute(array("email"=>$email));
		$result=$query->fetch();
		return $result;
}
function getUserById($id){
	global $connection;
		$query=$connection->prepare("SELECT * FROM users where id=:id");
		$query->execute(array("id"=>$id));
		$result=$query->fetch();
		return $result;
}
function getAllUsers(){
		global $connection;
		$query=$connection->prepare("SELECT DISTINCT * FROM users ");
		$query->execute();
		$result=$query->fetchAll();
		return $result;
	}

function addPost($fname,$lname,$post,$description,$userid){
	global $connection;
		$query=$connection->prepare("INSERT INTO posts (id,fname,lname,post,description,userid)
			VALUES(NULL,:fname, :lname, :post, :description, :userid)");
		$rows=$query->execute(array("fname"=>$fname, "lname"=>$lname, "post"=>$post, "description"=>$description, "userid"=>$userid));
		return $rows>0;
}
function getAllPosts(){
	global $connection;
		$query=$connection->prepare("SELECT  * FROM posts");
		$query->execute();
		$result=$query->fetchAll();
		return $result;
	}
function getAllPostsOfUser($userid){
	global $connection;
		$query=$connection->prepare("SELECT  * FROM posts WHERE userid=:userid");
		$query->execute(array("userid"=>$userid));
		$result=$query->fetchAll();
		return $result;
	}
function deletePost($id){
		global $connection;
		$query=$connection->prepare("DELETE FROM posts where id=:id");
		$rows=$query->execute(array("id"=>$id));
		return $rows>0;
	}

	function getPost($id){
		global $connection;
		$query = $connection->prepare("SELECT * FROM posts where id=:id");
		$query->execute(array("id"=>$id));
		$result = $query->fetch();
		return $result;
	}

	function addComment($comm, $postid, $userid, $owner){
		global $connection;
		$query = $connection->prepare("INSERT INTO comms(id, comment, postid, userid, owner) VALUES(NULL, :comm, :postid, :userid, :owner)");
		$rows = $query->execute(array("comm"=>$comm, "postid"=>$postid, "userid"=>$userid, "owner"=>$owner));
		return $rows>0;
	}

	function getComments($postid){
		global $connection;
		$query = $connection->prepare("SELECT * FROM comms WHERE postid=:postid");
		$query->execute(array("postid"=>$postid));
		$result = $query->fetchAll();
		return $result;
	}

	function getComment($id){
		global $connection;
		$query = $connection->prepare("SELECT * FROM comms WHERE id=:id");
		$query->execute(array("id"=>$id));
		$result = $query->fetch();
		return $result;
	}

	function deleteComment($id){
		global $connection;
		$query = $connection->prepare("DELETE FROM comms WHERE id=:id");
		$rows = $query->execute(array("id"=>$id));
		return $rows>0;
	}

	function deactivate($id, $status){
		global $connection;
		$query = $connection->prepare("UPDATE users
			SET status=:status
			WHERE id=:id");
		$rows=$query->execute(array("id"=>$id, "status"=>$status));
		return $rows>0;
	}

	function editpost($id, $post, $description){
		global $connection;
		$query = $connection->prepare("UPDATE posts
			SET post=:post,
				description=:description
			WHERE id=:id");
		$rows = $query->execute(array("id"=>$id, "post"=>$post, "description"=>$description));
		return $rows>0;
	}

//============= Search user
function searchUser($key){
  global $connection;
  $query=$connection->prepare("SELECT * FROM `users` WHERE `fname` LIKE '%".$key."%'");
  $query->execute(array("fname"=>$key));
  $result=$query->fetchAll();
  return $result;
}
//============= Notifications

function getNotifAll(){
  global $connection;
  $query=$connection->prepare("SELECT * FROM `friends`");
  $query->execute();
  $result=$query->fetchAll();
  return $result;
}

function addNoti($fid, $sid){
  global $connection;
  $sql1 = "INSERT INTO friends (first_user_id,second_user_id) VALUES (?,?)";
  $stminsert1 = $connection->prepare($sql1);
  $result1 =   $stminsert1->execute([$fid, $sid]);
}

function reject($fid, $sid){
  global $connection;
  $query1 = $connection->prepare("DELETE FROM friends WHERE second_user_id ='". $sid ."' AND first_user_id ='". $fid ."'");
  $rows1 = $query1->execute(array("second_user_id"=>$sid));

}

function accept($fid, $sid){
  global $connection;
  $n = 1;

  $sql1 = "INSERT INTO friends (first_user_id,second_user_id) VALUES (?,?)";
  $stminsert1 = $connection->prepare($sql1);
  $result1 =   $stminsert1->execute([$sid, $fid]);

  $query1=$connection->prepare("UPDATE `friends` SET `enbdis`= '". $n ."' WHERE `first_user_id`='". $fid ."' AND `second_user_id`='". $sid ."' ");
  $rows1=$query1->execute(array("first_user_id" =>$fid, "second_user_id" => $sid));

  $query2=$connection->prepare("UPDATE `friends` SET `enbdis`= '". $n ."' WHERE `first_user_id`='". $sid ."' AND `second_user_id`='". $fid ."' ");
  $rows2=$query2->execute(array("first_user_id" =>$fid, "second_user_id" => $sid));
}

//=======================Send messages

function sendMes($fid,$sid,$text){
  global $connection;
  $sql = "INSERT INTO messages (first_user_id,second_user_id,text) VALUES (?,?,?)";
  $stminsert = $connection->prepare($sql);
  $result =   $stminsert->execute([$fid, $sid,$text]);
}
function getAllMes(){
  global $connection;
  $query=$connection->prepare("SELECT * FROM `messages`");
  $query->execute();
  $result=$query->fetchAll();
  return $result;
}



?>
