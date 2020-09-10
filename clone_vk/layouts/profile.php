<?php
session_start();
require_once('../config.php');
$user;
if(isset($_SESSION['user'])){
  $user = $_SESSION['user'];
}

if(isset($_POST['sendpost'])){
  if (isset($_SESSION['user'])) {
    if(isset($_POST['post_title']) && isset($_POST['post_mes'])){
      addPost($_SESSION['user']['iduser'], $_POST['post_title'], $_POST['post_mes']);
    }
  }
}
if(isset($_POST['delete_post_button'])){
  if (isset($_SESSION['user'])) {
    if(isset($_POST['id_delete_post'])){
      deletePost($_POST['id_delete_post']);

        header('Location: profile.php');
      }
    }
  }

$res = getImage($user['iduser']);

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
            <img class="rounded" style="width: 200px; height: 200px;" src="<?php if($res['image'] != null ){echo $res['image'];} else{ echo "../img/user.jpg"; } ?>" alt=""/>
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
            <a href="">Follow Link</a><br/>
            <a href="">Bootsnipp Profile</a><br/>
            <a href="">Bootply Profile</a>
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
            <!--
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
              <div class="row">
                <div class="col-md-6">
                  <label>Date</label>
                </div>
                <div class="col-md-6">
                  <p></p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label>Country</label>
                </div>
                <div class="col-md-6">
                  <p>10$/hr</p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label>School</label>
                </div>
                <div class="col-md-6">
                  <p>230</p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label>Skype</label>
                </div>
                <div class="col-md-6">
                  <p>Expert</p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label>Insta</label>
                </div>
                <div class="col-md-6">
                  <p>6 months</p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label>Website</label>
                </div>
                <div class="col-md-6">
                  <p>6 months</p>
                </div>
              </div>
            </div>
          -->
          </div>
        </div>
      </div>
  </div>
  <div class="container mt-2 mb-4">
    <div class="row">
      <div class="col-md-12">
        <button id="btn-contact" (click)="clearModal()" data-toggle="modal" data-target="#contact" class="btn btn-success btn-block follow">Do have new a post?</button>

        <div class="card-header">
          <h3 class="text-center">My post</h3>
        </div>
          <?php include('post_user.php'); ?>

        </div>
      </div>
    </div>
  </div>


  <div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form class="" action="" method="post">
              <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="contact">New Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <p for="msj">Share your impressions with the world</p>
                        <p for="msj">Smile with us</p>
                    </div>

                    <div class="form-group">
                        <label for="txtFullname">Title</label>
                        <input type="text" id="post-title" name="post_title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="txtEmail">Post</label>
                        <textarea type="text" id="post-mes" name="post_mes" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" id="sendpost" name="sendpost" class="btn btn-primary">Send post</button>
                </div>
            </div>
          </form>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



</body>
</html>
