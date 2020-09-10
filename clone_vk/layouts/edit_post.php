<?php
  session_start();
  require_once('../config.php');
  $user;
  if(isset($_SESSION['user'])){
    $user = $_SESSION['user'];
  }

  $arrpost = getPost($_POST['id_edit_post']);

  if(isset($_POST['edit_button'])){
    if (isset($_SESSION['user'])) {
      if (isset($_POST['pt']) && isset($_POST['pt']) != null && isset($_POST['pm']) && isset($_POST['pm'])!= null) {
        editPost($_POST['idp'], $_POST['pt'], $_POST['pm']);
        header('Location: profile.php');
      }
    }
    else {}
  }



 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <link rel="stylesheet" href="../style/style_1.css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script type="text/javascript" src="../js/registration.js"></script>
  <script
  src="https://code.jquery.com/jquery-3.5.0.js"
  integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc="
  crossorigin="anonymous">
  </script>

  <title>My Page <?php echo $user['name']; ?></title>
</head>
<body>
  <?php include('../inc/header.php'); ?>
  <div class="container mt-3">
    <div class="row">
      <div class="col-md-10">
        <div class="card">
          <div class="card-header">
            <h3>Edit Post</h3>
          </div>
          <div class="card-body">
            <form class="" action="edit_post.php" method="post">
              <div class="form-group row">
                <label for="pt" class="col-md-4 col-form-label text-md-right">Title</label>
                <div class="col-md-4  ">
                  <input id="pt" type="text" class="form-control" name="pt" value="<?php echo $arrpost['post_title']; ?>">
                </div>
                  <input type="hidden" name="idp" value="<?php echo $arrpost['idpost']; ?>">
                <span class="error_form" id="fname_error_message"></span>
              </div>
              <div class="form-group">
                  <label for="pm">Post</label>
                  <textarea type="text" id="pm" name="pm" class="form-control"><?php echo $arrpost['post_mes']; ?></textarea>
              </div>
              <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                  <button id="edit_button" name="edit_button" type="submit" class="btn btn-success">
                    Save
                  </button>
                </div>
              </div>
            </form>
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
