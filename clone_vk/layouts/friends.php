<?php
session_start();
require_once('../config.php');
$user;
if(isset($_SESSION['user'])){
  $user = $_SESSION['user'];
}

$not = getNotifAll();

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
              <h3 class="text-center">My friends</h3>
            </div>
            <div class="card-body">
                <?php foreach ($not as $key) {
                  if($key['first_user_id'] == $user['iduser'] && $key['enbdis'] == 1){
                    $res = getUserId($key['seconds_user_id'])
                    ?>
                    <div class="col-md-12 row border-bottom mt-2 p-4">
                      <div class="col-md-8 row">
                        <img class="rounded-circle ml-4 mr-4" width="45" src="<?php echo $res['image']; ?>" alt="">
                        <h3 class=""> <?php echo $res['name']. " " .$res['surname'];?> </h3>
                      </div>
                      <div class="col-4">
                          <div class="row">
                          <form class="" action="messages.php" method="post">
                            <input type="hidden" name="sendmesid" value="<?php echo $res['iduser']; ?>">
                            <input class="mr-2 btn btn-succes" type="submit" name="sendmes" value="Send Messages">
                          </form>
                          <form class="" action="friends.php" method="post">
                            <input type="hidden" name="cancel_request_user_id" value="<?php echo $req['id'] ?>">
                            <button type="submit" class="btn btn-danger" name="cancel_request">Delete from friends</button>
                          </form>
                        </div>
                      </div>
                    </div> <?php
                  }
                } ?>

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
