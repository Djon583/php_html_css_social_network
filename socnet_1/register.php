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
	<div class="header">
	</br>
		<h1 style="text-align: center; font-family: arial narrow">Registration</h1>
		<div class="container">
            <div class="row mt-3">
            <div class="col-md-3"></div>
            <div class="col-md-6">
			<div class="alert alert-success" role="alert" id = "message_alert" style="display: none;"></div>	
            <div class="form-group">
                <label for="" style="color: white">First Name:</label>
                <input type="text" id="fname" class="form-control" >
            </div>
            <div class="form-group">
                <label for="" style="color: white">Last Name:</label>
                <input type="text" id="lname" class="form-control">
            </div>
            <div class="form-group">
                <label for="" style="color: white">Email:</label>
                <input type="text" id="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="" style="color: white">Password:</label>
                <input type="password" id="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="" style="color: white">Password Confirm:</label>
                <input type="password" id="passwordconfirm" class="form-control">
            </div>
                <button type="submit" class="btn btn-dark" id="add">Зарегестрироваться</button>
                <a href="register.php" class = "btn btn-secondary" style="color: white">Назад</a>
            </div>
        </div>
        </div>
    </div>

    
