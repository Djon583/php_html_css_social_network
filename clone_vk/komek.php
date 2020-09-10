<?php
session_start();
require_once('config.php');
$user;
if(isset($_SESSION['user'])){
  $user = $_SESSION['user'];
}

$not = getNotifAll();
$allmes = getAllMes();
									
if(isset($_POST['sendtext'])){
  if (isset($_SESSION['user'])) {
    if(isset($_POST['seconds_user_id']) && isset($_POST['textmes'])){
      sendMes($user['iduser'],$_POST['seconds_user_id'], $_POST['textmes']);
      header('Location: messages.php');
    }
  }
}
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<?php include('../inc/additional.php'); ?>
 	<title></title>
 </head>
 <body>
 	<div class="container">
 		<div class="row">
 			<div class="col-md-12">
 				<?php
 					foreach ($allmes as $key1) {
						//if(($key1['seconds_user_id'] ==  $n && $key1['first_user_id'] == $m)){
						//	?><!-- <p class="text-right"> <?php //echo $key1['text']; ?> </p>--> <?php
						//}
						$m = $user['iduser']; //
						if(($key1['seconds_user_id'] ==  $m)){
							?> <p class="text-left"> <?php echo $key1['text']; ?> </p> <?php
						}
					}
 				?>
 			</div>
 		</div>
 	</div>
 </body>
 </html>