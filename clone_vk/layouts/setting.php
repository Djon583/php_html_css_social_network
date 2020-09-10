<?php
session_start();
require_once('../config.php');
$user;
if(isset($_SESSION['user'])){
  $user = $_SESSION['user'];
}
$komek = 1;

if(isset($_POST['update-main-inf'])){
  if (isset($_SESSION['user'])) {
    if(isset($_POST['name']) &&  isset($_POST['surname']) && isset($_POST['phone_number'])){
      editUser($_SESSION['user']['iduser'], $_POST['name'], $_POST['phone_number'], $_POST['surname'],$_POST['country']);

      $_SESSION['user'] = getUser($_POST['phone_number']);
      header('Location: ../layouts/setting.php');
    }
    else {}
  }
}

if(isset($_POST['update-password'])){
  if (isset($_SESSION['user'])) {
    if(isset($_POST['old-password']) && isset($_POST['new-password'])){

      if($user['password'] == $_POST['old-password']){
        editPasswordUser($_SESSION['user']['iduser'],$_POST['new-password']);
        $_SESSION['user'] = getUser($_SESSION['user']['phone_number']);
        header('Location: ../layouts/setting.php');
      }
      else{
        ?> <script>
          alert("Old password incorrect")
        </script><?php
      }
    }
    else {}
  }
}

if (isset($_POST['upload'])) {

    $image = $_FILES['image']['name']; //user.png
    $target = "../img/".basename($image);
    if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){

    }
    changeImage($user['iduser'], $_FILES['image']['name']);
      header('Location: profile.php');
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

