<!-- Conntect to php-->
<?php
require_once '../db.php';
$user;
if(isset($_SESSION['user'])){
	$_SESSION['user'] = getUser($_SESSION['user']['email']);
	$user=$_SESSION['user'];
}

$res;

$notAll = getNotifAll();

if(isset($_POST['search_btn'])){
  if(isset($_POST['search_key']) && isset($_SESSION['user'])){
    $res = searchUser($_POST['search_key']);
  }
}

if(isset($_POST['add_friends'])){
  if(isset($_POST['id_friends']) && isset($_SESSION['user'])){
    addNoti($user['id'], $_POST['id_friends']);
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
<?php include('header.php') ?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-4">
          <div class="card mt-4">
            <div class="card-header text-center">
              <form action="friends.php" method="post">
                  <div class="form-group row">
                      <input style="width: 240px;" type="search" id="search_key" name="search_key" class="form-control" placeholder="search by user name">
                      <button  class="btn btn-success my-2 my-sm-0"  name="search_btn" type="submit" id="search_btn" style="margin-top: 5px;margin-left: 5px">SEARCH</button>
                  </div>
              </form>
            </div>
            <div class="card-body">
              <?php
                if(isset($res)){
                  foreach ($res as $value) {
                    if($value['id'] != $user['id']){
                    ?><div class="row border-bottom">
                      <div class="col-md-8 mt-2 mb-0">
                        <h6 class=""><?php echo $value['fname']. " " .$value['lname']; ?></h6>
                      </div>
                      <div class="col-md-2 mt-1 mb-0">
                        <form class="text-right" action="friends.php" method="post">
                          <input type="hidden" name="id_friends" value="<?php echo $value['id']; ?>">
                          <input type="submit" class="btn btn-primary" id="" name="add_friends" value="Add User">
                        </form>
                      </div>
                    </div>
                    <?php
                    }
                  }
                }
               ?>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="card mt-4">
            <div class="card-header text-center">
              <h4>My Friends</h4>
            </div>
            <div class="card-body">
              <?php foreach ($notAll as $key) {
                if($key['first_user_id'] == $user['id'] && $key['enbdis'] == 1){
                  $res = getUserById($key['second_user_id'])
                  ?>
                  <div class="row border-bottom mt-2">
                    <div class="col-md-6 mt-2 mb-0 text-center">
                      <h3> <?php echo $res['fname']. " " .$res['lname'];?> </h3>
                    </div>
                    <div class="col-md-6 mt-2 mb-0">
                      <form class="" action="messages.php" method="post">
                        <input type="hidden" name="sendmesid" value="<?php echo $res['id']; ?>">
                        <input type="submit" class="btn btn-outline-primary" name="sendmes" value="Send Messages">
                      </form>
                    </div>
                  </div> <?php
                }
              } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
