<?php
session_start();
require_once('../config.php');
$user;
if(isset($_SESSION['user'])){
  $user = $_SESSION['user'];
}

$all_user = getAllUser();
$all_post = getAllPost();

if(isset($_POST['sendpost'])){
  if (isset($_SESSION['user'])) {
    if(isset($_POST['post_title']) && isset($_POST['post_mes'])){
      addPost($_SESSION['user']['iduser'], $_POST['post_title'], $_POST['post_mes']);
    }
  }
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <?php include('../inc/additional.php'); ?>
</head>
<body>
  <?php include('../inc/header.php'); ?>

  <div class="container-fluid gedf-wrapper">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6 gedf-main">
        <div class="card gedf-card">
          <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="posts-tab" data-toggle="tab" href="#posts" role="tab" aria-controls="posts" aria-selected="true">
                  Make a publication
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="images-tab" data-toggle="tab" role="tab" aria-controls="images" aria-selected="false" href="#images">Images</a>
              </li>
            </ul>
          </div>
          <div class="card-body">
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="posts" role="tabpanel" aria-labelledby="posts-tab">
                <div class="form-group">
                  <label class="sr-only" for="message">post</label>
                  <input class="form-control mb-2" type="text" name="id="message" rows="3"" placeholder="Here, write title" value="">
                  <textarea class="form-control" id="message" rows="3" placeholder="What are you thinking?"></textarea>
                </div>
              </div>
              <div class="tab-pane fade" id="images" role="tabpanel" aria-labelledby="images-tab">
                <div class="form-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Upload image</label>
                  </div>
                </div>
                <div class="py-4"></div>
              </div>
            </div>
            <div class="btn-toolbar justify-content-between">
              <div class="btn-group">
                <button type="submit" class="btn btn-primary">share</button>
              </div>
              <div class="btn-group">
                <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                  aria-expanded="false">
                  <i class="fa fa-globe"></i> Public
                </button>
                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                  <a class="dropdown-item" href="#"><i class="fa fa-globe"></i> Public</a>
                  <a class="dropdown-item" href="#"><i class="fa fa-users"></i> Friends</a>
                  <a class="dropdown-item" href="#"><i class="fa fa-user"></i> Just me</a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <?php
        foreach ($all_post as $keypost) {


        ?>
        <div class="card gedf-card mt-3">
          <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
              <div class="d-flex justify-content-between align-items-center">
                <?php foreach ($all_user as $keyuser) {
                  if($keyuser['iduser'] == $keypost['iduser']){ ?>
                <div class="mr-2">
                  <img class="rounded-circle" width="45" src="<?php if($keyuser['image'] != null ){echo $keyuser['image'];} else{ echo "../img/user.jpg"; } ?>" alt="">
                </div>
                <div class="ml-2">
                  <div class="h5 m-0"><?php

                    echo $keyuser['name']. " " .$keyuser['surname'];
                  ?>
                  </div>
                  <div class="text-muted h7 mb-2"> <i class="fa fa-clock-o"></i> - <?php echo $keypost['post_date']; ?>
                  </div>
                </div>
              <?php }} ?>
              </div>
              <div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <a class="card-link" href="#">
              <h5 class="card-title"><?php echo $keypost['post_title']; ?></h5>
            </a>
            <p class="card-text"><?php echo $keypost['post_mes']; ?></p>
          </div>
          <div class="card-footer">
              <form class="col-md-2 ml-2" action="comments_page.php" method="post">
                <input type="hidden" name="show_comment" value="<?php echo $keypost['idpost']; ?>">
                <input type="submit" class="btn btn-link" id="show_comment" name="show_submit_comment" value="comments">
              </form>
          </div>
        </div>
        <?php

        }
         ?>

        </div>
        <div class="col-md-3"></div>
      </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  </body>
  </html>
