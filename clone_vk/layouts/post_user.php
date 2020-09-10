<?php
  $post_user = getUserPost($_SESSION['user']['iduser']);


  foreach ($post_user as $key) {
    ?>
    <div class="card gedf-card mt-3">
      <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
          <div class="d-flex justify-content-between align-items-center">
            <div class="mr-2">
              <img class="rounded-circle" width="45" src="https://picsum.photos/50/50" alt="">
            </div>
            <div class="ml-2">
              <div class="h5 m-0"><?php if($user['iduser'] == $key['iduser']){
                echo $user['name']. " " .$user['surname'];} ?>
              </div>
              <div class="text-muted h7 mb-2"> <i class="fa fa-clock-o"></i><?php echo $key['post_date']; ?>
              </div>
            </div>
          </div>
          <div>
            <div class="dropdown">
              <button class="btn btn-link dropdown-toggle" type="button" id="gedf-drop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-ellipsis-h"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop1">
                <div class="h6 dropdown-header">Configuration</div>
                <form class="" action="edit_post.php" method="post">
                  <input type="hidden" name="id_edit_post" value="<?php echo $key['idpost']; ?>">
                  <input type="submit" class="dropdown-item" id="edit_post" name="edit_post_button" value="Edit">
                </form>

                <form class="" action="profile.php" method="post">
                  <input type="hidden" name="id_delete_post" value="<?php echo $key['idpost']; ?>">
                  <input type="submit" class="dropdown-item" id="delete_post" name="delete_post_button" value="Delete">
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body">
        <a class="card-link" href="#">
          <h5 class="card-title"><?php echo $key['post_title']; ?></h5>
        </a>
        <p class="card-text"><?php echo $key['post_mes']; ?></p>
      </div>
      <div class="card-footer">
        <form class="col-md-2 ml-2" action="comments_page.php" method="post">
          <input type="hidden" name="show_comment" value="<?php echo $key['idpost']; ?>">
          <input type="submit" class="btn btn-link" id="show_comment" name="show_submit_comment" value="comments">
        </form>
      </div>
    </div>
    <?php
  }
 ?>
