<?php 
  session_start();
	$menuid = $_GET['menuid'];
	array_push($_SESSION['liked'],$menuid);
	function conn(){
		$conn = new mysqli("localhost", "root","", "artisandb");
		return $conn;
	}

	
	$conn = conn();
	echo $sql = "UPDATE menu SET liked = liked+1 WHERE id = $menuid;";
	$conn->query($sql);
 ?>