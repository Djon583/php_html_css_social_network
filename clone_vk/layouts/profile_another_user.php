<?php
session_start();
require_once('../config.php');
$user;
if(isset($_SESSION['user'])){
  $user = $_SESSION['user'];
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <?php include('../inc/additional.php'); ?>
  <title>My Page <?php echo $user['name']; ?></title>
</head>
<body>
  <?php include('../inc/header.php'); ?>
  <div class="container mt-4 emp-profile">
      <div class="row">
        <div class="col-md-4">
          <div class="profile-img">
            <img class="rounded" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt=""/>
            <!--<div class="file btn btn-primary">
              Change Photo
              <input type="file" name="file"/>
            </div>-->
          </div>
        </div>
        <div class="col-md-6">
          <div class="profile-head">
            <h5>
              <?php echo $user['name']. " " .$user['surname']; ?>
            </h5>
            <h6>
              Status
            </h6>
            <p class="proile-rating">Status<span></span></p>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
              </li>
              <!--<li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Timeline</a>
              </li>-->
            </ul>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="profile-work"><br><br>
            <p>FOLLOW</p>
            <a href="">Friends</a><br/>
            <a href=""></a><br/>
            <a href=""></a>
          </div>
        </div>
        <div class="col-md-8">
          <div class="tab-content profile-tab" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
              <div class="row">
                <div class="col-md-6">
                  <label>User Id</label>
                </div>
                <div class="col-md-6">
                  <p><?php echo $user['iduser']; ?></p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label>Name</label>
                </div>
                <div class="col-md-6">
                  <p><?php echo $user['name']; ?></p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label>Name</label>
                </div>
                <div class="col-md-6">
                  <p><?php echo $user['surname']; ?></p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label>Email</label>
                </div>
                <div class="col-md-6">
                  <p><?php echo $user['email']; ?></p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label>Phone</label>
                </div>
                <div class="col-md-6">
                  <p><?php echo $user['phone_number']; ?></p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label>Profession</label>
                </div>
                <div class="col-md-6">
                  <p><?php echo "No"?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
  <div class="container mt-2 mb-4">
    <div class="row">
      <div class="col-md-12">
        <button id="btn-contact" (click)="clearModal()" data-toggle="modal" data-target="#contact" class="btn btn-success btn-block follow">Do have new a post?</button>

        <div class="card-header">
          <h3 class="text-center">Post</h3>
        </div>
        <?php
          $post_user = getUserPost($_SESSION['user']['iduser']);


          foreach ($post_user as $key) {
            ?>
            <div class="card gedf-card mt-3">
              <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="mr-2">
                      <img class="rounded-circle" width="45" src="https://picsum.photos/50/50" alt="">
                    </div>
                    <div class="ml-2">
                      <div class="h5 m-0"><?php if($user['iduser'] == $key['iduser']){
                        echo $user['name']. " " .$user['surname'];} ?>
                      </div>
                      <div class="text-muted h7 mb-2"> <i class="fa fa-clock-o"></i><?php echo $key['post_date']; ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <a class="card-link" href="#">
                  <h5 class="card-title"><?php echo $key['post_title']; ?></h5>
                </a>
                <p class="card-text"><?php echo $key['post_mes']; ?></p>
              </div>
              <div class="card-footer">
                <form class="col-md-2 ml-2" action="comments_page.php" method="post">
                  <input type="hidden" name="show_comment" value="<?php echo $key['idpost']; ?>">
                  <input type="submit" class="btn btn-link" id="show_comment" name="show_submit_comment" value="comments">
                </form>
              </div>
            </div>
            <?php
          }
         ?>

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
