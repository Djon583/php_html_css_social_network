<!--
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LAB#11</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="jquery.min.js"></script>
  <script src="djai.js"></script>
</head>
<body> -->
<head>
    <title>Social media</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="/update2305/master.css">
    <script src="jquery.min.js"></script>
    <script src="my.js"></script>
    <script src="bootstrap.min.js"></script>
    <!-- <script src="scripts.js"></script> -->
</head>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Midterm</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <div class="dropdown">
                      <a id="navbarDropdown" class="nav-link p-2 text-light dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <?php echo $user['fname']. " " .$user['lname']; ?><span class="caret"></span>
                      </a>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="index.php">My page</a>
                        <a class="dropdown-item" href="change_profile.php">Setting</a>
                        <a class="dropdown-item" href="#">Help</a>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                      </div>
                    </div>
                  </li>
                  <!--
                    <li class="nav-item">
                        <a  class="nav-link" href="index.php" style=""><img src="images/user.png"width="30px" height="30px" alt="">MAIN PAGE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="change_profile.php">EDIT PROFILE</a>
                    </li>
                  -->
                    <li class="nav-item">
                        <a href="my_twits.php" class="nav-link">ADD TWITS</a>
                    </li>
                    <li class="nav-item">
                        <a href="allposts.php" class="nav-link">ALL TWITS</a>
                    </li>
                    <li class="nav-item">
                        <a href="update2305/friends.php" class="nav-link">Friends</a>
                    </li>
                    <li class="nav-item">
                        <a href="update2305/messages.php" class="nav-link">Messages</a>
                    </li>
                    <li class="nav-item">
                        <a href="update2305/notifications.php" class="nav-link">Noti</a>
                    </li>
                    <!--
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link">LOGOUT</a>
                    </li>-->
                </ul>
            </div>
            <form class="form-inline my-2 my-lg-0">
                <div class="alert alert-success" role="alert" id = "post_message_alert" style="display: none;"></div>
                <form>
                    <div class="form-group">
                        <input type="search" id="search" class="form-control" placeholder="search by title">
                        <button  class="btn btn-outline-success my-2 my-sm-0" type="button" id="searchbtn" class="btn btn-success" style="margin-top: 5px;margin-left: 5px">SEARCH</button>
                    </div>
                </form>
            </form>
        </nav>
    </div>
</header>
