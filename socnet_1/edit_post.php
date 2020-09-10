<?php
if(isset($_GET['id'])&&is_numeric($_GET['id'])){
    require_once 'db.php';
    $post = getPost($_GET['id']);
}
else{
    $post = "";
}
?>

<?php include 'header.php' ?>
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
