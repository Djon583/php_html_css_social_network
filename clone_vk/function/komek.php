<?php
require_once('../config.php');

$req = getAllUser();

foreach ($req as $key) {

  ?>
  <h1><?php echo $key['name']; ?></h1><h1><?php echo $key['surname']; ?></h1><p>====</p>
  <?php
}

 ?>
