<?php
require_once 'db.php';
if(isset($_SESSION['user'])){
	$_SESSION['user'] = getUser($_SESSION['user']['email']);
	$user=$_SESSION['user'];
?>
<?php include 'header.php' ?>
<style>
    .round {
        border-radius: 100px; /* Радиус скругления */
        border: 3px solid green; /* Параметры рамки */
        box-shadow: 0 0 7px #666; /* Параметры тени */
    }
</style>
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
		<div class="row">
			<div class="col-md-4 mt-3">
				<!-- <div class="alert alert-success" role="alert" id = "message_alert" style="display: none;"></div> -->
				<div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
		  			<div class="card-header">My profile:</div>
	  				<div class="card-body">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="images/user.png" width="220px" height="220px" alt="" class="round">
                                </div>
                                <div class="carousel-item">
                                    <img src="images/3.png" width="220px" height="220px" alt="" class="round">
                                </div>
                                <div class="carousel-item">
                                    <img src="images/2.png" width="220px" height="220px" alt="" class="round">
                                </div>
                                <div class="carousel-item">
                                    <img src="images/4.png" width="220px" height="220px" alt="" class="round">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
	    				<h5 class="card-title mt-3"><?php echo $_SESSION['user']['fname']." ".$_SESSION['user']['lname'] ?></h5>
	    				<h6>My email: <a href="mailto:zamanjol1994@mail.ru"><?php echo $_SESSION['user']['email'] ?></a></h6>
	    				<input type="hidden" id="userid" value="<?php echo $_SESSION['user']['id']; ?>">
	    				<p>State of my profile: <a id="deactivate" href="" class="btn btn-light"><?php if($_SESSION['user']['status'] == 1){ echo "DISABLE"; } else { echo "ENABLE"; }?></a></p>
	  				</div>
				</div>
			</div>
			<div class="col-md-8 mt-3">

            </br>
                <h4 class="card-title mt-3" align="center" style="color: greenyellow">MY TWITS</h4>
            <?php if($_SESSION['user']['status'] == 1){ ?>
                <table class="table">
					<thead>
						<tr>
						<td width="25%">Name</td>
						<td width="25%">Surname</td>
						<td width="25%">Title</td>
						<td width="25%">Action</td>
						</tr>
					</thead>
					<tbody id="postt"></tbody>
				</table>
			<?php } ?>
			</div>
<?php }
else{
	header('Location:login.php');
	}
 ?>

