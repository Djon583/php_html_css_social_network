    <?php include 'navbar.php' ?>
<head>
    <meta charset="UTF-8">
    <title>RK2</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

</head>
<style>
  body {
    background: url(images/2.jpg);
    background-repeat: no-repeat;
     -webkit-background-size: cover;
     background-size: cover;
     width: 100%;
     height: 100%;
  }
</style>

    <div class="container" >    
        <div class="alert alert-success" role="alert" id = "login_message_alert" style="display: none;"></div>
            <div class="row mt-3">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Email:</label>
                        <input id="emaillog" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Password:</label>
                        <input id="passwordlog" type="password" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-dark" id="btnlog">Войти</button>
                    <a href="register.php" class = "btn btn-secondary" style="color: white">Зарегестрироваться</a>
                </div>
            </div>
    </div>
    

    