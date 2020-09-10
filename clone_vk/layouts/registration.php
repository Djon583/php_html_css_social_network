<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
  require_once '../config.php';
  if(isset($_POST['create'])){
      addUser($_POST['name'],$_POST['surname'],$_POST['phone_number'],$_POST['bdate'],$_POST['password1']);
      session_start();
      $user=getUser($_POST['phone_number']);
      $_SESSION['user']=$user;
      if (isset($_POST['remember']) && $_POST['remember'] == "on") {
          setcookie('user', json_encode($user), time() + 60 * 60);
      }

      header('Location: news.php');

      }
    }

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <?php include('../inc/linker.php'); ?>
  <title></title>
</head>
<body>
  <div class="header d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-0 border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal"><a class="aheader p-2 text-light" href="#">VK</a></h5>
    <div class="mx-auto order-0">

    </div>
  <div class="ml-auto">

  </div>
</div>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card mt-4">
          <div class="card-header">Registration Form</div>

          <div class="card-body">
            <form method="POST" action="" id="registration_form" >
              <!-- Name -->
              <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                <div class="col-md-4  ">
                  <input id="name" type="text" class="form-control" name="name" value="">
                </div>
                <span class="error_form" id="fname_error_message"></span>
              </div>
              <!-- Surname -->
              <div class="form-group row">
                <label for="surname" class="col-md-4 col-form-label text-md-right">Surname</label>
                <div class="col-md-4">
                  <input id="surname" type="text" class="form-control" name="surname" value="">
                </div>
                <span class="error_form" id="sname_error_message"></span>
              </div>
              <!-- phone number-->
              <div class="form-group row">
                <label for="phone_number" class="col-md-4 col-form-label text-md-right">Phone number</label>
                <div class="col-md-4">
                  <input id="phone_number" type="text" class="form-control" name="phone_number" value="">
                </div>
                <span class="error_form" id="email_error_message"></span>
              </div>
              <!-- Date -->
              <div class="form-group row">
                <label for="bdate" class="col-md-4 col-form-label text-md-right">Date</label>
                <div class="col-md-4">
                  <input id="bdate" type="date" class="form-control" name="bdate" value="">
                </div>
              </div>
              <!-- Password -->
              <div class="form-group row">
                <label for="password1" class="col-md-4 col-form-label text-md-right">Password</label>
                <div class="col-md-4">
                  <input id="password1" type="password" class="form-control" name="password1" value="">
                </div>
                <span class="error_form" id="password_error_message"></span>
              </div>
              <div class="form-group row">
                <label for="password2" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                <div class="col-md-4">
                  <input id="password2" type="password" class="form-control" name="password2" value="">
                </div>
                <span class="error_form" id="retype_password_error_message"></span>
              </div>
              <!-- Button -->
              <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                  <button id="register" name="create" type="submit" class="btn btn-primary">
                    Registration
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- footer -->
  <footer class="mt-2 border-top page-footer font-small blue pt-4">

    <!-- Footer Links -->
    <div class="container-fluid text-center text-md-left">

      <!-- Grid row -->
      <div class="row">

        <!-- Grid column -->
        <div class="col-md-6 mt-md-0 mt-3 text-center">

          <!-- Content -->
          <h5 class="text-uppercase">Footer Content</h5>
          <p>Here you can use rows and columns to organize your footer content.</p>

        </div>
        <!-- Grid column -->

        <hr class="clearfix w-100 d-md-none pb-3">

        <!-- Grid column -->
        <div class="col-md-3 mb-md-0 mb-3">

          <!-- Links -->
          <h5 class="text-uppercase">Links</h5>

          <ul class="list-unstyled">
            <li>
              <a href="#!">Link 1</a>
            </li>
            <li>
              <a href="#!">Link 2</a>
            </li>
            <li>
              <a href="#!">Link 3</a>
            </li>
            <li>
              <a href="#!">Link 4</a>
            </li>
          </ul>

        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 mb-md-0 mb-3">

          <!-- Links -->
          <h5 class="text-uppercase">Links</h5>

          <ul class="list-unstyled">
            <li>
              <a href="#!">Link 1</a>
            </li>
            <li>
              <a href="#!">Link 2</a>
            </li>
            <li>
              <a href="#!">Link 3</a>
            </li>
            <li>
              <a href="#!">Link 4</a>
            </li>
          </ul>

        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row -->

    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2020 Copyright:
      <a href="#"> vk.com</a>
    </div>
    <!-- Copyright -->
  </footer>

</body>
</html>
