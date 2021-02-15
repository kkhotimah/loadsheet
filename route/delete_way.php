<?php
	include '../connection.php';

	//insert ke table penerbangan
	$id = $_GET['idw'];
	$idr = $_GET['idr'];

	

	$query = "DELETE FROM waypoint WHERE id_waypoint=$id";
	//mysqli_query($connect,$query);
	if ($connect->query($query) === TRUE) {
	  echo "waypoint deleted successfully";
	} else {
	  echo "Error: " . $query . "<br>" . $connect->error;
	}
	

	header('location: ../route/view_route.php?id='.$idr);	
?>