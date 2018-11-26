<?php 
  session_start();
	function conn(){
		$conn = new mysqli("localhost", "root","", "artisandb");
		return $conn;
	}

	$menuid = $_GET['menuid'];
	$conn = conn();
	echo $sql = "UPDATE menu SET liked = liked-1 WHERE id = $menuid;";
	$conn->query($sql);
	$old_liked = $_SESSION['liked'];
	$_SESSION['liked'] = [];
	for ($i=0; $i < sizeof($old_liked); $i++) { 
		if ($old_liked[$i] != $menuid) {
			array_push($_SESSION['liked'],$old_liked[$i]);
		}
	}
	print_r($_SESSION['liked']);
 ?>