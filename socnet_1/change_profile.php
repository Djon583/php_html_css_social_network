<?php 
	require_once 'db.php';

	if(isset($_SESSION['user'])){
		$user = getUser($_SESSION['user']['email']);
?>

<?php include 'header.php' ?>
        <style>
           body {
             background: url(images/back.jpg);
             background-repeat: no-repeat;
            -webkit-background-size: cover;
            background-size: cover;
            width: 100%;
            height: 100%;
           }
        </style>
	<div class="container">
		<div class="row mt-3">
			<div class="col-md-3"></div>
			<div class="col-md-6">

				<?php if(isset($_GET['error'])){ ?>
					<div class="alert alert-danger" role="alert">
                          Modification unable!
                        </div>       
                <?php } ?>
                <?php if(isset($_GET['success'])){ ?>
                	<div class="alert alert-success" role="alert">
                          Changed Succesfully!
                        </div>    
                <?php } ?>   
                <h2>Change of profile:</h2>
				<form action="to_edit_prof.php" method="post">
					<div class="form-group">
						<label for="">First Name:</label>
						<input type="text" name="fname" class="form-control" value="<?php echo $user['fname'] ?>">
					</div>
					<div class="form-group">
						<label for="">Last Name:</label>
						<input type="text" name="lname" class="form-control" value="<?php echo $user['lname'] ?>">
					</div>
					<div class="form-group">
						<label for="">Email:</label>
						<input type="text" name="email" class="form-control" value="<?php echo $user['email'] ?>">
					</div>
					<div class="form-group">
						<label for="">Old password:</label>
						<input type="password" name="oldpassword" class="form-control">
					</div>
					<div class="form-group">
						<label for="">New password:</label>
						<input type="password" name="newpassword" class="form-control">
					</div>
					<input type="hidden" name="id" value="<?php echo $_SESSION['user']['id'] ?>">
					<input type="submit" name="enter" value="Change" class="btn btn-success">
				</form>
				
			</div>
		</div>
	</div>
</body>
</html>

<?php } else { 
	header("Location: login.php");
}
	?>

