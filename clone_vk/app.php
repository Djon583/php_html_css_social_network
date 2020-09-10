<?php
$message=array();
$message['mes']="Fields are empty!";
$message['status']="ERROR";
if($_SERVER['REQUEST_METHOD']=='POST'){
  require_once 'config.php';
  $user=getUser($_POST['login']);
  if(isset($_POST['login'])&&isset($_POST['password'])){
    if($user!=null){
      if($user['password']==$_POST['password']){
        $message['status']="OK";
        session_start();
        $_SESSION['user']=$user;
        if (isset($_POST['remember']) && $_POST['remember'] == "on") {
          setcookie('user', json_encode($user), time() + 60 * 60);
        }

        header('Location: layouts/news.php');

      }else{

      }
    }
  }
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="style/style_1.css">
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


  <div class="app">
    <main class="py-4">
      <div class="container">
        <div class="row">
          <div class="col-md-8 text-center">
            <img src="img/3.png" alt="" style=""class="mt-4 w-60 h-75 rounded mx-auto d-block">
          </div>
          <div class="col-md-4">
            <div class="card">
              <div class="card-header">

                <h2>Login</h2>
              </div>
              <div class="card-body">

                <form class="" action="" method="post">
                  <div class="form-group row">
                    <label for="login" class="col-md-4 col-form-label text-md-right">Login</label>
                    <div class="col-md-6">
                      <input id="login" type="text" class="form-control" name="login" value="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                    <div class="col-md-6">
                      <input id="password" type="password" class="form-control" name="password" value="">
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-2">
                      <button type="submit" name="btn-login" class="btn btn-primary">
                        Log in
                      </button>
                      <a href="#">Forgot password</a>
                    </div>
                  </div>
                  <div class="form-group row mt-2">
                    <label for="remember" class="col-md-5 col-form-label text-md-right">Remember me</label>
                    <div class="col-md-4 mt-2">
                      <input id="remember" type="checkbox" name="remember" value="">
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="card mt-4">
              <div class="card-body text-center">
                <div class="">
                  <h4>First time on VK?</h4>
                  <p>Sign up for VK</p>
                </div>
                <div class="form-group row mb-0">
                  <div class="col-md-8 offset-md-2">
                    <a href="layouts/registration.php"><button id="register" type="submit" class="btn btn-success">
                      Registration
                    </button></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
  
  <!-- footer-->
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
