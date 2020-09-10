<?php
require_once 'db.php';
if(isset($_SESSION['user'])){
	$_SESSION['user'] = getUser($_SESSION['user']['email']);
	$user=$_SESSION['user'];
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
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8 mt-3">
				<div class="alert alert-success" role="alert" id = "post_message_alert" style="display: none;"></div>

            </br>
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

