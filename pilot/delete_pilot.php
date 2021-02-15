<?php
	include '../connection.php';

	//insert ke table penerbangan
	$id = $_GET['id'];

	$query = "DELETE FROM pilot WHERE id=$id";
	//mysqli_query($connect,$query);
	if ($connect->query($query) === TRUE) {
	  echo "pilot deleted successfully";
	} else {
	  echo "Error: " . $query . "<br>" . $connect->error;
	}
	

	header('location: pilot.php');	
?>