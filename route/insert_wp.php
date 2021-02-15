<?php
	include '../connection.php';

	//insert ke table penerbangan
	$id = $_GET['id'];
	$way = $_POST['way'];
	$head = $_POST['head'];
	$dist = $_POST['dist'];

	$query = "INSERT INTO waypoint (name,heading,distance,penerbangan_id) VALUES('$way','$head','$dist','$id')";
	//mysqli_query($connect,$query);
	if ($connect->query($query) === TRUE) {
	  echo "New record created successfully";
	} else {
	  echo "Error: " . $query . "<br>" . $connect->error;
	}

	header('location: view_route.php?id='.$id);	
?>