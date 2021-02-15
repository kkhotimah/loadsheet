<?php
	include '../connection.php';

	//insert ke table penerbangan
	$dari = $_POST['from'];
	$via = $_POST['via'];
	$ke = $_POST['to'];					
	$query = "INSERT INTO penerbangan (dari,via,ke) VALUES('$dari','$via','$ke')";
	//mysqli_query($connect,$query);
	if ($connect->query($query) === TRUE) {
	  echo "New record created successfully";
	} else {
	  echo "Error: " . $query . "<br>" . $connect->error;
	}
	header('location: route.php');
	// $id_penerbangans = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM penerbangan WHERE dari=$dari AND via=$via AND ke=$ke"));
	// $id_penerbangan = $id_penerbangans['id'];
	// echo $id_penerbangan;
?>