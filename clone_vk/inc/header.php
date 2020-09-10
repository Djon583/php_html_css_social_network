
<div class="header d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-0 border-bottom shadow-sm">
  <h5 class="my-0 mr-md-auto font-weight-normal"><a class="aheader p-2 text-light" href="#">VK</a></h5>
  <div class="mx-auto order-0">
    <a class="p-2 text-light" href="../layouts/profile.php">My page</a>
    <a class="p-2 text-light" href="../layouts/news.php">News</a>
    <a class="p-2 text-light" href="../layouts/messages.php">Messages</a>
    <a class="p-2 text-light" href="../layouts/friends.php">Friends</a>
    <a class="p-2 text-light" href="../layouts/searching.php">Searching</a>
    <a class="p-2 text-light" href="../layouts/notifications.php">Notifications</a>
</div>
<div class="ml-auto">
    <strong>
      <div class="dropdown">
          <a id="navbarDropdown" class="p-2 text-light dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            <?php echo $user['name']. " " .$user['surname']; ?><span class="caret"></span>
          </a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="../layouts/profile.php">My page</a>
          <a class="dropdown-item" href="../layouts/setting.php">Setting</a>
          <a class="dropdown-item" href="#">Help</a>
          <a class="dropdown-item" href="../inc/logout.php">Logout</a>
        </div>
      </div>
    </div>
  </strong>
</div>
