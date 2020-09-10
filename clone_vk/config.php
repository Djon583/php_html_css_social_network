<?php
$db_user = "root";
$db_pass = "Laptop123456789$";
$db_name = "usersvk";

$db = new PDO('mysql:host=localhost;dbname='. $db_name . ';charset=utf8',$db_user,$db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);





//----- User crud request
function getUser($phone_number){
  global $db;
  $query=$db->prepare("SELECT * FROM `user` WHERE `phone_number`='". $phone_number ."'");
  $query->execute(array("phone_number"=>$phone_number));
  $result=$query->fetch();
  return $result;
}
function getUserId($id){
  global $db;
  $query=$db->prepare("SELECT * FROM `user` WHERE `iduser`='". $id ."'");
  $query->execute(array("phone_number"=>$id));
  $result=$query->fetch();
  return $result;
}
function addUser($name, $surname, $phone_number, $date, $password){
  global $db;
  $sql = "INSERT INTO user(name, surname,phone_number, date, password) VALUES (?,?,?,?,?)";
  $stminsert = $db->prepare($sql);
  $result =   $stminsert->execute([$name,$surname,$phone_number,$date,$password]);

  $_SESSION['user'] = $result;
  if($result){
    $_SESSION['user'] = $result;
    header('Location: news.php');
  }
  else{
    header('Location: registration.php');
  }
}
function editUser($id, $name, $phone_number,$surname,$country){
  global $db;

  $query=$db->prepare("UPDATE `user` SET `name`= '". $name ."', `surname`='". $surname ."',
     `phone_number`='". $phone_number ."', `country`='". $country ."'
    WHERE `iduser`='". $id ."' ");
  $rows=$query->execute(array("name"=>$name,"surname"=>$surname,"phone_number"=>$phone_number, "country"=>$country, "iduser"=>$id));
}
function editPasswordUser($id,$newpass){
  global $db;
    $query=$db->prepare("UPDATE `user` SET `password`= '". $newpass ."' WHERE `iduser`='". $id ."' ");
    $rows=$query->execute(array("password"=>$newpass,"iduser"=>$id));
}

//--------- post crud request

function addPost($id_user, $post_title, $post_mes){
  global $db;
  $post_like = 0;
  $post_dislike = 0;
  $post_date = "23:23";
  $sql = "INSERT INTO post(iduser,post_title,post_mes,post_like,post_dislike,post_date) VALUES (?,?,?,?,?,?)";
  $stminsert = $db->prepare($sql);
  $result =   $stminsert->execute([$id_user,$post_title,$post_mes,$post_like,$post_dislike,$post_date]);

  if($result){
    header('Location: profile.php');
  }
}

function getUserPost($id_user){
  global $db;
  $query=$db->prepare("SELECT * FROM `post` WHERE `iduser`='". $id_user ."'");
  $query->execute(array("iduser"=>$id_user));
  $result=$query->fetchAll();
  return $result;
}

function getPost($id_post){
  global $db;
  $query=$db->prepare("SELECT * FROM `post` WHERE `idpost`='". $id_post ."'");
  $query->execute(array("idpost"=>$id_post));
  $result=$query->fetch();
  return $result;
}

function getAllUser(){
  global $db;
  $query=$db->prepare("SELECT * FROM `user`");
  $query->execute();
  $result=$query->fetchAll();
  return $result;
}

function getAllPost(){
  global $db;
  $query=$db->prepare("SELECT * FROM `post`");
  $query->execute();
  $result=$query->fetchAll();
  return $result;
}

function deletePost($idpost){
  global $db;
  $query = $db->prepare("DELETE FROM post WHERE idpost ='". $idpost ."' ");
  $rows = $query->execute(array("idpost"=>$idpost));
}

function editPost($idpost, $post_title, $post_mes){
  global $db;
  $query=$db->prepare("UPDATE `post` SET `post_title`= '". $post_title ."', `post_mes`='". $post_mes ."' WHERE `idpost`='". $idpost ."' ");
  $rows=$query->execute(array("post_title"=>$post_title, "post_mes"=>$post_mes,"iduser"=>$idpost));
}

//--------------Comment

function getComments(){
  global $db;
  $query=$db->prepare("SELECT * FROM `comments`");
  $query->execute();
  $result=$query->fetchAll();
  return $result;
}

function addComment($iduser, $idpost, $comment){
  global $db;
  $post_date = "23:23";
  $sql = "INSERT INTO comments(iduser,idpost,comment,date) VALUES (?,?,?,?)";
  $stminsert = $db->prepare($sql);
  $result =   $stminsert->execute([$iduser,$idpost,$comment,$post_date]);

  if($result){
    header('Location: comments_page.php');
  }
}

function deleteComment($idcom){
  global $db;
  $query = $db->prepare("DELETE FROM comments WHERE idcomments ='". $idcom ."' ");
  $rows = $query->execute(array("idcomments"=>$idcom));
}

//==============================Search
function searchUser($key){
  global $db;
  $query=$db->prepare("SELECT * FROM `user` WHERE `name` LIKE '%".$key."%'");
  $query->execute(array("name"=>$key));
  $result=$query->fetchAll();
  return $result;
}
function searchPost($key){
  global $db;
  $query=$db->prepare("SELECT * FROM `post` WHERE `post_title` LIKE '%".$key."%'");
  $query->execute(array("name"=>$key));
  $result=$query->fetchAll();
  return $result;
}


//============================Friends

function getNotifAll(){
  global $db;
  $query=$db->prepare("SELECT * FROM `friends`");
  $query->execute();
  $result=$query->fetchAll();
  return $result;
}

function addNoti($fid, $sid){
  global $db;
  $sql1 = "INSERT INTO friends (first_user_id,seconds_user_id) VALUES (?,?)";
  $stminsert1 = $db->prepare($sql1);
  $result1 =   $stminsert1->execute([$fid, $sid]);

  if($result1){
    header('Location: notifications.php');
  }
}

function reject($fid, $sid){
  global $db;
  $query1 = $db->prepare("DELETE FROM friends WHERE seconds_user_id ='". $sid ."' AND first_user_id ='". $fid ."'");
  $rows1 = $query1->execute(array("seconds_user_id"=>$sid));

}

function accept($fid, $sid){
  global $db;
  $n = 1;

  $sql1 = "INSERT INTO friends (first_user_id,seconds_user_id) VALUES (?,?)";
  $stminsert1 = $db->prepare($sql1);
  $result1 =   $stminsert1->execute([$sid, $fid]);

  $query1=$db->prepare("UPDATE `friends` SET `enbdis`= '". $n ."' WHERE `first_user_id`='". $fid ."' AND `seconds_user_id`='". $sid ."' ");
  $rows1=$query1->execute(array("first_user_id" =>$fid, "seconds_user_id" => $sid));

  $query2=$db->prepare("UPDATE `friends` SET `enbdis`= '". $n ."' WHERE `first_user_id`='". $sid ."' AND `seconds_user_id`='". $fid ."' ");
  $rows2=$query2->execute(array("first_user_id" =>$fid, "seconds_user_id" => $sid));
}

//==================================Messages

function sendMes($fid,$sid,$text){
  global $db;
  $sql = "INSERT INTO messages (first_user_id,seconds_user_id,text) VALUES (?,?,?)";
  $stminsert = $db->prepare($sql);
  $result =   $stminsert->execute([$fid, $sid,$text]);

  if($result1){
    header('Location: messages.php');
  }
}
function getAllMes(){
  global $db;
  $query=$db->prepare("SELECT * FROM `messages`");
  $query->execute();
  $result=$query->fetchAll();
  return $result;
}

function changeImage($id, $image){
  global $db;
  $target = "../img/".basename($image);
  $query=$db->prepare("UPDATE `user` SET `image`= '". $target ."' WHERE `iduser`='". $id ."' ");
  $rows=$query->execute(array("image"=>$image, "iduser"=>$id));
}

function getImage($id){
  global $db;
  $query=$db->prepare("SELECT * FROM `user` WHERE `iduser`='". $id ."'");
  $query->execute(array("iduser"=>$id));
  $result=$query->fetch();
  return $result;
}
?>
