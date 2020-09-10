<?php
session_start();
require_once('../config.php');
$user;
if(isset($_SESSION['user'])){
  $user = $_SESSION['user'];
}

$not = getNotifAll();

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
  	<?php include('../inc/header.php'); ?>
    <div class="container">
	<div class="row">
		<div class="col-md-12 mt-4">
			<div class="card">
				<div class="row">
					<div class="col-md-4 border-right m-0 p-0">
						<div class="ml-3 card-header">
							<h3 class="text-center">Select Messages</h3>
						</div>
						<div style="height: 400px; overflow-y: scroll;" class="ml-3 card-body">
							<?php foreach ($not as $key) {
								if($key['first_user_id'] == $user['iduser'] && $key['enbdis'] == 1){
									$res = getUserId($key['seconds_user_id'])
									?>
									<div class="border-bottom mt-2">
										<form class="" action="messages.php" method="post">
											<input type="hidden" name="sendmesid" value="<?php echo $res['iduser'];?>">
											<input style="width: 320px; height: 50px;" class="m-0 btn btn-outline-secondary" type="submit" name="sendmes" value="<?php echo $res['name']. " " .$res['surname'];?>">
										</form>
									</div> <?php
								}
							} ?>
						</div>
					</div>
					<div class="col-md-8 m-0 p-0">
						<div class="mr-3 card-header">
							<h3 class="text-center">List Messages	</h3>
						</div>
						<div style="height: 400px; overflow-y: scroll;" class="mr-3 card-body">
							<?php

							if(isset($_POST['sendmes'])){
									// $_POST['sendmesid']. " " .$user['id']. " == ";

									$allmes = getAllMes();
									/*foreach ($allmes as $k) {
										echo $k['seconds_user_id']. " " .$k['first_user_id']. " " .$k['text']. " ";?> <br> <?php
									}*/


									$n = $_POST['sendmesid']; //
									$m = $user['iduser']; // 
									foreach ($allmes as $key1) {
										if(($key1['seconds_user_id'] ==  $n && $key1['first_user_id'] == $m)){
											?> <p class="text-right"> <?php echo $key1['text']; ?> </p> <?php
										}
										if(($key1['seconds_user_id'] ==  $m && $key1['first_user_id'] == $n)){
											?> <p class="text-left"> <?php echo $key1['text']; ?> </p> <?php
									}

									?>

									<?php
								}
							}
							?>
						</div>
						<div class="text-center">
							<?php if(isset($_POST['sendmes'])){ ?>
							<form class="" action="messages.php" method="post">
								<input type="hidden" name="seconds_user_id" value="<?php echo $_POST['sendmesid']; ?>">
								<input type="text" name="textmes" value="">
								<input type="submit" class="btn btn-success" name="sendtext" value="Send">
							</form>
						<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

    <!--<div class="container">
  		<div class="row">
  			<div class="col-md-12 mt-4">
  				<div class="card">
  					<div class="row">
  						<div class="col-md-4 border-right m-0 p-0">
  							<div class="ml-3 card-header">
  								<h3 class="text-center">Select Messages</h3>
  							</div>
  							<div class="ml-3 card-body">
                  <?php /*foreach ($not as $key) {
                    if($key['first_user_id'] == $user['iduser'] && $key['enbdis'] == 1){
                      $res = getUserId($key['seconds_user_id'])
                      ?>
                      <div class="border-bottom mt-2">
                        <form class="" action="messages.php" method="post">
                          <input type="hidden" name="sendmesid" value="<?php echo $res['iduser']; ?>">
                          <input style="width: 320px; height: 50px;" class="m-0 btn" type="submit" name="sendmes" value="<?php echo $res['name']. " " .$res['surname'];?>">
                        </form>
                      </div> <?php
                    }
                  } ?>
  							</div>
  						</div>
  						<div class="col-md-8 m-0 p-0">
  							<div class="mr-3 card-header">
  								<h3 class="text-center">List Messages	</h3>
  							</div>
  							<div class="mr-3 card-body">
                  <?php

                  if(isset($_POST['sendmes'])){
                    if (isset($_SESSION['user'])) {
                      echo $_POST['sendmesid']. " " .$user['iduser'];

                      $allmes = getAllMes();
                      $n = $_POST['sendmesid'];
                      $m = $user['iduser'];
                      foreach ($allmes as $key1) {
                        if(($key1['seconds_user_id'] ==  $n && $key1['first_user_id'] == $m)){
                        ?> <p class="text-right"> <?php echo $key1['text'] ?> </p> <?php
                        }
                        if(($key1['seconds_user_id'] ==  $m && $key1['first_user_id'] == $n)){
                        ?> <p class="text-left"> <?php echo $key1['text'] ?> </p> <?php
                        }
                      }

                      ?>
                      <form class="" action="messages.php" method="post">
                        <input type="hidden" name="seconds_user_id" value="<?php echo $_POST['sendmesid'] ?>">
                        <input type="text" name="textmes" value="">
                        <input type="submit" class="btn btn-success" name="sendtext" value="Send">
                      </form>
                       <?php
                    }
                  }*/
                  ?>
  							</div>
  						</div>
  					</div>
  				</div>
  			</div>
  		</div>
  	</div>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
