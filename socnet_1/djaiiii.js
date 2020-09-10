$('document').ready(function(){

	$("#add").click(function(){
		addUser($("#fname").val(), $("#lname").val(), $("#email").val(), $("#password").val(), $("#passwordconfirm").val());
		 $("input").val('');
	});

	$("#btnlog").click(function(){
		loginUser($("#emaillog").val(),$("#passwordlog").val())
		$("input").val('');
	});

	$("#btnpost").click(function(){
		addPost($("#post").val(), $("#description").val());
		// $("input").val('');
	});

	getAllPosts();

	getAllPostsOfUser($('#userid').val());

	$('#writecomment').on('click', function(){
		addComment($('#comment').val(), $('#postid').val(), $('#userid').val(), $('#owner').val());
	});

	getAllComments($('#postid').val());

	$('#editsubmit').on('click', function(){
		editPost($('#idofpost').val(), $('#title').val(), $('#content').val());
	})

	$('#deactivate').on('click', function(){
		deactivateUser($('#userid').val());
	});

	$('#searchbtn').click(function(){
		searchPosts($('#search').val());
	});

});	

function addUser(Fname, Lname, Email, Password, Passwordconfirm){

			$.post("to_register.php", {

				"fname": Fname,
				"lname": Lname,
				"email": Email,
				"password": Password,
				"passwordconfirm": Passwordconfirm

			}, function(data){

				result = JSON.parse(data);

				if(result['status']=='OK'){
					$("#message_alert").attr('class', 'alert alert-success');
				}else{
					$("#message_alert").attr('class', 'alert alert-danger');
				}
						$("#message_alert").show();
						$("#message_alert").html(result['message']);
			});

		}
function loginUser(Email, Password){
			$.get("to_login.php" , {

				"emaillog":Email,
				"passwordlog":Password

			},  function(data){
				res=JSON.parse(data);
				if(res['status']=='OK'){
					window.location.href = "index.php";
					
				}	
				else{
				 	$("#login_message_alert").attr('class', 'alert alert-danger');
	 				$("#login_message_alert").show();
			 		$("#login_message_alert").html(res['mes']);
				 }	

			});
	    }

function addPost(Post, Description){
			$.post("to_post.php",{

				"post": Post,
				"description": Description

			}, function(data){
				result=JSON.parse(data);
				if(result['status']=='OK'){
					$("#post_message_alert").attr('class', 'alert alert-success');
				}else{
					$("#post_message_alert").attr('class', 'alert alert-danger');
				}
				$("#post_message_alert").show();
				$("#post_message_alert").html(result['mes']);
                getAllPosts();
				});
		}
function getAllPosts(){
			$.get("getposts.php", function(data){
				result=JSON.parse(data);
				htmldata="";
				for(i=0;i<result.length;i++){
					htmldata+="<tr>";
					htmldata+="<td>"+result[i]['fname']+"</td>";
					htmldata+="<td>"+result[i]['lname']+"</td>";
					htmldata+="<td>"+result[i]['post']+"</td>";
					htmldata+="<td><a class='btn btn-dark' href='post.php?id="+result[i]['id']+"'>VIEW</a></td>";
					htmldata+="</tr>";
				}
				$("#postt").html(htmldata);

			});
		}
function deletePost(Id){
			$.post("delete.php",{
				"id":Id
			}, function(data){
				getAllPostsOfUser($('#userid').val());
			})
		}

function viewPost(Id){
			$.post("edit_post.php",{
				"id":Id
			}, function(data){
				getAllPosts();
			})
		}

function addComment(comment, postid, userid, owner){
			$.post("add_comment.php", {
				"comment":comment,
				"postid":postid,
				"userid":userid,
				"owner":owner
			}, function(data){
				res = JSON.parse(data);
				if(res['status']=='OK'){
					$("#comm_message_alert").attr('class', 'alert alert-success');
				}else{
					$("#comm_message_alert").attr('class', 'alert alert-danger');
				}
				$("#comm_message_alert").show();
				$("#comm_message_alert").html(res['mes']);
				getAllComments($('#postid').val());
			});
}

function getAllComments(postid){
			$.get("getcomments.php", {
				"postid":postid
			}, function  (data){
				comms = JSON.parse(data);
				htmldata="<hr class='border border-dark'>";
				for(i=0; i<comms.length; i++){
					htmldata+="<div style='display: flex;'>";
					htmldata+="<p style='width: 60%;'>"+comms[i]['comment']+"</p><br>";
					htmldata+="<p style='width: 30%;'>Answered by: <b>"+comms[i]['owner']+"</b></p>";
					htmldata+="<a style='text-decoration: none; color: #000;' onclick='deleteComment("+comms[i]['id']+")'>x</a>";
					htmldata+="</div>";
				}
				$('#allComments').html(htmldata);
			});

}

function deleteComment(id){
			$.post("deletecomm.php", {
				"id":id
			}, function(data){
				res = JSON.parse(data);
				if(res['status'] == "OK"){
					$("#comm_message_alert").attr('class', 'alert alert-success');
				}else{
					$("#comm_message_alert").attr('class', 'alert alert-danger');
				}
				$("#comm_message_alert").show();
				$("#comm_message_alert").html(res['mes']);
				getAllComments($('#postid').val());
			});
}

function editPost(id, title, description){
			$.post("editpost.php", {
				"id":id,
				"title":title,
				"description":description
			}, function(data){
				result = JSON.parse(data);
				if(result['status'] == "OK"){
					$('#message_alert').attr('class', 'alert alert-success');
				}
				else{
					$("#message_alert").attr('class', 'alert alert-danger');
				}
				$("#message_alert").show();
				$("#message_alert").html(result['mes']);
			});
}

function deactivateUser(id){
			$.post("deactivate.php", {
				"id":id
			}, function(data){
				result = JSON.parse(data);
				if(result['status'] == "OK"){
					$('#message_alert').attr('class', 'alert alert-success');
				}
				else{
					$("#message_alert").attr('class', 'alert alert-danger');
				}
				$("#message_alert").show();
				$("#message_alert").html(result['message']);

			});
}

function searchPosts(str){
			$.get("search.php", {
				"search":str
			}, function(data){
				result=JSON.parse(data);
				htmldata="";
				for(i=0;i<result.length;i++){
					htmldata+="<tr>";
					htmldata+="<td>"+result[i]['fname']+"</td>";
					htmldata+="<td>"+result[i]['lname']+"</td>";
					htmldata+="<td>"+result[i]['post']+"</td>";
					htmldata+="<td><a class='btn btn-dark' href='post.php?id="+result[i]['id']+"'>VIEW</a> <button class='btn btn-danger' onclick='deletePost("+result[i]['id']+")'>DELETE</button></td>";
					htmldata+="</tr>";
				}
				$("#postt").html(htmldata);
			});
}

function getAllPostsOfUser(id){
			$.get("getuserspost.php", {
				"id":id
			}, function(data){
				result=JSON.parse(data);
				htmldata="";
				for(i=0;i<result.length;i++){
					htmldata+="<tr>";
					htmldata+="<td>"+result[i]['fname']+"</td>";
					htmldata+="<td>"+result[i]['lname']+"</td>";
					htmldata+="<td>"+result[i]['post']+"</td>";
					htmldata+="<td><a class='btn btn-dark' href='post.php?id="+result[i]['id']+"'>VIEW</a> <button class='btn btn-danger' onclick='deletePost("+result[i]['id']+")'>DELETE</button></td>";
					htmldata+="</tr>";
				}
				$("#postt").html(htmldata);
			});
}