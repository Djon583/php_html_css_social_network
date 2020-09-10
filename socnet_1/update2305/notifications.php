<!-- Conntect to php, cheack user and connection db -->
<?php
require_once '../db.php';
if(isset($_SESSION['user'])){
  $_SESSION['user'] = getUser($_SESSION['user']['email']);
  $user=$_SESSION['user'];
}

$notAll = getNotifAll();

if(isset($_POST['reject'])){
  if (isset($_SESSION['user'])) {
    reject($_POST['sec_user_reject'],$user['id']);
    header('Location: notifications.php');
  }
}

if(isset($_POST['accept'])){
  if (isset($_SESSION['user'])) {
    accept($_POST['sec_user_accept'],$user['id']);
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
<?php include 'header.php' ?>

<div class="container">
  <div class="row">
    <div class="col-md-12 mt-4">
      <div  class="card">
        <div class="card-header">
          <h3 class="text-center">Notifications</h3>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="card-body">
              <div class="border-bottom mt-2">
                <?php foreach ($notAll as $key){ ?>
                  <p><?php if($key['first_user_id'] == $user['id'] && $key['enbdis'] == 0){
                    $req = getUserById($key['second_user_id']);
                    ?> <h3> <?php echo $req['fname']. " " .$req['lname']; ?> </h3>
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
          </div>
          <div class="col-md-6">
            <div class="card-body">
              <div class="border-bottom mt-2">
                <?php foreach ($notAll as $key){ ?>
                  <p><?php if($key['second_user_id'] == $user['id'] && $key['enbdis'] == 0){
                    $req = getUserById($key['first_user_id']);
                    ?> <h3> <?php echo $req['fname']. " " .$req['lname']; ?> </h3> <?php
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
