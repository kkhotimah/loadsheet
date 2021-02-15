<?php
	include '../connection.php';

	//insert ke table penerbangan
	$id = $_GET['id'];

	$query = "DELETE FROM waypoint WHERE penerbangan_id=$id";
	//mysqli_query($connect,$query);
	if ($connect->query($query) === TRUE) {
	  echo "waypoint deleted successfully";
	} else {
	  echo "Error: " . $query . "<br>" . $connect->error;
	}
	$query1 = "DELETE FROM penerbangan WHERE id=$id";
	//mysqli_query($connect,$query);
	if ($connect->query($query1) === TRUE) {
	  echo "penerbangan deleted successfully";
	} else {
	  echo "Error: " . $query1 . "<br>" . $connect->error;
	}

	header('location: route.php?');	
?>