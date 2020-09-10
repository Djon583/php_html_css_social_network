<?php
session_start();
require_once('../config.php');
$user;
if(isset($_SESSION['user'])){
  $user = $_SESSION['user'];
}
$res;
$res1;
//if($_SERVER['REQUEST_METHOD']=='GET'){
  if(isset($_POST['name']) && isset($_SESSION['user'])){
    $res1 = searchPost($_POST['name']);
    $res = searchUser($_POST['name']);
  }
//}

if(isset($_POST['add_friends'])){
  if (isset($_SESSION['user'])) {
    addNoti($user['iduser'], $_POST['id_friends']);
  }
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>

    	<?php include('../inc/additional.php'); ?>
</head>
<body>
  <?php include('../inc/header.php'); ?>
  <div class="container mt-2">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header text-center">
            <form class="" action="searching.php" method="post">
              <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right"></label>
                <div class="col-md-4  ">
                  <input id="name" type="text" class="form-control" name="name" value="">
                </div>
              </div>
              <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                  <button id="register" name="search" type="submit" class="btn btn-primary">
                    Searching
                  </button>
                </div>
              </div>
            </form>
          </div>
          <div class="card-body">
            <?php if(isset($res)){?> <h2> --- Users --- </h2> <?php foreach ($res as $key){ ?>
              <h3><?php echo $key['name']. " " .$key['surname']; ?></h3>
              <form class="" action="searching.php" method="post">
                <input type="hidden" name="id_friends" value="<?php echo $key['iduser']; ?>">
                <input type="submit" class="btn btn-success" id="" name="add_friends" value="Add User">
              </form>
              <div class="border-bottom mt-1"></div>
            <?php }} ?>
          </div>
          <div class="card-body">
            <?php if(isset($res1)){?> <h2> --- Posts --- </h2> <?php foreach ($res1 as $key){ ?>
              <h3><?php echo $key['post_title']. " " .$key['post_mes']; ?></h3>
            <?php }} ?>
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
