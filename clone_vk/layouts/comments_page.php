<?php
session_start();
require_once('../config.php');
$user;
if(isset($_SESSION['user'])){
  $user = $_SESSION['user'];
}
if(isset($_SESSION['post'])){
  $post = $_SESSION['post'];
}

$post;
$all_user = getAllUser();
$all_comment = getComments();

if(isset($_POST['show_comment'])){
  $post = getPost($_POST['show_comment']);
  $_SESSION['post'] = $post;
}

$counter = 0;
foreach ($all_comment as $key) {
  if($key['idpost'] == $post['idpost']){
    $counter++;
  }
}

if(isset($_POST['delete_post_button'])){
  if (isset($_SESSION['user'])) {
    if(isset($_POST['id_delete_post'])){
      deleteComment($_POST['id_delete_post']);

        header('Location: comments_page.php');
      }
    }
  }



?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!------ Include the above in your HEAD tag ---------->


  <link rel="stylesheet" href="../style/style_1.css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script type="text/javascript" src="../js/registration.js"></script>
  <script
  src="https://code.jquery.com/jquery-3.5.0.js"
  integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc="
  crossorigin="anonymous">
  </script>

  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
  crossorigin="anonymous">

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
  crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
  crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
  crossorigin="anonymous"></script>

</head>
<body>
  <?php include('../inc/header.php'); ?>
  <div class="container-fluid mt-3 gedf-wrapper">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6 gedf-main">
        <div class="card gedf-card">
          <div class="card">
            <div class="card-header">
              <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex justify-content-between align-items-center">
                  <div class="mr-2">
                    <img class="rounded-circle" width="45" src="https://picsum.photos/50/50" alt="">
                  </div>
                  <div class="ml-2">
                    <div class="h5 m-0"><?php foreach ($all_user as $key) {
                      if($post['iduser'] == $key['iduser']){
                        echo $key['name']. " " .$key['surname'];
                      }
                    } ?>
                  </div>
                  <div class="text-muted h7 mb-2"> <i class="fa fa-clock-o"></i> - <?php echo $post['post_date']; ?>
                  </div>
                </div>
              </div>
              <div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <a class="card-link" href="#">
              <h5 class="card-title"><?php echo $post['post_title']; ?></h5>
            </a>
            <p class="card-text"><?php echo $post['post_mes']; ?></p>
          </div>
          <div class="card-footer">
            <form class="" action="add_comment.php" method="post">
            <div class="form-group row mb-0">
              <input type="hidden" name="idp" value="<?php echo $post['idpost']; ?>">

              <div class="col-md-6 offset-md-4">
                <button id="add_comment_to_post" name="add_comment_to_post" type="submit" class="btn btn-success">
                  Add Comment
                </button>
              </div>
            </div>
          </form>
          </div>
          </div>
        </div>
    </div>
  </div>
</div>

<div class="container mb-4">
  <div class="row">
    <div class="panel panel-default widget">
      <div class="panel-heading mb-2">
        <span class="glyphicon glyphicon-comment"></span>
        <h3 class="panel-title">Recent Comments</h3>
        <span class="label label-info">comment: <?php echo $counter; ?></span>
      </div>
      <div class="panel-body">
        <ul class="list-group">
          <?php
            foreach ($all_comment as $key) {
              if($key['idpost'] == $post['idpost']){
           ?>
            <li class="list-group-item mt-2">
              <div class="row">
                <div class="col-md-2 col-md-1">
                  <img src="https://picsum.photos/50/50" class="img-circle img-responsive" alt="" /></div>
                  <div class="col-xs-10 col-md-11">
                    <div>
                      <a href="http://bootsnipp.com/BhaumikPatel/snippets/Obgj"></a>
                      <div class="mic-info">
                        By: <a href="#"><?php foreach ($all_user as $keyuser) {
                          if($key['iduser'] == $keyuser['iduser']){ echo $keyuser['name']. " ".$keyuser['surname'];}} ?></a> on <?php echo $key['date']; ?>
                      </div>
                    </div>
                    <div class="comment-text">
                      <?php
                        echo $key['comment'];
                       ?>
                    </div>
                    <div class="action">
                      <!--<button type="button" class="btn btn-primary btn-xs" title="Edit">
                        <span class="glyphicon glyphicon-pencil"></span>
                      </button>
                      <button type="button" class="btn btn-success btn-xs" title="Approved">
                        <span class="glyphicon glyphicon-ok"></span>
                      </button>-->
                      <?php if($key['iduser'] == $user['iduser']){ ?>
                      <form class="" action="comments_page.php" method="post">
                        <input type="hidden" name="id_delete_post" value="<?php echo $key['idcomments']; ?>">
                        <input type="submit" class="btn btn-danger" id="delete_post" name="delete_post_button" value="Delete">
                      </form>
                    <?php } ?>
                    </div>
                  </div>
                </div>
              </li>
            <?php
              }
            }
           ?>
            </ul>
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
