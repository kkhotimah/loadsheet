<?php
	include '../connection.php';

	//insert ke table penerbangan
	$id = $_GET['id'];

	$query = "DELETE FROM pesawat WHERE id=$id";
	//mysqli_query($connect,$query);
	if ($connect->query($query) === TRUE) {
	  echo "pesawat deleted successfully";
	} else {
	  echo "Error: " . $query . "<br>" . $connect->error;
	}
	

	header('location: ac.php');	
?>