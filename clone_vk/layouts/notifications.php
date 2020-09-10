<?php
session_start();
require_once('../config.php');
$user;
if(isset($_SESSION['user'])){
  $user = $_SESSION['user'];
}

$notAll = getNotifAll();

if(isset($_POST['reject'])){
  if (isset($_SESSION['user'])) {
    reject($_POST['sec_user_reject'],$user['iduser']);
    header('Location: notifications.php');
  }
}

if(isset($_POST['accept'])){
  if (isset($_SESSION['user'])) {
    accept($_POST['sec_user_accept'],$user['iduser']);
    header('Location: notifications.php');
  }
}

if(isset($_POST['cancel_request'])){
  if (isset($_SESSION['user'])) {
    reject($user['id'],$_POST['cancel_request_user_id']);
    header('Location: notifications.php');
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
  					<div class="card-header">
              <h3 class="text-center">Notifications</h3>
            </div>
            <div class="row">

              <div class="card-body">
                <div class="border-bottom mt-2">

                  <?php foreach ($notAll as $key){ ?>
                    <p><?php if($key['first_user_id'] == $user['iduser'] && $key['enbdis'] == 0){
                      $req = getUserId($key['seconds_user_id']);
                      ?> <h3> <?php echo $req['name']. " " .$req['surname']; ?> </h3>
                      <div class="row">
                        <button type="button" style="height: 38px;" class="mr-2 btn btn-outline-secondary" name="button">Request has been sent</button>
                        <form class="" action="notifications.php" method="post">
                          <input type="hidden" name="cancel_request_user_id" value="<?php echo $req['id'] ?>">
                          <button type="submit" class="btn btn-danger" name="cancel_request">Cancel Request</button>
                        </form>
                      </div>
                       <?php
                    }?></p><br>

                  <?php } ?>
                </div>
              </div>
              <div class="card-body">
                <div class="border-bottom mt-2">

                  <?php foreach ($notAll as $key){ ?>
                    <p><?php if($key['seconds_user_id'] == $user['iduser'] && $key['enbdis'] == 0){
                      $req = getUserId($key['first_user_id']);
                      ?> <h3> <?php echo $req['name']. " " .$req['surname']; ?> </h3> <?php
                    ?></p>
                    <div class="row">

                    <form class="ml-2 mr-3" action="notifications.php" method="post">
                      <input type="hidden" name="sec_user_reject" value="<?php echo $key['first_user_id']; ?>">
                      <input type="submit" class="btn btn-danger" name="reject" value="Reject">
                    </form>
                    <form class="" action="notifications.php" method="post">
                      <input type="hidden" name="sec_user_accept" value="<?php echo $key['first_user_id']; ?>">
                      <input type="submit" class="btn btn-success" name="accept" value="Accept">
                    </form>

                  </div>
                    <br>

                  <?php }} ?>
                </div>
              </div>
            </div>
            </div>
  				</div>
  			</div>
  		</div>
  	</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
