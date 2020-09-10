<?php
	require_once 'db.php';
	if(isset($_GET['search'])){
		$str = $_GET['search'];
		$query = $connection->prepare("SELECT * FROM posts WHERE post LIKE '$str%'");
		$query->execute();
		$result = $query->fetchAll();
	}
	echo json_encode($result);
?>
