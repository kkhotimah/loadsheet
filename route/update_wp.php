<?php
	include '../connection.php';

	//insert ke table penerbangan
    $id = $_GET['idw'];
    $idr = $_GET['idr'];
	$way = $_POST['way'];
	$head = $_POST['head'];
	$dist = $_POST['dist'];

	$query = "UPDATE waypoint SET name='$way', heading='$head', distance='$dist' WHERE id_waypoint=$id";
	//mysqli_query($connect,$query);
	if ($connect->query($query) === TRUE) {
	  echo "record update successfully";
	} else {
	  echo "Error: " . $query . "<br>" . $connect->error;
	}

	header('location: view_route.php?id='.$idr);	
?>