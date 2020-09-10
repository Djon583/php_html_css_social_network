<?php
	if(isset($_GET['id'])&&is_numeric($_GET['id'])){
		require_once 'db.php';
		$post = getPost($_GET['id']);
	}
	else{
		$post = "";
	}
	$user;
	if(isset($_SESSION['user'])){
	  $_SESSION['user'] = getUser($_SESSION['user']['email']);
	  $user=$_SESSION['user'];
	}
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
		<div class="col-md-8">
			<div class="alert alert-success" role="alert" id = "message_alert" style="display: none;"></div>
			<h3 class="text-center"><?php echo $post['post']; ?></h3>
			<div class="border" style="background-color: white">
				<p>Description of Task: </p>
				<p class=""><br><?php echo $post['description']; ?><br><br></p>
				<p class="float-right mt-1 mb-1 " style="height: 30px;">Author of task:<b> <?php echo $post['fname']." ".$post['lname']; ?></b></p>
			</div>
			<a class="btn btn-secondary" id="edit" data-toggle="modal" data-target="#editModal"  style="width: 200px; color: white">EDIT</a>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8 mt-2">
            <h3 class="text-center">Comments</h3>
			<div class="alert alert-success" role="alert" id = "comm_message_alert" style="display: none;"></div>
			<div id="allComments" style=""></div>
			<br>
			<div class="alert alert-success" role="alert" id = "post_message_alert" style="display: none;"></div>
			<h6 class="text-center" style="color: white">Your opinion:</h6>
			<form action="">
				<div class="form-group">
					<label for="" style="color: white">Your decision:</label>
					<input type="text" class="form-control" id="comment">
				</div>
				<input type="hidden" id="postid" value="<?php echo $_GET['id']; ?>">
				<input type="hidden" id="userid" value="<?php echo $_SESSION['user']['id']; ?>">
				<input type="hidden" id="owner" value="<?php echo $_SESSION['user']['fname']; ?>">
				<button type="button" id="writecomment" class="btn btn-dark">SUBMIT</button>
			</form>
		</div>
	</div>
</div>

<div id="editModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Edition:</h4>
				<button type="button" class="close" data-dismiss="modal" style="color: darkgrey">&times;</button>
			</div>
			<div class="modal-body">
				<label for="">Title:</label>
				<input type="text" class="form-control" id="title" value="<?php echo $post['post']; ?>">
				<br>
				<label for="">Content:</label>
				<input type="text" class="form-control" id="content" value="<?php echo $post['description']; ?>">
				<input type="hidden" id="idofpost" value="<?php echo $post['id'] ?>">
				<br>
				<a id="editsubmit" class="btn btn-secondary">CHANGE</a>
			</div>
		</div>
	</div>
</div>