<title>Setting</title>
</head>
<body>
  <?php include('../inc/header.php'); ?>

  <div class="container mt-4">
    <div class="row justify-content-center">
      <?php  if(isset($_POST['setting-2'])){
        $komek = 2;
        ?>
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h4>Contact</h4>
            </div>
            <div class="card-body">
              <form class="" action="" method="post">

                <!-- Email -->
                <div class="form-group row">
                  <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                  <div class="col-md-4  ">
                    <input id="email" type="text" class="form-control" name="email" value="<?php echo $result['name']; ?>">
                  </div>
                </div>
                <!-- skype -->
                <div class="form-group row">
                  <label for="skype" class="col-md-4 col-form-label text-md-right">Skype</label>
                  <div class="col-md-4  ">
                    <input id="skype" type="text" class="form-control" name="skype" value="">
                  </div>
                </div>
                <!-- insta -->
                <div class="form-group row">
                  <label for="insta" class="col-md-4 col-form-label text-md-right">insta</label>
                  <div class="col-md-4  ">
                    <input id="insta" type="text" class="form-control" name="insta" value="">
                  </div>
                </div>
                <!-- website -->
                <div class="form-group row">
                  <label for="website" class="col-md-4 col-form-label text-md-right">Website</label>
                  <div class="col-md-4  ">
                    <input id="website" type="date" class="form-control" name="website" value="">
                  </div>
                </div>
                <!-- button -->
                <div class="form-group row mb-0">
                  <div class="col-md-6 offset-md-4">
                    <button id="register" name="update-contact" type="submit" class="btn btn-success">
                      Save
                    </button>
                  </div>
                </div>
              </form>

            </div>
          </div>
        </div>
        <?php
      }else if(isset($_POST['setting-3'])){
        ?>
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h4>Security</h4>
            </div>
            <div class="card-body">
              <form class="" action="" method="post">

                <!-- old password -->
                <div class="form-group row">
                  <label for="old-password" class="col-md-4 col-form-label text-md-right">Old password</label>
                  <div class="col-md-4  ">
                    <input id="old-password" type="password" class="form-control" name="old-password" value="">
                  </div>
                </div>
                <!-- Confirm old pass -->
                <div class="form-group row">
                  <label for="confirm-old-password" class="col-md-4 col-form-label text-md-right">Confirm old password</label>
                  <div class="col-md-4  ">
                    <input id="confirm-old-password" type="password" class="form-control" name="confirm-old-password" value="">
                  </div>
                </div>
                <!-- New pass -->
                <div class="form-group row">
                  <label for="new-password" class="col-md-4 col-form-label text-md-right">New password</label>
                  <div class="col-md-4  ">
                    <input id="new-password" type="password" class="form-control" name="new-password" value="">
                  </div>
                </div>
                <!-- button -->
                <div class="form-group row mb-0">
                  <div class="col-md-6 offset-md-4">
                    <button id="change-password" name="update-password" type="submit" class="btn btn-success">
                      Save
                    </button>
                  </div>
                </div>
              </form>

            </div>
          </div>
        </div>
        <?php
      }else if(isset($_POST['setting-1']) || $komek == 1){
        ?>
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h4>Main Information</h4>
            </div>
            <div class="card-body">
              <form class="form-group border border-success p-2" action="setting.php" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                  <label for="img" class="col-md-4 col-form-label text-md-right">Change Image</label>
                  <div class="col-md-4  ">
                    <input id="img" type="file" class="" name="image" value="">
                  </div>
                </div>
                <div class="form-group row">
                  <input class="form-control ml-4 mr-4 text-md-center btn btn-success" type="submit" name="upload" value="Upload">
                </div>
              </form>
              <form class="" action="" method="post">

                <!-- name -->
                <div class="form-group row">
                  <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                  <div class="col-md-4  ">
                    <input id="name" type="text" class="form-control" name="name" value="<?php echo $user['name']; ?>">
                  </div>
                </div>
                <!-- surname -->
                <div class="form-group row">
                  <label for="surname" class="col-md-4 col-form-label text-md-right">Surname</label>
                  <div class="col-md-4  ">
                    <input id="surname" type="text" class="form-control" name="surname" value="<?php echo $user['surname']; ?>">
                  </div>
                </div>
                <!-- phone_number -->
                <div class="form-group row">
                  <label for="phone_number" class="col-md-4 col-form-label text-md-right">Phone number</label>
                  <div class="col-md-4  ">
                    <input id="phone_number" type="text" class="form-control" name="phone_number" value="<?php echo $user['phone_number']; ?>">
                  </div>
                </div>
                <!-- gender -->
                <div class="form-group row">
                  <label for="name" class="col-md-4 col-form-label text-md-right">Gender</label>
                  <div class="col-md-4  ">

                  </div>
                </div>
                <!-- date -->
                <div class="form-group row">
                  <label for="bdate" class="col-md-4 col-form-label text-md-right">Date</label>
                  <div class="col-md-4  ">
                    <input id="bdate" type="date" class="form-control" name="bdate" value="<?php echo $user['bdate']; ?>">
                  </div>
                </div>
                <!-- Country -->
                <div class="form-group row">
                  <label for="country" class="col-md-4 col-form-label text-md-right">Country</label>
                  <div class="col-md-4  ">
                    <input id="country" type="text" class="form-control" name="country" value="<?php echo $user['country']; ?>">
                  </div>
                </div>
                <!-- button -->
                <div class="form-group row mb-0">
                  <div class="col-md-6 offset-md-4">
                    <button id="register" name="update-main-inf" type="submit" class="btn btn-success">
                      Save
                    </button>
                  </div>
                </div>
              </form>

            </div>
          </div>
        </div>
      <?php } ?>
      <div class="col-md-4">
        <div class="">
          <div class="card-body">
            <form class="" action="../layouts/setting.php" method="post">
              <div class="form-group row">
                <button name="setting-1" class="btn btn-primary">Main Information</button>
              </div>
              <div class="form-group row">
                <button name="setting-2" class="btn btn-primary">Contact</button>
              </div>
              <div class="form-group row">
                <button name="setting-3" class="btn btn-primary">Security</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>
</html>
