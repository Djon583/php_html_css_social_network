<!-- Conntect to php-->
<?php
require_once '../db.php';
$user;
if(isset($_SESSION['user'])){
	$_SESSION['user'] = getUser($_SESSION['user']['email']);
	$user=$_SESSION['user'];
}


$not = getNotifAll();


if(isset($_POST['sendtext'])){

		sendMes($user['id'],$_POST['second_user_id'], $_POST['textmes']);

}


?>

<!-- Style -->
<style>
body {
	background: url(../images/back.jpg);
	background-repeat: no-repeat;
	-webkit-background-size: cover;
	background-size: cover;
	width: 100%;
	height: 100%;
}
</style>
<!-- Content -->
<?php include ('header.php') ?>
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
								if($key['first_user_id'] == $user['id'] && $key['enbdis'] == 1){
									$res = getUserById($key['second_user_id'])
									?>
									<div class="border-bottom mt-2">
										<form class="" action="messages.php" method="post">
											<input type="hidden" name="sendmesid" value="<?php echo $res['id']; ?>">
											<input style="width: 320px; height: 50px;" class="m-0 btn" type="submit" name="sendmes" value="<?php echo $res['fname']. " " .$res['lname'];?>">
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
								if (isset($_SESSION['user'])) {
									//echo $_POST['sendmesid']. " " .$user['id']. " == ";

									$allmes = getAllMes();
									/*foreach ($allmes as $k) {
										echo $k['second_user_id']. " " .$k['first_user_id']. " " .$k['text']. " ";
									}*/
									$n = $_POST['sendmesid'];
									$m = $user['id'];
									foreach ($allmes as $key1) {
										if(($key1['second_user_id'] ==  $n && $key1['first_user_id'] == $m)){
											?> <p class="text-right"> <?php echo $key1['text'] ?> </p> <?php
										}
										if(($key1['second_user_id'] ==  $m && $key1['first_user_id'] == $n)){
											?> <p class="text-left"> <?php echo $key1['text'] ?> </p> <?php
										}
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
								<input type="hidden" name="second_user_id" value="<?php echo $_POST['sendmesid']; ?>">
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
