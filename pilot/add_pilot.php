<?php
	include '../connection.php';

	//insert ke table penerbangan
	$name = $_POST['name'];
	$weight = $_POST['weight'];
						
	$query = "INSERT INTO pilot (nick_name,weight) VALUES('$name','$weight')";
	//mysqli_query($connect,$query);
	if ($connect->query($query) === TRUE) {
	  echo "New record created successfully";
	} else {
	  echo "Error: " . $query . "<br>" . $connect->error;
	}
	header('location: pilot.php');

?>